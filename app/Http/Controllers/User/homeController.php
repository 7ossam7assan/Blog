<?php

namespace App\Http\Controllers\User;

use BootstrapComponents;
use App\Models\user\post;
use App\Models\user\tags;
use App\Models\user\categories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class homeController extends Controller {

    public function index(Request $request) {
        $page = $request->get('page', 1);
        $perPage = 2;
        $posts = post::where('status', 'on')->get();
        return view('users.home', ['posts' => $posts->forPage($page, $perPage), 'pagination' => BootstrapComponents::pagination($posts, $page, $perPage, '', ['arrows' => true])]);
    }

    public function category(Request $request,categories $category) {
        $posts = $category->posts();
        $page = $request->get('page', 1);
        $perPage = 3;

        return view('users.home', ['posts' => $posts->forPage($page, $perPage), 'pagination' => BootstrapComponents::pagination($posts, $page, $perPage, '', ['arrows' => true])]);
    }

    public function tag(Request $request,tags $tag) {
        
        $posts = $tag->posts();
        
        
        $page = $request->get('page', 1);
        $perPage = $posts->perPage();
        
        
        return view('users.home', ['posts' => $posts, 'pagination' => BootstrapComponents::pagination($posts, '', 2, '', ['arrows' => true])]);
    }

}
