<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AddUserController extends Controller
{
    public function grandpa(){
        $grandpa = DB::table('grandpa_chlidren')->whereNull('grandpa_id')->get();
        return view('user.add-user', compact('grandpa') );
    }

    public function store(Request $request){
        // return $request;
        $validator = Validator::make($request->all(), [
            'grandpa_id' => 'required',
            'children_name' => 'required',
            'age' => 'required',
            'veteran' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $id = DB::table('grandpa_chlidren')->insertGetId(array_merge(
                                                                $validator->validated(),
                                                                ['is_grandpa' => 1]
                                                            ));
        return response()->json(['id' => $id]);      

    }
}
