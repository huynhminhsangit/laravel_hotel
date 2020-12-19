<?php

namespace App\Models;

use App\Models\AdminModel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;

class SettingModel extends AdminModel
{
    public function __construct()
    {
        $this->controllerName      = 'setting';
        $this->table               = 'setting';
        $this->folderUpload        = 'setting';
        $this->fieldSearchAccepted = [];
        $this->crudNotAccepted     = ['_token', 'thumb_current', 'task_general', 'task_email', 'task_social', 'email', 'password',
        'bcc', 'hotline', 'copyright', 'working_date', 'slogan', 'map', 'location', 'introduce', 'facebook'
        , 'group','fan_page', 'youtube','meta_keyword','meta_description','task_seo','script_head','script_body','task_script', 'logo_top', 'logo_footer', 'favicon', 'logo_top_current', 'logo_footer_current', 'favicon_current'];
    }

    public function listItems($params = null, $options = null)
    {

        $result = null;
        if ($options['task'] == "admin-list-items") {
            $query = $this->select('id', 'key_value', 'value', 'status', 'created', 'created_by', 'modified', 'modified_by')
                    ->orderBy('id', 'asc');
            $result = $query->get()->toArray();
        }
        if ($options['task'] == 'news-list-items') {
            $query = $this->select('id', 'key_value', 'value')->orderBy('id', 'asc');
            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function countItems($params = null, $options  = null)
    {

        $result = null;

        if ($options['task'] == 'admin-count-items-group-by-status') {

            $query = $this::groupBy('status')
                ->select(DB::raw('status , COUNT(id) as count'));

            if ($params['search']['value'] !== "") {
                if ($params['search']['field'] == "all") {
                    $query->where(function ($query) use ($params) {
                        foreach ($this->fieldSearchAccepted as $column) {
                            $query->orWhere($column, 'LIKE',  "%{$params['search']['value']}%");
                        }
                    });
                } else if (in_array($params['search']['field'], $this->fieldSearchAccepted)) {
                    $query->where($params['search']['field'], 'LIKE',  "%{$params['search']['value']}%");
                }
            }

            $result = $query->get()->toArray();
        }
        if ($options['task'] == 'admin-count-items') {
            $query = $this->select(DB::raw('COUNT(id) as count'))->where('id', '>=', 0);
            $result = $query->get()->toArray();
        }
        return $result;
    }

    public function getItem($params = null, $options = null)
    {
        $result = null;

        if ($options['task'] == 'get-item') {
            $result = self::select('id', 'key_value', 'value', 'status')->where('id', $params['id'])->first()->toArray();
        }

        if($options['task'] == 'get-setting-value'){
            $result = self::select('id', 'key_value', 'value', 'status')->where('key_value', $params)->first()->toArray();
        }

        return $result;
    }

    public function saveItem($params = null, $options = null)
    {
        if ($options['task'] == 'edit-item-setting-email') {
            $arrValue['email']       = $params['email'];
            $arrValue['password']    = $params['password'];
            $arrValue['bcc']         = $params['bcc'];
            $params  ['value']       = json_encode($arrValue, JSON_UNESCAPED_UNICODE);
            $params  ['modified_by'] = session()->get('userInfo')['username'];
            $params  ['modified']    = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
        if ($options['task'] == 'edit-item-setting-social') {
            $arrValue['facebook']     = $params['facebook'];
            $arrValue['group']        = $params['group'];
            $arrValue['fan_page']     = $params['fan_page'];
            $arrValue['youtube']      = $params['youtube'];
            $params   ['value']       = json_encode($arrValue, JSON_UNESCAPED_UNICODE);
            $params   ['modified_by'] = session()->get('userInfo')['username'];
            $params   ['modified']    = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
        if ($options['task'] == 'edit-item-setting-general') {
            // change three logo
            if(!empty($params['logo_top']) && !empty($params['logo_footer']) && !empty($params['favicon'])){
                $arrValue['logo']['logo_top']    = $this->uploadThumb($params['logo_top']);
                $arrValue['logo']['logo_footer'] = $this->uploadThumb($params['logo_footer']);
                $arrValue['logo']['favicon']     = $this->uploadThumb($params['favicon']);
            }else{
                $arrValue['logo']['logo_top']    = $params['logo_top_current'];
                $arrValue['logo']['logo_footer'] = $params['logo_footer_current'];
                $arrValue['logo']['favicon']     = $params['favicon_current'];
            }
            // only change logo_top
            if (!empty($params['logo_top'])) {
                $this->deleteThumb($params['logo_top_current']);
                $arrValue['logo']['logo_top']    = $this->uploadThumb($params['logo_top']);
                $arrValue['logo']['logo_footer'] = $params['logo_footer_current'];
                $arrValue['logo']['favicon']     = $params['favicon_current'];
            }else{
                $arrValue['logo']['logo_top'] = $params['logo_top_current'];
            }
            // only change logo_footer
            if (!empty($params['logo_footer'])) {
                $this->deleteThumb($params['logo_footer_current']);
                $arrValue['logo']['logo_footer'] = $this->uploadThumb($params['logo_footer']);
                $arrValue['logo']['logo_top']    = $params['logo_top_current'];
                $arrValue['logo']['favicon']     = $params['favicon_current'];
            }else {
                $arrValue['logo']['logo_footer'] = $params['logo_footer_current'];
            }
            // only change favicon
            if (!empty($params['favicon'])) {
                $this->deleteThumb($params['favicon_current']);
                $arrValue['logo']['favicon']     = $this->uploadThumb($params['favicon']);
                $arrValue['logo']['logo_top']    = $params['logo_top_current'];
                $arrValue['logo']['logo_footer'] = $params['logo_footer_current'];
            }else{
                $arrValue['logo']['favicon'] = $params['favicon_current'];
            }
            $arrValue['logo'] = json_encode($arrValue['logo']);
            $arrValue['hotline']      = $params['hotline'];
            $arrValue['copyright']    = $params['copyright'];
            $arrValue['working_date'] = $params['working_date'];
            $arrValue['slogan']       = $params['slogan'];
            $arrValue['location']     = $params['location'];
            $arrValue['introduce']    = $params['introduce'];
            $params  ['value']        = json_encode($arrValue, JSON_UNESCAPED_UNICODE);
            $params  ['modified_by']  = session()->get('userInfo')['username'];
            $params  ['modified']     = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
        if ($options['task'] == 'edit-item-setting-seo') {
            $arrValue['meta_keyword']     = $params['meta_keyword'];
            $arrValue['meta_description'] = $params['meta_description'];
            $params   ['value']           = json_encode($arrValue, JSON_UNESCAPED_UNICODE);
            $params   ['modified_by']     = session()->get('userInfo')['username'];
            $params   ['modified']        = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
        if ($options['task'] == 'edit-item-setting-script') {
            $arrValue['script_head']  = $params['script_head'];
            $arrValue['script_body']  = $params['script_body'];
            $arrValue['map']          = $params['map'];
            $params   ['value']       = json_encode($arrValue, JSON_UNESCAPED_UNICODE);
            $params   ['modified_by'] = session()->get('userInfo')['username'];
            $params   ['modified']    = date('Y-m-d');
            self::where('id', $params['id'])->update($this->prepareParams($params));
        }
    }
}
