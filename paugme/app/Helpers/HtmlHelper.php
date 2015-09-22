<?php

namespace App\Helpers;

class HtmlHelper
{
    /**
     * Return "checked" if true
     *
     * @param $value Boolean
     * @return string
     */
    public static function checked($value)
    {
        return $value ? 'checked' : '';
    }

    /**
     * Return image url for headers
     *
     * @param $value string
     * @return string
     */
    public function page_image($value = null)
    {
        if (empty($value)) {
            $value = config('blog.page_image');
        }

        if (!starts_with($value, 'http') && $value[0] !== '/') {
            $value = config('blog.uploads.webpath') . '/' . $value;
        }

        return $value;
    }
}