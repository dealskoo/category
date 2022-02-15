<?php

namespace Dealskoo\Category\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;
use Dealskoo\Country\Traits\Country;

class Category extends Model
{
    use HasFactory, SoftDeletes, Country;

    protected $fillable = [
        'slug',
        'name',
        'country_id',
        'index',
        'parent_id'
    ];

    public function setSlugAttribute($value)
    {
        $this->attributes['slug'] = Str::lower($value);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
