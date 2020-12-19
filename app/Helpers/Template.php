<?php

namespace App\Helpers;

use App\Models\AttributeModel;
use App\Models\CategoryProductModel;
use App\Models\CategoryArticleModel;
use App\Models\GroupAttributeModel;
use App\Models\MenuModel;
use Illuminate\Support\Facades\Config;

class Template
{
    public static function showButtonFilter($controllerName, $itemsStatusCount, $currentFilterStatus, $paramsSearch)
    { // $currentFilterStatus active inactive all
        $xhtml = null;
        $tmplStatus = Config::get('zvn.template.status');

        if (count($itemsStatusCount) > 0) {
            array_unshift($itemsStatusCount, [
                'count'   => array_sum(array_column($itemsStatusCount, 'count')),
                'status'  => 'all'
            ]);

            foreach ($itemsStatusCount as $item) {  // $item = [count,status]
                $statusValue = $item['status'];  // active inactive block
                $statusValue = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';

                $currentTemplateStatus = $tmplStatus[$statusValue]; // $value['status'] inactive block active
                $link = route($controllerName) . "?filter_status=" .  $statusValue;

                if ($paramsSearch['value'] !== '') {
                    $link .= "&search_field=" . $paramsSearch['field'] . "&search_value=" .  $paramsSearch['value'];
                }

                $class  = ($currentFilterStatus == $statusValue) ? 'btn-danger' : 'btn-info';
                $xhtml  .= sprintf('<a href="%s" type="button" class="btn %s">
                                    %s <span class="badge bg-white">%s</span>
                                </a>', $link, $class, $currentTemplateStatus['name'], $item['count']);
            }
        }

        return $xhtml;
    }
    public static function showAreaSearch($controllerName, $paramsSearch)
    {
        $xhtml = null;
        $tmplField         = Config::get('zvn.template.search');
        $fieldInController = Config::get('zvn.config.search');

        $controllerName = (array_key_exists($controllerName, $fieldInController)) ? $controllerName : 'default';
        $xhtmlField = null;

        foreach ($fieldInController[$controllerName] as $field) { // all id
            $xhtmlField .= sprintf('<li><a href="#" class="select-field" data-field="%s">%s</a></li>', $field, $tmplField[$field]['name']);
        }

        $searchField = (in_array($paramsSearch['field'],  $fieldInController[$controllerName])) ? $paramsSearch['field'] : "all";

        $xhtml = sprintf('
            <div class="input-group">
                <div class="input-group-btn">
                    <button type="button" class="btn btn-default dropdown-toggle btn-active-field" data-toggle="dropdown" aria-expanded="false">
                        %s <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        %s
                    </ul>
                </div>
                <input type="text" name="search_value" value="%s" class="form-control" >
                <input type="hidden" name="search_field" value="%s">
                <span class="input-group-btn">
                    <button id="btn-clear-search" type="button" class="btn btn-success" style="margin-right: 0px">Xóa tìm kiếm</button>
                    <button id="btn-search" type="button" class="btn btn-primary">Tìm kiếm</button>
                </span>
            </div>', $tmplField[$searchField]['name'], $xhtmlField, $paramsSearch['value'], $searchField);
        return $xhtml;
    }
    public static function showItemHistory($by, $time)
    {
        $xhtml = sprintf(
            '<p><i class="fa fa-user"></i> %s</p>
            <p><i class="fa fa-clock-o"></i> %s</p>',
            $by,
            date(Config::get('zvn.format.short_time'), strtotime($time))
        );
        return $xhtml;
    }
    public static function showDateCreated($time, $type = 'default')
    {
        $xhtml = sprintf(
            '<p><i class="fa fa-clock-o"></i> %s</p>',
            date(Config::get('zvn.format.short_time'), strtotime($time))
        );
        if($type==='not-paragraph'){
            $xhtml = sprintf(
                '<i class="fa fa-clock-o"></i> %s',
                date(Config::get('zvn.format.short_time'), strtotime($time))
            );
        }
        return $xhtml;
    }
    public static function showTimeCreated($time)
    {
        $xhtml = sprintf(
            '<p><i class="fa fa-clock-o"></i> %s</p>',
            date(Config::get('zvn.format.long_time'), strtotime($time))
        );
        return $xhtml;
    }
    public static function showItemStatus($controllerName, $id, $statusValue)
    {
        $tmplStatus = Config::get('zvn.template.status');
        $statusValue        = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        // echo '<h3 style="color:red;">'.$statusValue.'</h3>';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link          = route($controllerName . '/status', ['status' => $statusValue, 'id' => $id]);
        $xhtml = sprintf(
            '<a href="%s" type="button" class="status-modified-%s btn-status btn btn-round %s" data-class="%s">%s</a>',
            $link,
            $id,
            $currentTemplateStatus['class'],
            $currentTemplateStatus['class'],
            $currentTemplateStatus['name']
        );
        return $xhtml;
    }
    public static function showItemTypeCoupon($typeCouponValue)
    {
        $tmplStatus = Config::get('zvn.template.type_coupon');
        $statusValue        = array_key_exists($typeCouponValue, $tmplStatus) ? $typeCouponValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $xhtml = sprintf(
            '%s',$currentTemplateStatus['name']
        );
        return $xhtml;
    }
    public static function showItemChangePriceStatus($controllerName, $id, $statusValue)
    {
        $tmplStatus = Config::get('zvn.template.change_price_status');
        $statusValue        = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $link          = route($controllerName . '/change-price-status', ['status' => $statusValue, 'id' => $id]);
        $xhtml = sprintf(
            '<a href="%s" type="button" class="change-price-modified-%s btn-price btn btn-round %s" data-class="%s">%s</a>',
            $link,
            $id,
            $currentTemplateStatus['class'],
            $currentTemplateStatus['class'],
            $currentTemplateStatus['name']
        );
        return $xhtml;
    }
    public static function showItemOrdering($controllerName, $id, $orderingValue, $fieldName)
    {
        $tmplOrdering = config('zvn.template.form_ordering.class');
        $link          = route($controllerName . '/ordering', [$fieldName => 'new_value', 'id' => $id]);
        $xhtml = sprintf(
            '<input type="number" pattern="[\d]+" title="Chỉ được nhập số"  class="%s input-ordering input-ordering-%s" data-url="%s" value="%s">',
            $tmplOrdering,
            $id,
            $link,
            $orderingValue
        );
        return $xhtml;
    }
    public static function showItemIsHome($controllerName, $id, $isHomeValue)
    {
        $tmplIsHome = Config::get('zvn.template.is_home');
        $isHomeValue        = array_key_exists($isHomeValue, $tmplIsHome) ? $isHomeValue : 'yes';
        $currentTemplateIsHome = $tmplIsHome[$isHomeValue];
        $link          = route($controllerName . '/isHome', ['is_home' => $isHomeValue, 'id' => $id]);

        $xhtml = sprintf(
            '<a href="%s" type="button" class="btn btn-round %s">%s</a>',
            $link,
            $currentTemplateIsHome['class'],
            $currentTemplateIsHome['name']
        );
        return $xhtml;
    }
    public static function showItemIsFooter($controllerName, $id, $isFooterValue)
    {
        $tmplIsFooter = Config::get('zvn.template.is_footer');
        $isFooterValue        = array_key_exists($isFooterValue, $tmplIsFooter) ? $isFooterValue : 'no';
        $currentTemplateIsFooter = $tmplIsFooter[$isFooterValue];
        $link          = route($controllerName . '/isFooter', ['is_footer' => $isFooterValue, 'id' => $id]);

        $xhtml = sprintf(
            '<a href="%s" type="button" class="footer-modified-%s btn-footer btn btn-round %s" data-class="%s">%s</a>',
            $link,
            $id,
            $currentTemplateIsFooter['class'],
            $currentTemplateIsFooter['class'],
            $currentTemplateIsFooter['name']
        );
        return $xhtml;
    }
    public static function showItemSelect($controllerName, $id, $displayValue, $fieldName, $forSpecial = 'type-default', $arrData = null)
    {
        $link          = route($controllerName . '/' . $fieldName, [$fieldName => 'new_value', 'id' => $id]);

        switch ($forSpecial) {
            case 'type-default':
            case 'type-menu':
            case 'type-open':
                $tmplDisplay = Config::get('zvn.template.' . $fieldName);
                break;
            case 'type-category':
                $tmplDisplay = $arrData;
                break;
            case 'type-booking':
                $tmplDisplay = Config::get('zvn.template.type_booking');
                break;
        }

        $xhtml = sprintf('<select data-url="%s" class="form-control select-%s select-%s-%s">', $link, $forSpecial, $forSpecial, $id);
        if (!empty($forSpecial))
            $xhtml = sprintf('<select data-url="%s" class="form-control select-%s select-%s-%s">', $link, $forSpecial, $forSpecial, $id);
        foreach ($tmplDisplay as $key => $value) {
            $xhtmlSelected = '';
            if ($forSpecial !== 'type-category' && $key == $displayValue) $xhtmlSelected = 'selected="selected"';
            if (($forSpecial === 'type-category' || $forSpecial === 'type-booking') && $key == $displayValue) $xhtmlSelected = 'selected="selected"';
            if ($forSpecial === 'type-category')
                $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value);
            else $xhtml .= sprintf('<option value="%s" %s>%s</option>', $key, $xhtmlSelected, $value['name']);
        }
        $xhtml .= '</select>';

        return $xhtml;
    }
    public static function showItemThumb($controllerName, $thumbName, $thumbAlt, $page = 'default')
    {
        $xhtml = null;
        if ($thumbName !== null) {
            $xhtml = sprintf(
                '<img src="%s" alt="%s" class="zvn-thumb">',
                asset("images/$controllerName/$thumbName"),
                $thumbAlt
            );
            if ($page === 'product') {
                $thumbName = json_decode($thumbName, true);
                $thumbName = array_shift($thumbName)['imageName'];
                $xhtml = sprintf(
                    '<img src="%s" alt="%s" class="zvn-thumb">',
                    asset("images/$controllerName/$thumbName"),
                    $thumbAlt
                );
            }
            if ($page === 'review' || $page === 'employee') {

                $xhtml = sprintf(
                    '<img src="%s" alt="%s" class="zvn-thumb zvn-resize">',
                    asset("images/$controllerName/$thumbName"),
                    $thumbAlt
                );
            }
        }
        return $xhtml;
    }
    public static function showButtonAction($controllerName, $id)
    {
        $tmplButton   = Config::get('zvn.template.button');
        $buttonInArea = Config::get('zvn.config.button');

        $controllerName = (array_key_exists($controllerName, $buttonInArea)) ? $controllerName : "default";
        $listButtons    = $buttonInArea[$controllerName]; // ['edit', 'delete']

        $xhtml = '<div class="zvn-box-btn-filter">';

        foreach ($listButtons as $btn) {
            $currentButton = $tmplButton[$btn];

            $link = route($controllerName . $currentButton['route-name'], ['id' => $id]);
            $xhtml .= sprintf(
                '<a href="%s" type="button" class="btn btn-icon %s" data-toggle="tooltip" data-placement="top"
                    data-original-title="%s">
                    <i class="fa %s"></i>
                </a>',
                $link,
                $currentButton['class'],
                $currentButton['title'],
                $currentButton['icon']
            );
        }

        $xhtml .= '</div>';

        return $xhtml;
    }
    public static function showDatetimeFrontend($dateTime)
    {
        return date_format(date_create($dateTime), Config::get('zvn.format.short_time'));
    }
    public static function showContent($content, $length, $prefix = '...')
    {
        $prefix = ($length == 0) ? '' : $prefix;
        $content = str_replace(['<p>', '</p>'], '', $content);
        return preg_replace('/\s+?(\S+)?$/', '', substr($content, 0, $length)) . $prefix;
    }
    public static function showNestedSetName($name, $level)
    {
        $xhtml = '';
        for ($i = 1; $i < $level; $i++) {
            $xhtml .= '|------ ';
        }
        $xhtml .= sprintf('
        <span class="label label-danger">%s</span>
        <b>%s</b>
        ', $level, $name);
        return $xhtml;
    }
    public static function showOrderingUpDown($controllerName, $id)
    {
        $upButton = sprintf('
        <a href="%s" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="" data-original-title="Up">
            <i class="fa fa-arrow-up"></i>
        </a>', route("$controllerName/ordering", ['id' => $id, 'type' => 'up']));

        $downButton = sprintf('
        <a href="%s" type="button" class="btn btn-primary btn-sm" data-toggle="tooltip" title="" data-original-title="Down">
            <i class="fa fa-arrow-down"></i>
        </a>', route("$controllerName/ordering", ['id' => $id, 'type' => 'down']));

        switch ($controllerName) {
            case 'category-article':
                $node =  CategoryArticleModel::find($id);
                break;
            case 'category-product':
                $node =  CategoryProductModel::find($id);
                break;
            case 'menu':
                $node =  MenuModel::find($id);
                break;
        }

        if (empty($node->getPrevSibling())) $upButton = '';
        if (empty($node->getNextSibling())) $downButton = '';


        $xhtml = '
        <span style="width: 42px; display: inline-block">' . $upButton . '</span>
        <span style="width: 42px; display: inline-block">' . $downButton . '</span>
        ';

        return $xhtml;
    }
    public static function recursiveMenu($items, $type = null, &$xhtmlMenu = '', $ulClass = "dropdown-menu icon-fa-caret-up submenu-hover")
    {
        $xhtmlMenu .= '<ul class="' . $ulClass . '">';
        foreach ($items as $key => $value) {
            switch ($type) {
                case 'article':
                    $link = URL::linkCategoryArticle($value['id'], $value['name']);
                    break;
                case 'product':
                    $link = URL::linkProduct($value['id'], $value['name']);
                    break;
                default:
                    $link = $value['link'];
                    break;
            }
            $arrow = !empty($value['children']) ? '<b class="caret"></b>' : '';
            // call show toastr warning replace redirect page maintenance
            $callFuncToastWarning = null;
            if(strpos($link,'maintenance')){
                $link = 'javascript:void(0)';
                $callFuncToastWarning = 'onclick="showMaintenanceNotify()"';
            }
            $xhtmlMenu .= sprintf('<li class="submenu-hover1"><a href="%s" %s>%s %s</a>', $link, $callFuncToastWarning , $value['name'], $arrow);
            if (!empty($value['children'])) {
                self::recursiveMenu($value['children'], $type, $xhtmlMenu, 'dropdown-menu dropdown-margin');
            }
            $xhtmlMenu .= '</li>';
        }
        $xhtmlMenu .= '</ul>';
        return $xhtmlMenu;
    }
    public static function recursiveMenuProduct($items, &$xhtmlMenu = '')
    {
        $xhtmlMenu .= '<ul>';
        foreach ($items as $key => $value) {
            $link = URL::linkCategoryProduct($value['id'], $value['name']);
            // $xhtmlMenu .= '<li><a href="' . $link . '">' . $value['name'] . '</a>';
            $xhtmlMenu .= sprintf('<li><a href="%s">%s</a>', $link, $value['name']);
            if ($value['children']) {
                self::recursiveMenuProduct($value['children'], $xhtmlMenu);
            }
            $xhtmlMenu .= '</li>';
        }
        $xhtmlMenu .= '</ul>';
        return $xhtmlMenu;
    }
    public static function showGroupAttributeName($arrID)
    {
        $xhtml = null;
        $params = json_decode($arrID);
        $groupAttrModel = new GroupAttributeModel();
        $groupAttrName = $groupAttrModel->listItems($params, ['task' => 'admin-list-items-name-in-index']);
        foreach ($groupAttrName as $key => $value) {
            $xhtml .= "- " . $value . "<br/>";
        }
        return $xhtml;
    }
    public static function showAttributeInGroup($ID)
    {
        $xhtml = null;
        $attrModel = new AttributeModel();
        $attrName = $attrModel->listItems($ID, ['task' => 'admin-show-attribute-in-group']);
        foreach ($attrName as $key => $value) {
            $xhtml .= "- " . $value . "<br/>";
        }
        return $xhtml;
    }
    public static function showPrice($priceValue, $format = 'right', $currency = 'đ')
    {
        $xhtml = null;
        $xhtml         = $currency . number_format($priceValue);
        if ($format === 'right') {
            $xhtml = number_format($priceValue) . $currency;
        }
        return $xhtml;
    }
    public static function showChangeCategory($arrayData, $displayValue, $id)
    {
        $xhtml = null;
        $link = route('product/changeCategory', []);
        $xhtml .= '<select class="form-control col-md-6 col-xs-12 change-category change-category-' . $id . '" id="category_id" name="category_id"  data-id="' . $id . '">';
        foreach ($arrayData as $key => $value) {
            if (strpos($value, $displayValue))
                $xhtml .= '<option value="' . $key . '" selected>' . $value . '</option>';
            else
                $xhtml .= '<option value="' . $key . '">' . $value . '</option>';
        }
        $xhtml .= '</select>';
        return $xhtml;
    }
    public static function showSelectFilter($controllerName, $arrayData, $valueFilter, $field)
    {
        $xhtml = '<form class="form-horizontal" role="form" enctype="multipart/form-data">';
        $xhtml = '<select class="form-control" style="width:auto;display:inline" data-filter="' . $field . '" name=select_filter>';
        $arrayData = ['all' => '- Tất cả -'] + $arrayData;
        foreach ($arrayData as $key => $value) {
            $selected = ($key == $valueFilter) ? 'selected=selected' : '';
            $xhtml .= '<option value="' . $key . '" ' . $selected . '>' . $value . '</option>';
        }
        $xhtml .= '</select></form>';
        return $xhtml;
    }
    public static function showSelectCategory($arrayValue, $controllerName, $id, $displayValue, $fieldName)
    {
        $link = route($controllerName . '/' . $fieldName, [$fieldName => 'new_value', 'id' => $id]);
        $xhtml = '<select name="select_change_category_ajax" data-url="' . $link . '"  class="form-control select_change_category_' . $id . '">';
        foreach ($arrayValue as $key => $value) {
            $xhtmlSelected = ($key == $displayValue) ? 'selected="selected"' : '';
            $xhtml .= '<option ' . $xhtmlSelected . ' value="' . $key . '">' . $value . '</option>';
        }
        $xhtml .= '</select>';
        return $xhtml;
    }
    public static function generateRandomString($length = 10)
    {
        $characters = '0123456789';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public static function showItemStatusInDashboard($statusValue)
    {
        $tmplStatus = Config::get('zvn.template.status');
        $statusValue        = array_key_exists($statusValue, $tmplStatus) ? $statusValue : 'default';
        $currentTemplateStatus = $tmplStatus[$statusValue];
        $xhtml = sprintf(
            '<a class="btn-status btn btn-round %s" data-class="%s">%s</a>',
            $currentTemplateStatus['class'],
            $currentTemplateStatus['class'],
            $currentTemplateStatus['name']
        );
        return $xhtml;
    }
    public static function getStringByLength($string, $length)
    {
        if (strlen($string) < $length) return $string;
        $index = \strpos($string, ' ', $length);
        return \substr($string, 0, $index) . '...';
    }
    public static function showNotify(){
        if (session('errorNotify')) {
            $message = session('errorNotify');
            echo "<script>errorNotify('$message')</script>";
        }
    }
}
