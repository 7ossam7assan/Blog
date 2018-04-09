<?php

namespace App\Http\Controllers\Admins;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User\post;
use App\Models\User\tags;
use App\Models\user\categories;
use DB;
class postsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=post::all();
        return view('admins.posts.showpost',['posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=\App\Models\user\categories::all();
        $tags= \App\Models\user\tags::all();
        
        return view('admins.posts.posts',['tags'=>$tags,'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validate($request, [
           'title'=>'required',
           'subtitle'=>'required',
           'slug'=>'required',
           'body'=>'required',
           'image'=>'required'
           
       ]);
       
       if($request->hasFile('image')){
           $file= request()->file('image');
            $name=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $mim=$file->getMimeType();
            $size=$file->getSize();

            $file->move(public_path('imgs'),'image_'. time().'.'.$ext);
       }
       
            $post=new post;
                     $post->title= request('title');
                     $post->sub_title= request('subtitle');
                     $post->slug= request('slug');
                     $post->status= request('status');                     
                     $post->img= 'image_'. time().'.'.$ext;
                     $post->body= request('body');
                     
           
           
         
           
               
            $post->save();
               
                    $post->categories()->sync(request('categories'));
                  
                
           
           
               
               
                    $post->tags()->sync(request('tags'));
                   
           
       return back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       $post=post::with('tags','categories')->where('id',$id)->first();
        $categories=\App\Models\user\categories::all();
        $tags= \App\Models\user\tags::all();
        
        return view('admins.posts.posts',['post'=>$post,'tags'=>$tags,'categories'=>$categories]);
      
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
           'title'=>'required',
           'subtitle'=>'required',
           'slug'=>'required',
           'body'=>'required',
             'image'=>'required'
           
       ]);
         if($request->hasFile('image')){
          $file= request()->file('image');
            $name=$file->getClientOriginalName();
            $ext=$file->getClientOriginalExtension();
            $mim=$file->getMimeType();
            $size=$file->getSize();

            $file->move(public_path('imgs'),'image_'. time().'.'.$ext);
         }
            $post=post::find($id);
                     $post->title= request('title');
                     $post->sub_title= request('subtitle');
                     $post->slug= request('slug');
                     $post->status= request('status');                     
                     $post->img= 'image_'. time().'.'.$ext;
                     $post->body= request('body'); 
                    $post->save();
           
           
         
           
               
            
               
                    $post->categories()->sync($request->categories);
                  
                
           
           
               
               
                    $post->tags()->sync($request->tags);
                   
       return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        post::where('id',$id)->delete();
        return back();
    }
}
