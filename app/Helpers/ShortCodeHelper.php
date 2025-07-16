<?php

if (!function_exists('encode_id')) {
    function encode_id($id)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $base = strlen($chars);
        $code = '';

        while ($id > 0) {
            $code = $chars[$id % $base] . $code;
            $id = intdiv($id, $base);
        }

        return $code;
    }
}

if (!function_exists('decode_code')) {
    function decode_code($code)
    {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        $base = strlen($chars);
        $id = 0;

        for ($i = 0; $i < strlen($code); $i++) {
            $id = $id * $base + strpos($chars, $code[$i]);
        }

        return $id;
    }
}
