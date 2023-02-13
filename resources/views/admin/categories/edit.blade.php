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
                            <form action="{{route('admin.categories.update',$category->id)}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <input type="hidden" name="id" value="{{ $category->id }}">
                                        <label for="exampleInputEmail1">{{__('messages.category')}}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$category->name}}"
                                            placeholder="{{$category->name}}">
                                        @error('name')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputPassword1">{{__('message.image')}}</label>
                                        <input id="image" type="file" name="image" class="form-control" id="exampleInputEmail1">
                                        @error('image')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                        <img id="imgPreview" width="100px" height="100px" src="{{url('assets/admin/images/categories/'.$category->image)}}">
                                    </div>

                                <div class="card-footer">
                                    <input type="submit" value="update" name="{{__('messages.update')}}"
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
