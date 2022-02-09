<?php

namespace Dealskoo\Category\Models;

use Dealskoo\Country\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'slug',
        'name',
        'country_id',
        'index',
        'parent_id'
    ];

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

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
