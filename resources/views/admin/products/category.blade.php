@extends('admin.layout');

@section('content')

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">

            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif

            @if(Session::has('delete'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger') }}">{{ Session::get('delete') }}</p>
            @endif

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>{{__('messages.categories')}}</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped container">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('messages.name')}}</th>
                                            <th>{{__('messages.image')}}</th>
                                            <th>{{__('messages.update')}}</th>
                                            <th>{{__('messages.delete')}}</th>

                                        </tr>
                                    </thead>

                                    <tbody>


                                        <tr>
                                            <td>{{$category->id}}</td>
                                            <td>{{$category->name}}</td>
                                            <td><img id="imgPreview" width="100px" height="100px"
                                                    src="{{url('assets/admin/images/categories/'.$category->image)}}">
                                            </td>
                                            <th><a class="btn btn-info btn-sm"
                                                    href="{{route('admin.categories.edit',$category->id)}}">{{__('messages.update')}}</a>
                                            </th>
                                            <th><a class="btn btn-danger btn-sm"
                                                    href="{{url('admin/categories/destroy/'.$category->id)}}">{{__('messages.delete')}}</a>
                                            </th>
                                        </tr>

                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('messages.name')}}</th>
                                            <th>{{__('messages.image')}}</th>
                                            <th>{{__('messages.update')}}</th>
                                            <th>{{__('messages.delete')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
    <!-- /.content -->
</div>


@endsection
