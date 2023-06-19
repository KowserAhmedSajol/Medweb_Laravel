<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait Sluggable
{
    public static function bootSluggable()
    {
        static::saving(function ($model) {
            $slug = '';
            for ($i = 0, $max = count($model->sluggable); $i < $max; $i++) {
                $slug .= Str::slug($model->{$model->sluggable[$i]});

                if ($max > 1 && $i < ($max - 1))
                    $slug .= '-';
            }
            $model->slug = $slug;
        });
    }
}
