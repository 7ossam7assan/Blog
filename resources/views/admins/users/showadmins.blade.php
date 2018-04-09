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
            Admins
            <small>Sub title</small>
        </h1>

    </section>
    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">Admins</h3>
             <a class="col-lg-offset-5 btn btn-primary" href="{{route('admin.create')}}">Create Admin</a>
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
                      <th>Admin_ID</th>
                      <th>Name</th>
                      <th>Email</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($admins as $admin)
                        <tr>
                            <td>
                                {{$admin->id}}
                            </td>
                            <td>
                                {{$admin->name}}
                            </td>
                            <td>
                                {{$admin->email}}
                            </td>
                            <td>
                                <a class="primary btn-success" href="{{route('admin.edit',$admin->id)}}">Edit<i class="fa fa-fw fa-edit"></i></a>
                            </td>
                            <td>
                                <form action="{{route('admin.destroy',$admin->id)}}" id="delete-form-{{$admin->id}}" method="post">
                                    {{csrf_field()}}
                                    {{method_field('delete')}}
                                </form>
                                <a class="primary btn-success" onclick="
                                      if(confirm('are you sure?')){
                                        event.preventDefault;document.getElementById('delete-form-{{$admin->id}}').submit();
                                      }else{
                                          event.preventDefault;
                                      }  
                                   ">delete<i class="fa fa-fw fa-trash"></i></a>
                            </td>
                            
                        </tr>
                    @endforeach
                    <tr>
                      <td>Trident</td>
                      <td>Internet
                        Explorer 4.0
                      </td>
                      <td>Win 95+</td>
                      <td> 4</td>
                      <td>X</td>
                    </tr>
                
                </tbody>
                <tfoot>
                    <tr>
                      <th>Admin_ID</th>
                      <th>Name</th>
                      <th>Email</th>
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



