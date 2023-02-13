@extends('admin.layout');

@section('content')


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">


            @if(Session::has('message'))
            <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
            @endif


            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form action="{{url('admin/categories/store')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('messages.category name')}}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="name">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('messages.image')}}</label>
                                        <input id="image" type="file" name="image" class="form-control" id="exampleInputEmail1">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <img id="imgPreview" width="100px" height="100px" src="{{url('assets/admin/images/categories/noImage.jpg')}}">
                                    </div>

                                <div class="card-footer">
                                    <input type="submit" value="add" name="{{__('messages.add')}}"
                                        class="btn btn-primary">
                                </div>
                            </form>
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


@section('ajax')
<script>
    $(document).ready(() => {
        $("#image").change(function () {
            const file = this.files[0];
            if (file) {
                let reader = new FileReader();
                reader.onload = function (event) {
                    $("#imgPreview").attr("src", event.target.result);
                };
                reader.readAsDataURL(file);
            }
        });
    });


</script>


@endsection
