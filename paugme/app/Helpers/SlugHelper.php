<?php

namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class SlugHelper
{
    public static function getUniqueSlug(Model $model, $suggestedSlug)
    {
        $slug = str_slug($suggestedSlug);

        $queryBuilder = $model->where('slug', '~', "^{$slug}(-[0-9]+)?$");

        if ( ! empty( $model->id ) ) {
            $queryBuilder = $queryBuilder->where('id', '!=', $model->id);
        }

        $currentModels = $queryBuilder->get();

        $slugCount = count($currentModels);

        return ($slugCount > 0) ? "{$slug}-{$slugCount}" : $slug;
    }
}