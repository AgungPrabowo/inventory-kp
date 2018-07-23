<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Categorie;
use App\Supplier;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Categorie::all();
        $suppliers  = Supplier::all();
        $products   = Product::all();
        return view('product', compact('categories'), compact('suppliers'))->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new Product();
        $data->product_name         = $request->product_name;
        $data->product_price        = $request->product_price;
        $data->categorie_id         = $request->categorie_id;
        $data->supplier_id          = $request->supplier_id;
        $data->product_qty          = $request->product_qty;
        $data->product_info         = $request->product_info;
        $data->save();
        return redirect()->route('product')->with('row-1', 'Product has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = Product::find($id);
        $data->product_name         = $request->get('product_name');
        $data->product_price        = $request->get('product_price');
        $data->categorie_id         = $request->get('categorie_id');
        $data->supplier_id          = $request->get('supplier_id');
        $data->product_qty          = $request->get('product_qty');
        $data->product_info         = $request->get('product_info');
        $data->save();
        return redirect()->route('product')->with('row-2', 'Product has been Update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->route('product')->with('row-2', 'Product has been delete');
    }
}
