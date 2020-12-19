<?php

namespace App\Models;

use App\Models\AdminModel;
use DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class DashboardModel extends AdminModel
{
    public function countItems($params = null, $options = null)
    {
        $arrTable = config()->get('zvn.table');;
        $result = [];
        foreach ($arrTable as $key => $value) {
            $tmp = DB::table($value)->count();
            $result[$value] = $tmp;
        }
        return $result;
    }
}
