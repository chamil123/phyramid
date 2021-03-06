<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\category;
use App\product;

class ProductController extends Controller {

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $products = product::all();
        return view('Admin.viewproduct', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $categorys = category::all();
        return view('Admin.addProduct', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {
        $product = new product;
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->cat_id = $request->cat_id;
        $product->product_pv_value = $request->product_pv_value;
        $product->product_status = 1;
        //

        if ($request->hasFile('product_image')) {

            $fileName = $request->product_image->getClientOriginalName();
            $request->product_image->storeAs('public/uploads', $fileName);

            $product->product_image = $fileName;
            $product->save();
            return redirect('product/create');
        } else {
            return 'no file selected';
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $categorys = category::all();
        $products = product::find($id);
        return view('Admin.updateProduct', compact('categorys', 'products'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {

        $product = product::find($id);
        $product->product_name = $request->product_name;
        $product->product_description = $request->product_description;
        $product->product_price = $request->product_price;
        $product->cat_id = $request->cat_id;
        $product->product_pv_value = $request->product_pv_value;
        $product->product_status = 1;
        //

        if ($request->hasFile('product_image')) {

            $fileName = $request->product_image->getClientOriginalName();
            $request->product_image->storeAs('public/uploads', $fileName);

            $product->product_image = $fileName;
        } else {
            return 'no file selected';
        }

        $product->save();
        return redirect('/product');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        //
    }

}
