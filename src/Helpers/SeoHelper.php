<?php

namespace Helpers;

use Illuminate\Support\Str;

class SeoHelper
{
    public static function setUrl($url)
    {
        if (!$url)

            return null;

        if (Str::contains($url, '/en/'))
            {
                return Str::replace('/en/', '/', $url);
            }

        return $url;
    }
}