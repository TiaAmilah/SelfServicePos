<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $nama = "Tia Amilah";
        $alamat = "Kota Bandung";
        $tanggal_lahir = "23 April 2001";

        $data_array = array(
            "nama" => array(
                "Tia Amilah", "Tia", "Amilah",
            ),
        );

        return view('profil', compact('nama', 'alamat', 'tanggal lahir', 'data_array'));
    }
}
