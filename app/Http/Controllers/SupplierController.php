<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier', compact('suppliers'));
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
        $data = new Supplier();
        $data->supplier_name    = $request->supplier_name;
        $data->supplier_address = $request->supplier_address;
        $data->supplier_email   = $request->supplier_email;
        $data->supplier_phone   = $request->supplier_phone;
        $data->supplier_fax     = $request->supplier_fax;
        $data->save();
        return redirect()->route('supplier')->with('info', 'Supplier has been added');
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
        $data = Supplier::find($id);
        $data->supplier_name    = $request->get('supplier_name');
        $data->supplier_address = $request->get('supplier_address');
        $data->supplier_email   = $request->get('supplier_email');
        $data->supplier_phone   = $request->get('supplier_phone');
        $data->supplier_fax     = $request->get('supplier_fax');
        $data->save();
        return redirect()->route('supplier')->with('info', 'Supplier has been update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Supplier::find($id);
        $data->delete();
        return redirect()->route('supplier')->with('info', 'Supplier has been delete');
    }
}
