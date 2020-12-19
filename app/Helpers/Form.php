<?php

namespace App\Helpers;

use Config;

class Form
{
    public static function show($elements)
    {
        $xhtml = null;
        foreach ($elements as $element) {
            $xhtml .= self::formGroup($element);
        }
        return $xhtml;
    }

    public static function formGroup($element, $params = null)
    {
        $type = isset($element['type']) ? $element['type'] : "input";
        $xhtml = null;

        switch ($type) {
            case 'input':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                        </div>
                    </div>', $element['label'], $element['element']
                );
                break;
            case 'input-product':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-8 col-sm-6 col-xs-12">
                            %s
                        </div>
                    </div>',$element['label'],$element['element']
                );
                break;
            case 'input-code':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-5 col-sm-5 col-xs-11">
                            %s
                        </div>
                        <div class="col-md-1 col-sm-1 col-xs-1">
                            <button type="button" class="btn btn-primary" id="random-code" title="Tạo mới">
                                <span class="fa fa-rotate-left"></span>
                            </span>
                        </button>
                        </div>
                    </div>',$element['label'],$element['element']
                );
                break;
            case 'thumb':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                            <p style="margin-top: 50px;">%s</p>
                        </div>
                    </div>',$element['label'],$element['element'],$element['thumb']
                );
                break;

            case 'avatar':
                $xhtml .= sprintf(
                    '<div class="form-group">
                        %s
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            %s
                            <p style="margin-top: 50px;">%s</p>
                        </div>
                    </div>',$element['label'],$element['element'],$element['avatar']
                );
                break;
            case 'btn-submit':
                $xhtml .= sprintf(
                    '<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                            %s
                        </div>
                    </div>',
                    $element['element']
                );
                break;
            case 'btn-submit-edit':
                $xhtml .= sprintf(
                    '<div class="ln_solid"></div>
                    <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-4">
                            %s
                        </div>
                    </div>',
                    $element['element']
                );
                break;
        }

        return $xhtml;
    }
    public static function showProductAttributeRow()
    {
        $xhtml = null;
        $xhtml .= sprintf('
        <div class="control-group input-group" style="margin-top:10px">
            <div class="col-md-4 col-sm-6 col-xs-12">
                <input type="text" name="attribute[name][]" class="form-control col-md-6 col-xs-12" value="abc">
            </div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <select class="form-control col-md-6 col-xs-12 product-attribute-value attr-tags"name="attribute[value][]" multiple="multiple">
                    <option selected="selected">orange</option>
                    <option>white</option>
                    <option>purple</option>
                </select>
            </div>
            <div class="input-group-btn col-md-1 col-sm-6 col-xs-12">
                <button class="btn btn-danger" class="form-control col-md-6 col-xs-12" type="button"><i class="glyphicon glyphicon-remove"></i> Remove</button>
            </div>
        </div>');
        return $xhtml;
    }
}