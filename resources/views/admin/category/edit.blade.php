@extends('admin.layouts.app')


@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Text Editors
            <small>Advanced form element</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Forms</a></li>
            <li class="active">Editors</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Titles</h3>
                    </div>

                    <!-- /.box-header -->
                    <!-- form start -->
                    <form role="form" action="{{ route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        {{ method_field('PUT') }}
                        
                        <div class="box-body">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="name">Category Title</label>
                                    <input type="text" class="form-control" id="name" value="{{ $category->name}}"name="title" placeholder=" Category Title">
                                </div>
                             @include('including.message')


                                <div class="form-group">
                                    <label for="slug">Category Slug</label>
                                    <input type="text" class="form-control" id="slug" value= "{{ $category->slug}}" name="slug" placeholder="Slug">
                                </div>
                                <div class="footer">
                                    <input type="submit" class="btn btn-primary">
                                    <a class="btn btn-warning mx-3" href="{{ route('category.index')}}" >Back</a>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>

                </form>
            </div>
        </div>
    </section>
    <!-- /.col-->
</div>

@endsection