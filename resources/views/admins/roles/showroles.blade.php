@extends('admins.admin1')
@section('style')
    <link rel="stylesheet" href="{{asset('admins/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
     <link rel="stylesheet" href="{{asset('admins/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endsection
@section('footerjs')
    <script src="{{asset('admins/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('admins/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script>
        $(function () {
          $('#example1').DataTable()
          $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
          })
        })
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
            <h3 class="box-title">Roles</h3>
             <a class="col-lg-offset-5 btn btn-primary" href="{{route('role.create')}}">Create Role</a>
        </div>
        <!-- /.box-header -->
         <div class="box">
            <div class="box-header">
              <h3 class="box-title">Data Table With Full Features</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                      <th>Role_ID</th>
                      <th>Name</th>
                     
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>
                                {{$role->id}}
                            </td>
                            <td>
                                {{$role->name}}
                            </td>
                            
                            <td>
                                <a class="primary btn-success" href="{{route('role.edit',$role->id)}}">Edit<i class="fa fa-fw fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{route('role.destroy',$role->id)}}" id="delete-form-{{$role->id}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                </form>
                                <a class="primary btn-success" onclick="
                                      if(confirm('are you sure?')){
                                        event.preventDefault;document.getElementById('delete-form-{{$role->id}}').submit();
                                      }else{
                                          event.preventDefault;
                                      }  
                                   ">delete<i class="fa fa-fw fa-trash"></i></a>
                            </td>
                            
                        </tr>
                    @endforeach
                    
                
                </tbody>
                <tfoot>
                    <tr>
                      <th>Role_ID</th>
                      <th>Name</th>
                      
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
       
    </div>

    <!-- Main content -->

    <!-- /.content -->
</div>

@endsection



