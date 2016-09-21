<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Staff extends Model {

    use SoftDeletes;

    protected $table = 'staffs';

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'code', 'fname', 'lname', 'email', 'address', 'phone', 'bloodgroup', 'company', 'is_active'
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
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'is_active' => 'boolean',
    ];

    /**
     * Append display name to JSON form
     * @return string
     */
    public function getNameAttribute()
    {
        return ucwords($this->fname) . ' ' . ucwords($this->lname);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
    public function image()
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    /**
     * Set the title attribute and the slug.
     *
     * @param string $value
     */
    public function setFname($value)
    {
        $this->attributes['fname'] = $value;

        if ( ! $this->exists)
        {
            $this->setCode();
        }
    }

    /**
     * Set code
     * @return void
     */
    protected function setCode()
    {
        $code = intval(static::max('code')) + 1;

        $this->attributes['code'] = $code;
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopeActive($query, $type = true)
    {
        return $query->where('is_active', $type);
    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        if ($this->image)
            $this->image->delete();

        return parent::delete($options);
    }
}
