<?php

namespace App\Helpers;

use Illuminate\Support\Str;

class URL
{
    public static function linkCategoryArticle($id, $name)
    {
        return route('category-article/index', [
            'category_id'   => $id,
            'category_name' => Str::slug($name)
        ]);
    }
    public static function linkCategoryProduct($id, $name)
    {
        return route('category-product/index', [
            'category_id'   => $id,
            'category_name' => Str::slug($name)
        ]);
    }

    public static function linkArticle($id, $name)
    {
        return route('article/index', [
            'article_id'   => $id,
            'article_name' => Str::slug($name)
        ]);
    }
    public static function linkProduct($id, $name)
    {
        return route('product/index', [
            'product_id'   => $id,
            'product_name' => Str::slug($name)
        ]);
    }
    public static function linkTags($id, $name)
    {
        return route('tags/index', [
            'tags_id'   => $id,
            'tags_name' => Str::slug($name)
        ]);
    }

    public static function linkImage($controllerName, $imageName)
    {
        return asset("images/$controllerName/$imageName");
    }
}
