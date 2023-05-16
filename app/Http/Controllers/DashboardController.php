<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\CentralLogics\Helpers;

class DashboardController extends Controller
{
    public function index(){
        $grandpa = DB::table('grandpa_chlidren')->whereNull('grandpa_id')->paginate(Helpers::getPagination());
        return view('user.user', compact('grandpa') );
    }

    public function grandpaChild($grandpa_id){
        $grandpa_child = DB::table('grandpa_chlidren')->where('grandpa_id', $grandpa_id)->get();
        return response()->json(['grandpa_child' => $grandpa_child]);       
    }

    public function search(Request $request){
        $validator = Validator::make($request->only('search'), [
            'search' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }

        $key = explode(' ', $request['search']);

        $grandpa_child = DB::table('grandpa_chlidren');
        foreach ($key as $value) {
            $grandpa_child->orWhere('children_name', 'like', "%{$value}%");
        }
        $result = $grandpa_child->get();
        return response()->json(['result' => $result], 200);
    }
}
