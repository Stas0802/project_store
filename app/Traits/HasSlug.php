<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
    /**
     * HasSlug trait  generates a unique slug for a model when it is created.
     * @return void
     */
    protected static function bootHasSlug(): void
    {
        static::creating(function ($model) {
            if (!empty($model->slug)) {
                return;
            }

            $base = Str::slug($model->name);
            $slug = $base;
            $i = 1;

            while ($model::where('slug', $slug)->exists()) {
                $slug = $base . '-' . $i++;
            }

            $model->slug = $slug;
        });
    }
}
