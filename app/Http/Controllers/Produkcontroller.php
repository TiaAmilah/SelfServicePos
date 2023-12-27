<?php

namespace App\Http\Controllers;

//import Model "Post
use App\Models\produk;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;

//return type View
use Illuminate\View\View;

use Illuminate\Http\Request;

class ProdukController extends Controller
{
    // Constructor untuk menerapkan midlleware auth
    // public function __construct()
    // {
    //     $this->midlleware('auth');
    // }

    /**
     * indexs
     *
     * @return View
     */
    // Metode untuk menampilkan daftar produk
    public function index(): View
    {
        //get posts
        $produk = produk::get();

        //render view with posts
        return view('produk.index', compact('produk'));
    }
    public function create()
    {
        return view('produk.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'produk'    => 'required|min:6',
            'price'     => 'required',
            'stock'     => 'required',
        ], [
            'produk.required'   => 'Nama Produk harus di isi',
        ]);
        $validator->validate();

        produk::create([
            'produk' => $request->produk,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect('/produk');
    }
    public function edit($id)
    {

        $produk = Produk::find($id);
        return view('produk.edit', compact('produk'));
    }
    public function destroy($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return redirect('/produk')->with('error', 'Produk tidak ditemukan');
        }

        $produk->delete();

        return redirect('/produk')->with('success', 'Produk berhasil dihapus');
    }
    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->update([
            'produk' => $request->produk,
            'price'   => $request->price,
            'stock'   => $request->stock,


        ]);

        return redirect('/produk')->with('success', 'Data produk berhasil diperbaharui');
    }
}
