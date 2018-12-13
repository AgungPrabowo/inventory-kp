<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Purchase;
use App\Supplier;
use PDF;

class PurchasesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();
        $purchases = Purchase::all();
        $suppliers = Supplier::all();

        return view('purchase', compact('products'), compact('suppliers'))->with('purchases', $purchases);
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
        $data = new Purchase();
        $data->product_id         = $request->product_id;
        $data->purchase_qty          = $request->purchase_qty;
        $data->purchase_date         = $request->purchase_date;
        $data->save();

        // tambah qty produk
        $product = Product::find($request->product_id);
        $product->product_qty          = $product->product_qty + $request->purchase_qty;
        $product->save();
        return redirect()->route('purchase')->with('info', 'Barang masuk berhasil dibuat');
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
        $data = Purchase::find($id);
        $data->delete();
        return redirect()->route('purchase')->with('info', 'Barang masuk telah dihapus');
    }

    public function printPDF(Request $request)
    {
        $data = Purchase::whereBetween('purchase_date', [$request->start_date, $request->to_date])->get();

        $pdf = PDF::loadView('purchasePDF', compact('data'));
        return $pdf->download('Laporan Barang Masuk.pdf');
    }
}
