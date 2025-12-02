<?php
namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        return view('admin.kategori', compact('kategori'));
    }

    public function store(Request $request)
    {
        $request->validate(['nama' => 'required']);
        Kategori::create($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        Kategori::findOrFail($id)->delete();
        return redirect()->back();
    }
}