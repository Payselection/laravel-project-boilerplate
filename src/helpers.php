<?php

if (!function_exists('base_url')) {
    function base_url(): string
    {
        if (app()->environment() === 'testing') {
            $url = env('NGROCK_HOST');
        } elseif (app()->environment() === 'local') {
            $request = request();
            $url = 'https://' . $request->httpHost();
        } else {
            $url = url('/');
        }
        if (empty($url) && !is_string($url)) {
            throw new \Exception('Incorrect base url');
        }
        return $url;
    }
}
