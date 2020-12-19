<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class GalleryModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'gallery';
        $this->table               = 'gallery';
        $this->fieldSearchAccepted = ['id', 'name', 'link'];
        $this->crudNotAccepted     = ['_token'];
    }

    
    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'edit-item') {
            self::where('id', 1)->update($this->prepareParams($params));
        }
    }
    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'link')->where('id', 1)->first();
        }
        if ($options['task'] == 'news-get-item') {
            $result = self::select('id', 'link')->where('id', 1)->first();
        }
        return $result;
    }
}
