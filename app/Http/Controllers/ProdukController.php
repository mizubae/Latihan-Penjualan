<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('produk.index',[
            'Produk' => Produk::all(),
            'Category' =>Category::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create',[
            'Produk' => Produk::all(),
            'Category' =>Category::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
        ]);

        Produk::create($validatedData);
        return redirect('/produk')->with('success', 'Data Berhasil Ditahmbahkaran');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function show(Produk $produk)
    {
        return view('produk.show',[
            'Produk' => $produk
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function edit(Produk $produk)
    {
        return view('produk.edit',[
            'Produk' => $produk,
            'Category' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Produk $produk)
    {
        $validatedData = $request->validate([
            'nama' => 'required|max:255',
            'category_id' => 'required',
            'qty' => 'required',
            'harga_beli' => 'required',
            'harga_jual' => 'required',
            ]);

            Produk::where('id', $produk->id)
                ->update($validatedData);
            return redirect('/produk')->with('success', 'Berhasil Merubah Data!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Produk  $produk
     * @return \Illuminate\Http\Response
     */
    public function destroy(Produk $produk)
    {
        Produk::destroy($produk->id);
        return redirect('/produk')->with('success', 'Produk Berhasil Dihapus');
    }
}
