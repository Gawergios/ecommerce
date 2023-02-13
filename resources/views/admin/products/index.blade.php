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
                    <h1>{{__('messages.products')}}</h1>
                </div>

            </div>
        </div><!-- /.container-fluid -->
    </section>


    <div id='success' class="alert alert-success" style="display: none;">data deleted successfully</div>
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
                                            <th>{{__('messages.description')}}</th>
                                            <th>{{__('messages.purchase price')}}</th>
                                            <th>{{__('messages.sale price')}}</th>
                                            <th>{{__('messages.stock')}}</th>
                                            <th>{{__('messages.profit')}}</th>
                                            <th>{{__('messages.category')}}</th>
                                            <th>{{__('messages.update')}}</th>
                                            <th>{{__('messages.delete')}}</th>

                                        </tr>
                                    </thead>

                                    <tbody>

                                        @foreach ($products as $product)
                                        <tr class="row{{$product->id}}">
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</a></td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->purchase_price}}</td>
                                            <td>{{$product->sale_price}}</td>
                                            <td>{{$product->stock}}</td>
                                            <td>{{$product->sale_price - $product->purchase_price}}</td>
                                            <th><a href="{{url('admin/products/category/'.$product->category->id)}}">{{$product->category->name}}</a></th>


                                            <th><a class="btn btn-info btn-sm"
                                                    href="{{route('admin.products.edit',$product->id)}}">{{__('messages.update')}}</a>
                                            </th>
                                            <th><button  product_id="{{$product->id}}" class="btn btn-danger btn-sm delete">{{__('messages.delete')}}</button></th>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>#</th>
                                            <th>{{__('messages.name')}}</th>
                                            <th>{{__('messages.description')}}</th>
                                            <th>{{__('messages.purchase price')}}</th>
                                            <th>{{__('messages.sale price')}}</th>
                                            <th>{{__('messages.stock')}}</th>
                                            <th>{{__('messages.profit')}}</th>
                                            <th>{{__('messages.category')}}</th>
                                            <th>{{__('messages.update')}}</th>
                                            <th>{{__('messages.delete')}}</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>

                                {{-- <div class="d-flex justify-content-center">
                                    {{ $product->links() }}
                                </div> --}}

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
        $('.delete').click(function(e){
            e.preventDefault();
            var id = $(this).attr('product_id');
            $.ajax({
                type:'post',
                url:"destroy",
                data:{
                    "_token":"{{csrf_token() }}",
                    "id":id,
                },
                success:function(data){
                    if(data.status == true)
                    {
                        $('#success').show();
                        $('.row'+id).remove();
                    }
                    },
                error:function(rejected){
                },
            });
        });
    });
</script>
@endsection
