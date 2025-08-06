<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasSlug
{
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

//    public function resolveRouteBindingQuery($query, $value, $field = null){
//
//        $id = explode('_' , $value)[0];
//        return $query->where($field ?? $this->getRouteKeyName(), $id);
//    }
//
//    public function getSlugAttribute(){
//
//        return Str::slug($this->id . ' ' . $this->name);
//    }


}
