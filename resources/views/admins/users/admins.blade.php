@extends('admins.admin1')
@section('main')
<div class="content-wrapper" style="margin-left: 0">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Admin
            <small>Sub title</small>
        </h1>

    </section>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Admins</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        @if(count($errors))
        @foreach($errors->all() as $error)
        <p class="alert alert-error">{{$error}}</p>
        @endforeach
        @endif
        <form role="form" @if(isset($admin))action="{{route('admin.update',$admin->id)}}" else action="{{route('admin.store')}}"@endif method="post">
              {{csrf_field()}}
              @if(isset($admin)){{method_field('PUT')}}@endif
              <div class="box-body">
                <div class="col-lg-6">
                    <div class="form-group">
                        <label for="title">Name</label>
                        <input type="text" class="form-control" id="tagtitle" name="name" placeholder="admin name" @if(isset($admin))value='{{$admin->name}}'@endif>
                    </div>

                    <div class="form-group">
                        <label for="slug">Email</label>
                        <input type="text" class="form-control"  name="email" placeholder="admin email" @if(isset($admin))value='{{$admin->email}}'@endif>
                    </div>
                    <div class="form-group">
                        <label for="slug">Password</label>
                        <input type="password" class="form-control"  name="password" placeholder="admin password" @if(isset($admin))value='{{$admin->password}}'@endif>
                    </div>
                    
                    <div class="form-group">
                          <label for="slug">Phone</label>
                          <input type="number" class="form-control"  name="phone" placeholder="admin phone" @if(isset($admin))value='{{$admin->phone}}'@endif>
                    </div>
                    <div class="form-group">
                          <label for="slug">Status</label>
                          <input type="text" class="form-control"  name="status" placeholder="admin status" @if(isset($admin))value='{{$admin->status}}'@endif>
                    </div>
                    <div class="form-group">
                        @foreach($roles as $role)
                        <div class="col-lg-3">
                        <div class="checkbox">
                            <label >
                                <input type="checkbox"  name="role"  value='{{$role->id}}'>{{$role->name}}
                            </label>
                        </div>
                        </div>
                       @endforeach
                    </div>
                    
                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                        <a  href="{{route('admin.index')}}" class="btn btn-warning">Back</a>
                    </div>
                </div>
                <!-- /.box-body -->

                
        </form>
    </div>

    <!-- Main content -->

    <!-- /.content -->
</div>

@endsection
