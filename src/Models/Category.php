<?php

namespace Dealskoo\Category\Models;

use Dealskoo\Admin\Traits\HasSlug;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;
use Dealskoo\Country\Traits\HasCountry;

class Category extends Model
{
    use HasFactory, SoftDeletes, HasCountry, HasSlug, Searchable;

    protected $fillable = [
        'slug',
        'name',
        'country_id',
        'index',
        'parent_id'
    ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function toSearchableArray()
    {
        return $this->only([
            'slug',
            'name',
            'country_id'
        ]);
    }
}
