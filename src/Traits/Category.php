<?php

namespace Dealskoo\Category\Traits;

trait Category
{
    public function category()
    {
        return $this->belongsTo(\Dealskoo\Category\Models\Category::class);
    }
}
