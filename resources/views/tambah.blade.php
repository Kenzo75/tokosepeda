@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Tambah Produk</div>

                <div class="card-body">
                    <form action="{{ route('simpan') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="foto">Foto Produk</label>
                            <input type="file" name="foto" id="foto" class="form-control" @error('foto') is-invalid @enderror" value="{{ old('foto') }}" required autocomplete="foto">
                            @error('foto')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">Nama Produk</label>
                            <input type="text" name="nama" id="nama" placeholder="Masukan Nama Produk" class="form-control" @error('nama') is-invalid @enderror" value="{{ old('nama') }}" required autocomplete="nama">
                            @error('nama')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga Produk</label>
                            <input type="number" name="harga" id="harga" placeholder="Masukan Harga Produk" class="form-control" @error('harga') is-invalid @enderror" value="{{ old('harga') }}" required autocomplete="harga">
                            @error('harga')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="stok">Stok Produk</label>
                            <input type="number" name="stok" id="stok" placeholder="Masukan Stok Produk" class="form-control" @error('stok') is-invalid @enderror" value="{{ old('stok') }}" required autocomplete="stok">
                            @error('stok')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="desc">Deskripsi Produk</label>
                            <textarea name="desc" id="desc" class="form-control" rows="6" @error('desc') is-invalid @enderror" value="{{ old('desc') }}" required autocomplete="desc"> {{ old('desc') }} </textarea>
                            @error('desc')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <input type="submit" value="Simpan" class="btn btn-success mt-3">
                            <input type="reset" value="Reset" class="btn btn-warning mt-3">
                            <a href="{{ route('produk') }}" class="btn btn-danger mt-3">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
