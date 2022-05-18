<?php

namespace Dealskoo\Category\Traits;

use Dealskoo\Category\Models\Category;

trait HasCategory
{
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
