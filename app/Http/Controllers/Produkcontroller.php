<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Validator;

class ProdukController extends Controller
{
    function __construct()
    {
        $this->middleware('user')->except('destroy');
    }

    public function index()
    {
        $produk = Produk::get();
        return view('produk.index', compact('produk'));
    }

    public function create()
    {
        //Tampilkan halaman create
        return view('produk.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produk'       => 'required|min:6',
            'price'         => 'required',
            'stock'         => 'required',
        ], [
            'produk.required'  => 'Nama Produk harus di isi.',
        ]);

        $validator->validate();

        Produk::create([
            'produk'      => $request->produk,
            'price'        => $request->price,
            'stock'        => $request->stock,
        ]);

        return redirect('/produk');
    }

    public function edit($id)
    {
        $produk = Produk::find($id);
        return view('produk.edit', compact('produk'));
    }

    public function update($id, Request $request)
    {
        $produk = Produk::find($id);
        $produk->produk = $request->produk;
        $produk->price = $request->price;
        $produk->stock = $request->stock;
        $produk->save();
        return redirect('/produk')->with('success', 'Data produk berhasil diupdate.');
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        if ($produk) {
            $produk->delete();
            return redirect('/produk')->with('success', 'Data produk berhasil dihapus.');
        } else {
            return redirect('/produk')->with('success', 'Data produk tidak ditemukan.');
        }
    }
}
