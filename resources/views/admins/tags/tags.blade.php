@extends('admins.admin1')
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
              <h3 class="box-title">Tags</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             @if(count($errors))
                @foreach($errors->all() as $error)
                <p class="alert alert-error">{{$error}}</p>
                @endforeach
             @endif
             <form role="form" @if(isset($tag))action="{{route('tag.update',$tag->id)}}" else action="{{route('tag.store')}}"@endif method="post">
                {{csrf_field()}}
                @if(isset($tag)){{method_field('PUT')}}@endif
              <div class="box-body">
                <div class="col-lg-6">
                        <div class="form-group">
                          <label for="title">Title</label>
                          <input type="text" class="form-control" id="tagtitle" name="name" placeholder="tagtitle" @if(isset($tag))value='{{$tag->name}}'@endif>
                        </div>
                        
                        <div class="form-group">
                          <label for="slug">Slug</label>
                          <input type="text" class="form-control" id="tagslug" name="slug" placeholder="tagslug" @if(isset($tag))value='{{$tag->slug}}'@endif>
                        </div>
                </div>
                    
              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a  href="{{route('tag.index')}}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
    
    <!-- Main content -->
   
    <!-- /.content -->
  </div>

@endsection
