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
 * @param null $username
 * @return mixed
 * @internal param $guard
 */
function user_avatar($width, $username = null)
{
    if ($username)
    {
        $user = \App\Models\User::whereUsername($username)->first();
    } else
    {
        $user = auth()->user();
    }

    if ($image = $user->image)
    {
        return asset($image->path);
    } else
    {
        return asset(config('paths.placeholder.avatar'));
    }
}
