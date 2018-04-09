@extends('admins.admin1')
@section('main')
    <div class="content-wrapper" style="margin-left: 0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Roles
        <small>Sub title</small>
      </h1>
      
    </section>
    <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Roles</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
             @if(count($errors))
                @foreach($errors->all() as $error)
                <p class="alert alert-error">{{$error}}</p>
                @endforeach
             @endif
             <form role="form" @if(isset($role))action="{{route('role.update',$role->id)}}" else action="{{route('role.store')}}"@endif method="post">
                {{csrf_field()}}
                @if(isset($role)){{method_field('PUT')}}@endif
              <div class="box-body">
                <div class="col-lg-6">
                        <div class="form-group">
                          <label for="title">Name</label>
                          <input type="text" class="form-control" id="roletitle" name="name" placeholder="rolename" @if(isset($role))value='{{$role->name}}'@endif>
                        </div>
                        
                        
                </div>
                    
              </div>
              <!-- /.box-body -->
              
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
                <a  href="{{route('role.index')}}" class="btn btn-warning">Back</a>
              </div>
            </form>
          </div>
    
    <!-- Main content -->
   
    <!-- /.content -->
  </div>

@endsection
