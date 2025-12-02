@extends('admin.layout.layout')

@section('content')
    <div class="pagetitle">
        <h1>Produk</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Produk</li>
            </ol>
        </nav>
    </div>

    <div class="section">
        <div class="col-lg-12">

            <!-- Form Tambah Produk -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Add Produk</h5>

                    <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">

                            <div class="row mb-3 col-lg-6">
                                <label class="col-sm-3 col-form-label">Nama</label>
                                <div class="col-sm-9">
                                    <input name="nama" type="text" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3 col-lg-6">
                                <label class="col-sm-3 col-form-label">Harga</label>
                                <div class="col-sm-9">
                                    <input name="harga" type="number" class="form-control" required>
                                </div>
                            </div>

                            <div class="row mb-3 col-lg-6">
                                <label class="col-sm-3 col-form-label">Foto</label>
                                <div class="col-sm-9">
                                    <input name="foto" class="form-control" type="file" required>
                                </div>
                            </div>

                            <div class="row mb-3 col-lg-6">
                                <label class="col-sm-3 col-form-label">Kategori</label>
                                <div class="col-sm-9">
                                    <select name="kategori_id" class="form-select" required>
                                        <option value="" disabled selected>Pilih Kategori</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}">
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="mb-3 col-lg-12">
                                <label class="col-form-label">Deskripsi</label>
                                <textarea name="deskripsi" class="form-control" rows="3"></textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-primary">Simpan Produk</button>
                            </div>

                        </div>
                    </form>

                </div>
            </div>

            <!-- Tabel Produk -->
            <div class="card recent-sales overflow-auto">
                <div class="card-body">
                    <h5 class="card-title">List Produk</h5>

                    <table class="table table-borderless datatable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Nama</th>
                                <th>Price</th>
                                <th>Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produk as $p)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img src="{{ asset('storage/produk/' . $p->foto) }}" width="50"></td>
                                    <td>{{ $p->nama }}</td>
                                    <td>Rp {{ number_format($p->harga, 0, ',', '.') }}</td>
                                    <td>{{ $p->kategori->nama ?? 'Tidak ada kategori' }}</td>

                                    <td>
                                        <a href="{{ route('produk.edit', $p->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                        <form action="{{ route('produk.destroy', $p->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus produk?')"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada produk</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
