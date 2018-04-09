@extends('admins.admin1')
@section('headpost')
    <link rel="stylesheet" href="{{asset('admins/bower_components/select2/dist/css/select2.min.css')}}">
@endsection
@section('footerpost')
    <script src="{{asset('admins/bower_components/select2/dist/js/select2.full.min.js')}}"></script>
    <script>
        $(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    });
    </script>
@endsection
@section('main')
<div class="content-wrapper" style="margin-left: 0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Title
            <small>Sub title</small>
        </h1>

    </section>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Post</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if(count($errors))
            @foreach($errors->all() as $error)
            <p class="alert alert-error">{{$error}}</p>
            @endforeach
        @endif
        <form role="form" enctype="multipart/form-data" @if(isset($post))action="{{route('post.update',$post->id)}}"else action="{{route('posts.store')}}"@endif method="post">
            {{csrf_field()}}
            @if(isset($post)){{method_field('PUT')}}@endif
            <div class="box-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" id="title" name="title" placeholder="title" @if(isset($post))value='{{$post->title}}'@endif>
                    </div>
                    <div class="form-group">
                        <label for="subtitle">SubTitle</label>
                        <input type="text" class="form-control" id="subtitle" name="subtitle" placeholder="subtitle" @if(isset($post))value='{{$post->sub_title}}'@endif>
                    </div>
                    <div class="form-group">
                        <label for="slug">Slug</label>
                        <input type="text" class="form-control" id="slug" name="slug" placeholder="slug" @if(isset($post))value='{{$post->slug}}'@endif>
                    </div>
                </div>
                <div class="col-lg-6"> 
                    
                        <div class="form-group pull-left">
                        
                            <label for="exampleInputFile">Image</label>
                            <input type="file" id="image" name="image" @if(isset($post))value='{{$post->img}}'@endif>
                        </div>
                        
                        <div class="checkbox pull-right">
                             <label>
                                    <input type="checkbox" name="status" @if(isset($post) and $post->status=='on'){{"checked"}} @endif> Publish
                             </label>
                        </div> 
                        <br>
                        <br>
                        <div class="form-group" style="margin-top: 30px">
                            <label >Tags</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;" name="tags[]">
                              @foreach($tags as $tag)
                              <option value="{{$tag->id}}"
                                      @if(isset($post))
                                        @foreach($post->tags as $postTag)
                                          @if($tag->id ==$postTag->id)
                                          selected
                                          @endif
                                        @endforeach
                                      @endif
                                      >{{$tag->name}}</option>
                              @endforeach
                            </select>
                        </div>
                       
                        
                        <div class="form-group" style="margin-top: 20px;">
                            <label >Categories</label>
                            <select class="form-control select2" multiple="multiple" data-placeholder="Select a State"
                                    style="width: 100%;" name="categories[]">
                              @foreach($categories as $category)
                              <option value="{{$category->id}}"
                                      @if(isset($post))
                                        @foreach($post->categories as $postCategory)
                                          @if($category->id ==$postCategory->id)
                                          selected
                                          @endif
                                        @endforeach
                                      @endif
                                      >{{$category->name}}</option>
                              @endforeach
                              
                            </select>
                        </div>
                        
                    </div>
                    
                    
                    
                </div>      
            </div>
            <!-- /.box-body -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Write Post Body Here!
                        <small>Simple and fast</small>
                    </h3>
                    <!-- tools box -->
                    <div class="pull-right box-tools">
                        <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip"
                                title="Collapse">
                            <i class="fa fa-minus"></i></button>

                    </div>
                    <!-- /. tools -->
                </div>
                <!-- /.box-header -->
                <div class="box-body pad">

                    <textarea class="textarea" name="body" placeholder="Place some text here"
                              style="width: 100%; height: 300px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">@if(isset($post)){{$post->body}}@endif</textarea>

                </div>
            </div>
            <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a  href="{{route('post.index')}}" class="btn btn-warning">Back</a>

            </div>
        </form>
    </div>

    <!-- Main content -->

    <!-- /.content -->
</div>

@endsection

