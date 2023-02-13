@extends('admin.layout');

@section('content')


<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">







            <div class="row">
                <div class="col-12">
                    <!-- Default box -->
                    <div class="card">
                        <div class="card-body">
                            <form id="form" action="">

                                @csrf

                                <div class="card-body">

                                    <div class="form-group">
                                        <div id="categories_id" class="text-danger"></div>
                                        <label for="exampleInputEmail1">{{__('messages.categories')}}<label>
                                        <select name="categories_id" class="form-control">
                                            <option value="">{{__('messages.choose category')}}</option>
                                            @foreach ($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                            @endforeach
                                        </select>

                                    </div>


                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('messages.name')}}</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputEmail1"
                                            placeholder="name">

                                        <div id="name" class="text-danger"></div>

                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('messages.description')}}</label>
                                        <input type="text" name="description" class="form-control" id="exampleInputEmail1" placeholder="{{__('messages.description')}}">
                                        <div id="description" class="text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('messages.purchase price')}}</label>
                                        <input type="text" name="purchase_price" class="form-control" id="exampleInputEmail1" placeholder="name">
                                        <div id="purchase_price" class="text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('messages.sale price')}}</label>
                                        <input type="text" name="sale_price" class="form-control" id="exampleInputEmail1" placeholder="name">
                                        <div id="sale_price" class="text-danger"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">{{__('messages.stock')}}</label>
                                        <input type="text" name="stock" class="form-control" id="exampleInputEmail1" placeholder="name">
                                        <div id="stock" class="text-danger"></div>
                                    </div>


                                <div class="card-footer">
                                    <button id="save" class="btn btn-primary">{{__('messages.save')}}</button>
                                </div>

                                <div id='success' class="alert alert-success" style="display: none;" >data saved successfully</div>

                                <div>
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
    $(document).ready(function(){
    $('#save').click(function(e){

        $("#categories_id").text("");
        $("#name").text("");
        $("#description").text("");
        $("#purchase_price").text("");
        $("#sale_price").text("");
        $("#stock").text("");

            e.preventDefault();
            var formData=new FormData($('#form')[0]);

            $.ajax({
                type:'post',
                url:'store',
                data:formData,
                processData:false,
                contentType:false,
                cache:false,
                success:function(data){
                    if(data.status == true)
                        $('#success').show();

                },
                error:function(rejected){
                    var message=$.parseJSON(rejected.responseText);
                    $.each(message.errors,function(key,value){
                        $('#'+key).text(value[0]);
                    })
                },
            });

        });

    });



</script>


@endsection


