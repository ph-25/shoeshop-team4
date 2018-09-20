@extends('admin.master')
@section('content')
 <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                 
                        <h1 class="text-center">Danh Sách Thương hiệu     </h1> 
                       
                        <div >
                            @if(session('message'))
                                <div class="alert alert-success">
                                    {{session('message')}}
                                </div>
                            @endif
                        </div>   
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                            <tr align="center">
                                <th>ID</th>
                                <th>Tên thương hiệu</th>
                                <th>Delete</th>
                                <th>Edit</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            @foreach($Brand as $Brand)
                            <tr class="odd gradeX" align="center">
                                <td>{{$Brand->id}}</td>
                                <td>{{$Brand->name}}</td>
                                
                               
                                
            
                                <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a class='btn-del' href="admin/brand/xoa/{{$Brand->id}}"> Xóa</a></td>
                                <td class="" ass="center"><i class="fa fa-pencil fa-fw"></i> <a href="admin/brand/sua/{{$Brand->id}}">Sửa</a></td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
</div>
@endsection