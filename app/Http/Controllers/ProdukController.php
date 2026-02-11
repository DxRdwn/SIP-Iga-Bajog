<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    public function index()
    {
        $produk = Produk::with('kategori')->get();
        $kategori = Kategori::all(); // 👈 Tambahkan ini untuk dropdown

        return view('admin.produk', compact('produk', 'kategori'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'harga' => 'required',
            'kategori_id' => 'required', // 👈 Diganti
            'foto' => 'required|image'
        ]);

        $filename = time().'.'.$request->foto->extension();
        $request->foto->storeAs('produk', $filename,'public');

        Produk::create([
            'nama' => $request->nama,
            'harga' => $request->harga,
            'kategori_id' => $request->kategori_id, // 👈 Diganti
            'deskripsi' => $request->deskripsi,
            'foto' => $filename
        ]);

        return redirect()->back();
    }
        public function update(Request $request, $id)
{
    $produk = Produk::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'harga' => 'required',
        'kategori_id' => 'required',
        'foto' => 'nullable|image'
    ]);

    // jika upload foto baru
    if ($request->hasFile('foto')) {
        $filename = time().'.'.$request->foto->extension();
        $request->foto->storeAs('produk', $filename, 'public');
        $produk->foto = $filename;
    }

    $produk->update([
        'nama' => $request->nama,
        'harga' => $request->harga,
        'kategori_id' => $request->kategori_id,
        'deskripsi' => $request->deskripsi,
        'foto' => $produk->foto
    ]);

    return redirect()->back();
}
    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        $produk->delete();

        return redirect()->back();
    }
}