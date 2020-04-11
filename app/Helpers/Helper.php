<?php

function createSlug($title, $model, $slugColumn)
{
//    dd($title,$model,$slugColumn);
    $lower_cases = strtolower($title);
    /*Remove ? from Title*/
    $post_slug = str_replace('?', '', $lower_cases);
    $slug = str_replace(' ', '-', $post_slug);
    if ($model::where($slugColumn, '=', $title)->exists())
        $slug = $slug . '-' . ($model::where($slugColumn, '=', $title)->count() + 1);
    return $slug;
}
