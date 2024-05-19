<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function produk()
    {
        $produks = Produk::all();
        return view('produk', compact('produks'));
    }

    public function tambah()
    {
        return view('tambah');
    }

    public function simpan(Request $request)
    {
        $request->validate([
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'desc' => 'required|string',
        ]);

        // Menyimpan file foto
        $fotoPath = $request->file('foto')->store('foto_produks', 'public');

        // Membuat produk baru
        Produk::create([
            'foto' => $fotoPath,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'stok' => $request->stok,
            'desc' => $request->desc,
        ]);

        return redirect()->route('produk')->with('success', 'Produk berhasil disimpan!');
    }

    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('edit', compact('produk'));
    }

    public function destroy($id)
    {
        $produk = Produk::findOrFail($id);
        Storage::delete('public/' . $produk->foto);
        $produk->delete();

        return redirect()->route('produk')->with('success', 'Produk berhasil dihapus!');
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $request->validate([
            'foto' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'nama' => 'required|string|max:255',
            'harga' => 'required|numeric',
            'stok' => 'required|integer',
            'desc' => 'required|string',
        ]);

        if ($request->hasFile('foto')) {
            Storage::delete('public/' . $produk->foto);
            $fotoPath = $request->file('foto')->store('foto_produks', 'public');
            $produk->foto = $fotoPath;
        }

        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->stok = $request->stok;
        $produk->desc = $request->desc;
        $produk->save();

        return redirect()->route('produk')->with('success', 'Produk berhasil diupdate!');
    }

}
