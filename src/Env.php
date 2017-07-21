<?php

namespace EnvPHP;

class Env
{

    private function __construct()
    {
    }

    public static function prefix($keyword)
    {
        $selected = array_filter($_SERVER, function($key) use($keyword) {
            return Env::startsWith($key, $keyword);
        }, ARRAY_FILTER_USE_KEY);
        return Env::reduce_string($selected, '/\A'.$keyword.'(.*)/');
    }

    public static function suffix($keyword)
    {
        $selected = array_filter($_SERVER, function($key) use($keyword) {
            return Env::endsWith($key, $keyword);
        }, ARRAY_FILTER_USE_KEY);
        return Env::reduce_string($selected, '/(.*)'.$keyword.'\z/');
    }

    private static function reduce_string($arr, $keyword)
    {
        $result = array();
        foreach ($arr as $key => $value) {
            preg_match($keyword, $key, $matches);
            $newKey = strtolower($matches[1]);
            $result[$newKey] = $value;
        }
        return $result;
    }

    private static function startsWith($input, $keyword)
    {
        if (is_string($input)) {
            return substr_compare($input, $keyword, 0, strlen($keyword)) === 0;
        }
    }

    private static function endsWith($input, $keyword)
    {
        if (is_string($input)) {
            return substr_compare($input, $keyword, - strlen($keyword)) === 0;
        }
    }
}
