<?php
use App\Models\Country;
use App\Models\Ip;
use Torann\GeoIP\GeoIPFacade;

/**
 * @param $value
 * @param string $dash
 * @return string
 */
function display($value, $dash = 'NA')
{
    if (empty( $value )) return $dash;

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
    }
    else
    {
        $user = auth()->user();
    }

    if ($image = $user->image)
    {
        return asset($image->thumbnail($width, $width));
    }
    else
    {
        return asset(config('paths.placeholder.avatar'));
    }
}

/**
 * @param $width
 * @param null $entity
 * @return mixed
 */
function thumbnail($width, $entity = null)
{
    if ( ! is_null($entity)) if ($image = $entity->image) return asset($image->thumbnail($width, $width));

    return asset(config('paths.placeholder.default'));
}

function data_centers()
{
    return App\Models\DataCenter::pluck('name', 'id');
}

function operating_systems()
{
    return App\Models\OperatingSystem::active()->pluck('name', 'id');
}

/**
 * @param $amount
 * @return string
 */
function currency($amount = false)
{
    $prefix = config('website.currency');

    return $amount ? $prefix . ' ' . $amount : $prefix;
}

/**
 * @return array
 */
function vms()
{
    $vms = [];
    foreach (config('xenapi') as $vm => $value)
    {
        if ($value['ACTIVE']) $vms[ $vm ] = $value['URL'];
    }

    return $vms;
}

/**
 * @return mixed
 */
function ips()
{
    return Ip::used(false)->pluck('ip', 'ip');
}

/**
 * @param $query
 * @return mixed
 */
function setting($query)
{
    $setting = \App\Models\Setting::fetch($query)->first();

    return $setting ? $setting->value : null;
}

/**
 * @return mixed
 */
function country()
{
    if(is_null(Session::get('country')))
        Session::put('country', get_geo_code());

    $code = Session::get('country');

    return Country::where('iso_alpha2',$code)->firstOrFail();
}

/**
 * @return mixed
 */
function supported_countries()
{
    return Country::where('is_supported', 1)->get();
}

/**
 * @return mixed
 */
function get_geo_code()
{
    $default = config('geoip.default_location');

    $geo = GeoIPFacade::getLocation();

    if(supported_countries()->where('iso_alpha2', $geo['isoCode'])->first())
        return $geo['isoCode'];
    return $default['isoCode'];
}
