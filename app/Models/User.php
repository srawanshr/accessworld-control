<?php

namespace App\Models;

use Laravel\Passport\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Bican\Roles\Traits\HasRoleAndPermission;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Bican\Roles\Contracts\HasRoleAndPermission as HasRoleAndPermissionContract;

class User extends Authenticatable implements HasRoleAndPermissionContract {

    use Notifiable, SoftDeletes, HasRoleAndPermission, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'first_name', 'last_name', 'phone', 'address', 'activation_code'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes appended in the JSON form.
     *
     * @var array
     */
    protected $appends = [
        'name'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'username';
    }

    /**
     * Append display name to JSON form
     * @return string
     */
    public function getNameAttribute()
    {
        return empty($this->first_name) ? ucwords($this->username) : ucwords($this->first_name) . ' ' . ucwords($this->last_name);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne('App\Models\Image', 'imageable');
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        $this->image->delete();

        return parent::delete($options);
    }
}
