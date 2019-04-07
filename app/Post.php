<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class Post extends Model
{
    public static function boot() {
        parent::boot();

        static::saving(function ($model) {
            $model->uuid = Str::uuid();
            $model->user_id = Auth::user()->id;
        });
    }

    public function getRouteKeyName() {
        return 'uuid';
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
