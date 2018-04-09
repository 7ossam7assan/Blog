<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\user\post;
class postController extends Controller
{
    public function post(post $slug) {
        
        return view('users.posts',['slug'=>$slug]);
    }
}
