<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $nama = "Tia Amilah";3
        $alamat = "Bandung"
        $tanggal_lahir = "23 April 2001";
        $data_array = array(
            "nama" => array(
                "Tia Amilah, "Amilah", "Tiaa",
            ),
        );

        return view('profile.index', compact('nama', 'alamat', 'tanggal_lahir', 'data_array'));
    }
}