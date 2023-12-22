<?php

namespace Helpers;

use  Edguy\AdminPanel\Models\Seo;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;

class ItemActionHelper
{
    public static function createFromRequest($request, $item)
    {
        $data = Arr::except($request->validated(), ['main_image', 'images', 'image']);

        !$item instanceof Seo ?: $data['seo_url'] = SeoHelper::setUrl($data['seo_url']);

        !$request->video_id ?: $data['video_id'] = self::getVideoId($data['video_id']);

        $item->fill($data);

        $item->save();

        return $item;
    }

    public static function setAlias($item, $name, $modelQuery)
    {
        if (!$item->alias)
        {
            $alias = self::checkUniqueAlias(Str::slug($name), $modelQuery);

            $item->alias = $alias;

            $item->save();
        }
    }

    private static function checkUniqueAlias($alias, $modelQuery)
    {
        if ($modelQuery->where('alias', '=', Str::slug($alias))->exists())
        {
            $alias = $alias.Str::random(1);

            self::checkUniqueAlias($alias, $modelQuery);
        }

        return $alias;
    }

    private static function getVideoId($url)
    {
        $parsedUrl = parse_url($url);

        !isset($parsedUrl['query']) ?: parse_str($parsedUrl['query'], $queryParams);

        if (isset($queryParams['v']))

            return $queryParams['v'];

       $pathSegments = explode('/', $parsedUrl['path']);

       return end($pathSegments);
    }
}
