<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function user(){
        $kategori = Kategori::all();
        $produk = Produk::with('kategori')->get();

        return view('menu', compact('kategori', 'produk'));
    }
}