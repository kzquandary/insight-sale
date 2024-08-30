<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penjualan;
use App\Models\Produk;
use App\Exports\PenjualanExport;
use Maatwebsite\Excel\Facades\Excel;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::selectRaw('penjualan.id, nama, jumlah, tanggal, harga, gambar')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->limit(100)
            ->orderBy('tanggal', 'desc')
            ->get();
        return view('penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $produk = Produk::all();
        return view('penjualan.create', compact('produk'));
    }

    public function store(Request $request)
    {
        $penjualan = Penjualan::create($request->all());
        return redirect()->route('penjualan.index');
    }

    public function show($id)
    {
        $penjualan = Penjualan::find($id);
        $produk = Produk::all();
        return view('penjualan.update', compact('penjualan', 'produk'));
    }

    public function detail($id)
    {
        $penjualan = Penjualan::find($id);
        $produk = Produk::all();
        return view('penjualan.update', compact('penjualan', 'produk'));
    }

    public function update(Request $request, $id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->update($request->all());
        return redirect()->route('penjualan.index');
    }

    public function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->delete();
        return response()->json(['success' => true]);
    }
    public function export()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }
}
