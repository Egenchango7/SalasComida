<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    public function getLastId($model) {
        $lastId = DB::table($model)->latest('id')->first()->id;
        $newId = (intval(substr($lastId, 1)) + 1);
        $newId = strtoupper(substr($model,0,1)).str_pad($newId, 3, "0", STR_PAD_LEFT);
        return $newId;
    }
    public function deleteByTable($id,$table) {
        DB::table($table)->find($id)->delete();
    }
}
