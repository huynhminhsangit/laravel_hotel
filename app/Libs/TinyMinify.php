<?php

namespace App\Libs;
// use TinyHtmlMinifier;
// TODO: use namespace:
// namespace Minifier;
// use App\Libs\TinyHtmlMinifier;

require 'TinyHtmlMinifier.php';

class TinyMinify
{
    public static function html(string $html, array $options = []) : string
    {
        $minifier = new TinyHtmlMinifier($options);
        return $minifier->minify($html);
    }
}
