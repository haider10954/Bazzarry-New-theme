<?php

use App\Models\Category;
use App\Models\Variant;

function chieldCategory($list,$parent)
{
    if($parent == 0 || $parent == null)
    {
        return $list->whereNull('parent_id');
    }
    return $list->where('parent_id',$parent);
}

function getCategories()
{
    return Category::whereNull('parent_id')->get();
}

function getVariants()
{
    return Variant::with('values')->get();
}