@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Produk</div>

                <div class="card-body">
                    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="foto">Foto Produk</label>
                            <input type="file" name="foto" id="foto" class="form-control">
                            <img src="{{ asset('storage/' . $produk->foto) }}" alt="{{ $produk->nama }}" width="100">
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" name="nama" id="nama" value="{{ $produk->nama }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Produk</label>
                            <input type="number" name="harga" id="harga" value="{{ $produk->harga }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Produk</label>
                            <input type="number" name="stok" id="stok" value="{{ $produk->stok }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi Produk</label>
                            <textarea name="desc" id="desc" class="form-control" rows="6">{{ $produk->desc }}</textarea>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-success mt-3">
                            <a href="{{ route('produk') }}" class="btn btn-danger mt-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
