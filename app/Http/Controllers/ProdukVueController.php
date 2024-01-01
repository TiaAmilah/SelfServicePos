<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukVueController extends Controller
{
    public function index()
    {
        $produk = Produk::get();
        return view('produk.index_vue', compact('produk'));
    }
}
