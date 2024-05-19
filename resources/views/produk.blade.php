@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-15">
            <div class="card">
                <div class="card-header"><a href="{{ route('tambah') }}" class="btn btn-primary">Tmabah Produk</a></div>

                <div class="card-body">
                    <table class="table table-striped">
                        <thead>
                            <tr class="table-dark">
                                <th>Foto Produk</th>
                                <th>Nama Produk</th>
                                <th>Harga</th>
                                <th>Stok</th>
                                <th>Deskripsi</th>
                                <th>Aksi</th>
                            </tr>
                          </thead>
                          <tbody>
                            @foreach ($produks as $produk)
                                <tr>
                                    <td><img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" width="100"></td>
                                    <td>{{ $produk->nama }}</td>
                                    <td>{{ number_format($produk->harga, 2) }}</td>
                                    <td>{{ $produk->stok }}</td>
                                    <td>{{ $produk->desc }}</td>
                                    <td>
                                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                          </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
