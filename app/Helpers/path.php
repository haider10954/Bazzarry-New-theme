<?php

use App\Models\Category;

function chieldCategory($list,$parent)
{
    if($parent == 0 || $parent == null)
    {
        return $list->whereNull('parent_id');
    }
    return $list->where('parent_id',$parent);
}