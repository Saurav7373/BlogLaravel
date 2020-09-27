@extends('admin/layouts.app')


@section('head')

<link rel="stylesheet" href="{{ asset('admin/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Blank page
            <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Examples</a></li>
            <li class="active">Blank page</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
            <div class="box-header with-border">
                <h3 class="box-title">Title</h3>
                <center> <a class="btn btn-success" href="{{ route('category.create')}}">Add New</a></center>
            </div>
            <div class="box-body">


                <div class="box-body">
                    <table id="example2" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Category Name</th>
                                <th>slug</th>
                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{ $loop->index +1}}</td>
                                <td>{{ $category->name}}
                                </td>
                                <td>{{ $category->slug}}
                                </td>
                                <td><a href="{{route('category.edit',$category->id)}}"><i style="color:orange" class="fa fa-fw fa-edit"></a></i></td>
                            <td>
                                <form id="delete-form-{{ $category->id }}" method="post" style="display: none" action="{{ route('category.destroy',$category->id)}}">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE')}}
                                </form>
                                <a href="" onclick="if(confirm('Are you really delete this category?'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $category->id }}').submit();
                                }
                                else{
                                    event.preventDefault()
                                    }"><i style="color:red" class="fa fa-fw fa-trash"></a></i>
                            </td>

                        </tr>


                        @endforeach
                            </tfoot>
                    </table>
                </div>

            </div>
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

@endsection

@section('footersection')
<script src={{ asset('admin/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}></script>
<script src={{ asset('admin/bower_components/datatables.net/js/jquery.dataTables.min.js') }}></script>
<script>
    $(function() {
        $('#example2').DataTable({})
    })
</script>


@endsection