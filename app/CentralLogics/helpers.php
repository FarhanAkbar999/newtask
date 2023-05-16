<?php
namespace App\CentralLogics;

use Illuminate\Support\Facades\DB;

class Helpers
{
    public static function getPagination(){
        
        $result = DB::table('settings')->where('key','pagination_limit')->first();
        $pagination_limit = $result->value;
        return $pagination_limit ?? 10;
    }
}