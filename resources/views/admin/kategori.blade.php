@extends('admin.layout.layout')

@section('content')
    <div class="pagetitle">
        <h1>Kategori</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="">Home</a></li>
                <li class="breadcrumb-item active">Kategori</li>
            </ol>
        </nav>
    </div>

    <div class="section">
        <div class="col-lg-12">

            <!-- Form Tambah Kategori -->
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Add Kategori</h5>

                    <form action="{{ route('admin.kategori.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Kategori</label>
                            <input name="nama" type="text" class="form-control" required>
                        </div>

                        <div class="text-end">
                            <button type="submit" class="btn btn-primary">Add Kategori</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Tabel Kategori -->
            <div class="card recent-sales">
                <div class="card-body">
                    <h5 class="card-title">List Kategori</h5>

                    <table class="table table-borderless">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Kategori</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($kategori as $k)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $k->nama }}</td>
                                    <td>
                                        <form action="{{ route('admin.kategori.destroy', $k->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Hapus kategori?')"
                                                class="btn btn-sm btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Belum ada kategori</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                </div>
            </div>

        </div>
    </div>
@endsection
