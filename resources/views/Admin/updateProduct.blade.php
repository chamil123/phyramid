@extends('Admin.layout')

@section('title','Member')

@section('body')
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
    <form  method="post" action="/product/{{$products->id}}" enctype="multipart/form-data">
        {{csrf_field()}}
        <div class="row">

            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Basic details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product name</label>
                            <input type="text" class="form-control" id="product_name" value="{{$products->product_name}}" name="product_name" placeholder="Enter Product Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Description</label>
                            <input type="text" class="form-control" id="product_description" value="{{$products->product_description}}" name="product_description" placeholder="Enter Product Description">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Price</label>
                            <input type="text" class="form-control" id="product_price" value="{{$products->product_price}}" name="product_price" placeholder="Enter Prodcut Price">
                        </div>

                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Category </label>
                            <select class="form-control" id="cat_id" name="cat_id">

                                <option>Select Product Category</option>
                                @foreach($categorys as $category)
                                    @if($products->cat_id==$category->id)
                                    <option selected value="{{$category->id}}">{{$category->cat_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Other details</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">PV Value</label>
                            <input type="number" class="form-control" id="product_pv_value" value="{{$products->product_pv_value}}" name="product_pv_value" placeholder="Enter PV Value">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Product Image</label>
                            <input type="file"  id="product_image" value="{{asset('storage/uploads/'.$products->product_image)}}" name="product_image" >
                            <img src="{{asset('storage/uploads/'.$products->product_image)}}" width="230px">
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <button type="submit" class="btn btn-warning">Update Product</button>
        <button type="reset" name="reset" class="btn btn-danger">
            <i class="glyphicon glyphicon-trash"></i>
            Clear</button>
    </form>
</section>


@endsection