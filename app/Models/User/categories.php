<?php

namespace App\Models\user;

use Illuminate\Database\Eloquent\Model;

class categories extends Model
{
    protected $fillable=['name','slug'];
    public function posts(){
        return $this->belongsToMany('App\Models\User\post')->orderBy('created_at','DESC')->paginate(2);
    }
    public function getRouteKeyName() {
        return 'slug';
    }
}
