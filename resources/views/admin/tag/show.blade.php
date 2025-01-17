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

                <center> <a class="btn btn-success" href="{{ route('tag.create')}}">Add New</a></center>
            </div>
            <div class="box-body">
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">Data Table With Full Features</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>S.No</th>
                                    <th>Tag Name</th>
                                    <th>slug</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                <tr>
                                    <td>{{ $loop->index +1}}</td>
                                    <td>{{ $tag->name}}
                                    </td>
                                    <td>{{ $tag->slug}}
                                    </td>
                                    <td><a href="{{route('tag.edit',$tag->id)}}"><i style="color:orange" class="fa fa-fw fa-edit"></a></i></td>
                            <td>
                                <form id="delete-form-{{ $tag->id }}" method="post" style="display: none" action="{{ route('tag.destroy',$tag->id)}}">
                                    {{ csrf_field()}}
                                    {{ method_field('DELETE')}}
                                </form>
                                <a href="" onclick="if(confirm('Are you really delete this tag?'))
                                {
                                    event.preventDefault();
                                    document.getElementById('delete-form-{{ $tag->id }}').submit();
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
                <!-- /.box -->
            </div>
        </div>

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
        $('#example1').DataTable()

    })
</script>


@endsection