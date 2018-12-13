<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Order;
use PDF;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $orders = Order::all();

        return view('order', compact('products'))->with('orders', $orders);
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
        $product = Product::find($request->product_id);
        if ($request->order_qty > $product->product_qty) {
            return redirect()->route('order')->with('info', 'Jumlah Barang keluar lebih besar dari stok');
        } else if ($request->order_qty < $product->product_qty) {
            $data = new Order();
            $data->product_id         = $request->product_id;
            $data->order_qty          = $request->order_qty;
            $data->order_date         = $request->order_date;
            $data->order_info         = $request->order_info;
            $data->save();
            
            // kurangi qty produk
            $product->product_qty          = $product->product_qty - $request->order_qty;
            $product->save();
            return redirect()->route('order')->with('info', 'Barang keluar berhasil dibuat');
        }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::find($id);
        $data->delete();
        return redirect()->route('order')->with('info', 'Barang keluar telah dihapus');
    }

    public function printPDF(Request $request)
    {
        $data = Order::whereBetween('order_date', [$request->start_date, $request->to_date])->get();

        $pdf = PDF::loadView('orderPDF', compact('data'));
        return $pdf->download('Laporan Barang Keluar.pdf');
    }
}
