@extends('Admin.layout')
@section('title','Member')
@section('body')
@include('Admin.viewProductModal');
<section class="content-header">
    <h1>
        Member
        <small>Add member</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>image</th>
                                <th>Product Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>PV value</th>
                                <th>Category</th>
                                <th style="width: 230px">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td> <img src="{{asset('storage/uploads/'.$product->product_image)}}" width="90px"></td>
                                <td> {{$product->product_name}}</td>
                                <td>{{$product->product_description}}</td>
                                <td>{{$product->product_price}}</td>
                                <td>{{$product->product_pv_value}}</td>
                                <td>{{$product->cat_id}}</td>
                                <td style="width: 230px">
                                   <button type="button" class="btn btn-default btn-sm " id="read-data">
                                            <i class="glyphicon glyphicon-edit"></i> view</button>
                                   
                                    <a href="{{'/product/'.$product->id.'/edit'}}"  style="color: white">  <button type="button" class="btn btn-warning btn-sm ">
                                            <i class="glyphicon glyphicon-edit"></i> update</button>
                                    </a>
                                    <a href=""  style="color: white">  <button type="button" class="btn btn-danger btn-sm ">
                                            <i class="glyphicon glyphicon-trash"></i> delete </button>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> 
</section>
@endsection

@section('script')
<script type="text/javascript">
    $('#read-data').on('click',function (){
       alert("sdsdsds"); 
    });
</script>
@endsection