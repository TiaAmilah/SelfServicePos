<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ApiController extends Controller
{
    public function produk_index()
    {
        $produk = Produk::get();
        return response()->json($produk);
    }

    public function produk_store(Request $request)
    {
        // Validation logic can be added here

        Produk::insert([
            'produk' => $request->api_produk,
            'price'  => $request->api_price,
            'stock'  => $request->api_stock,
        ]);

        $response = [
            'responseCode'   => '00',
            'responseStatus' => 'Success'
        ];
        return response()->json($response);
    }

    public function produk_by_id($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['Success' => 'Success']);
        }

        return response()->json($produk);
    }

    public function produk_update(Request $request, $id)
    {
        // Validation logic can be added here

        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['Success' => 'Success Update']);
        }

        $produk->update([
            'produk' => $request->api_produk,
            'price'  => $request->api_price,
            'stock'  => $request->api_stock,
        ]);

        $response = [
            'responseCode'   => '00',
            'responseStatus' => 'Success Update'
        ];
        return response()->json($response);
    }

    public function produk_delete($id)
    {
        $produk = Produk::find($id);

        if (!$produk) {
            return response()->json(['Success' => 'Success Delete']);
        }

        $produk->delete();

        $response = [
            'responseCode'   => '00',
            'responseStatus' => 'Success Delete'
        ];
        return response()->json($response);
    }
}
