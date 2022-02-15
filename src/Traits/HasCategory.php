<?php

namespace Dealskoo\Category\Traits;

trait HasCategory
{
    public function category()
    {
        return $this->belongsTo(\Dealskoo\Category\Models\Category::class);
    }
}
