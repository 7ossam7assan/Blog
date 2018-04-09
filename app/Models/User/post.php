<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    protected $fillable=['title','subtitle','slug','body','image','status'];
    public function tags() {
        return $this->belongsToMany('App\Models\User\tags')->withTimestamps();
    }
    public function categories() {
        return $this->belongsToMany('App\Models\User\categories')->withTimestamps();
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}
