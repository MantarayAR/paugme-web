<?php

namespace App\Services;


class SlugService
{
    public static function getUniqueSlug(Model $model, $suggestedSlug)
    {
        $slug = str_slug($suggestedSlug);

        $slugCount = count($model->whereRaw("slug REGEXP '^{$slug}(-[0-9]+)?$' and id != '{$model->id}'")->get());

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}