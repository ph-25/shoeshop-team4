@extends('admin.master')
@section('content')
       <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-6">
                        <h1 class="page-header">
                          Danh Sách Tài Khoản
                        </h1>

                            @if(session('message'))
                                <div class =" alert alert-success">
                                    {{session('message')}}
                                </div>
                            @endif    
                    
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Họ Tên</th>
                                <th>Email</th>
                                <th>Quyền</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($User as $User)
                            <tr class="odd gradeX" align="center">
                                <td>{{$User->id}}</td>
                                <td>{{$User->name}} </td>
                                <td>{{$User->email}}</td>
                                <td>
                                    @if($User->user_type == 1)
                                       admin
                                    @else
                                       Người dùng
                                    @endif
                                </td>
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class='btn-del' href="admin/User/xoa/{{$User->id}}"> Xóa</a></td>
                                <td class="" ass="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/User/sua/{{$User->id}}">Sửa</a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
 @endsection      
     