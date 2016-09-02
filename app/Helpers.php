<?php

/**
 * @param $value
 * @param string $dash
 * @return string
 */
function display($value, $dash = 'NA')
{
    if (empty($value))
        return $dash;

    return $value;
}

/**
 * @param $width
 * @return mixed
 */
function user_avatar($width)
{
    if ($image = auth()->user()->image)
    {
        return asset($image->thumbnail($width, $width));
    } else
    {
        return asset(config('paths.placeholder.avatar'));
    }
}
