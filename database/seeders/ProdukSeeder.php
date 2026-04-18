<?php

namespace Database\Seeders;

use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $kategoriMakanan = Kategori::where('nama', 'Makanan')->first();
        $kategoriMinuman = Kategori::where('nama', 'Minuman')->first();
        $kategoriSnack = Kategori::where('nama', 'Snack')->first();

        $produks = [
            [
                'kategori_id' => $kategoriMakanan?->id,
                'nama' => 'Iga Bakar Madu',
                'harga' => 45000,
                'deskripsi' => 'Iga bakar pilihan bumbu madu gurih manis.',
            ],
            [
                'kategori_id' => $kategoriMakanan?->id,
                'nama' => 'Sop Iga Sapi',
                'harga' => 40000,
                'deskripsi' => 'Sop iga sapi segar dengan kuah kaldu istimewa.',
            ],
            [
                'kategori_id' => $kategoriMinuman?->id,
                'nama' => 'Es Jeruk',
                'harga' => 10000,
                'deskripsi' => 'Es jeruk manis segar perasan asli.',
            ],
            [
                'kategori_id' => $kategoriMinuman?->id,
                'nama' => 'Teh Manis Dingin',
                'harga' => 5000,
                'deskripsi' => 'Teh manis dingin menyegarkan.',
            ],
            [
                'kategori_id' => $kategoriSnack?->id,
                'nama' => 'Kentang Goreng',
                'harga' => 15000,
                'deskripsi' => 'Kentang goreng renyah bumbu asin gurih.',
            ],
        ];

        foreach ($produks as $produk) {
            // Hanya buat produk jika kategori_id ditemukan
            if ($produk['kategori_id']) {
                Produk::create($produk);
            }
        }
    }
}
