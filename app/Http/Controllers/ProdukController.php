<?php

namespace App\Http\Controllers;

use App\Exports\PenjualanExport;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Penjualan;
use Maatwebsite\Excel\Facades\Excel;

class ProdukController extends Controller
{
    //
    public function index()
    {
        $produk = Produk::all();
        return view('product.index', compact('produk'));
    }

    public function create()
    {
        return view('product.create');
    }

    public function show($id)
    {
        $produk = Produk::find($id);
        return view('product.update', compact('produk'));
    }

    public function detail($id)
    {
        $penjualanTerakhir = Penjualan::where('id_produk', $id)
            ->with('produk')
            ->orderBy('tanggal', 'desc')
            ->limit(5)
            ->get();
    
        $produk = Produk::find($id);
    
        $penjualan = Penjualan::where('id_produk', $id)
            ->orderBy('created_at', 'desc')
            ->limit(10)
            ->get();
    
        $penjualanPertahun = Penjualan::where('id_produk', $id)
            ->whereYear('tanggal', "2023")
            ->get();
    
        $penjualanPerBulan = Penjualan::where('id_produk', $id)
            ->whereMonth('tanggal', "12")
            ->get();
    
        // Monthly sales data
        $dataPenjualanPerbulan = Penjualan::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(jumlah) as total_jumlah, SUM(jumlah * produk.harga) as total_pendapatan')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->where('id_produk', $id)
            ->groupByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->orderByRaw('YEAR(tanggal)')
            ->orderByRaw('MONTH(tanggal)')
            ->get();
    
        $totalPenjualanPerbulan = $dataPenjualanPerbulan->mapWithKeys(function ($item) {
            $monthKey = sprintf('%02d', $item->month);
            return [$monthKey => $item->total_jumlah];
        })->toArray();
    
        $totalPendapatanPerbulan = $dataPenjualanPerbulan->mapWithKeys(function ($item) {
            $monthKey = sprintf('%02d', $item->month);
            return [$monthKey => $item->total_pendapatan];
        })->toArray();
    
        for ($month = 1; $month <= 12; $month++) {
            $monthKey = sprintf('%02d', $month);
            if (!isset($totalPenjualanPerbulan[$monthKey])) {
                $totalPenjualanPerbulan[$monthKey] = 0;
            }
            if (!isset($totalPendapatanPerbulan[$monthKey])) {
                $totalPendapatanPerbulan[$monthKey] = 0;
            }
        }
    
        ksort($totalPenjualanPerbulan);
        ksort($totalPendapatanPerbulan);
    
        // Daily sales data for December
        $dataPenjualanPerhari = Penjualan::selectRaw('DAY(tanggal) as day, SUM(jumlah) as total_jumlah, SUM(jumlah * produk.harga) as total_pendapatan')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->where('id_produk', $id)
            ->whereYear('tanggal', "2023")
            ->whereMonth('tanggal', "12")
            ->groupByRaw('DAY(tanggal)')
            ->orderByRaw('DAY(tanggal)')
            ->get();
    
        $totalPenjualanPerhari = $dataPenjualanPerhari->mapWithKeys(function ($item) {
            $dayKey = sprintf('%02d', $item->day);
            return [$dayKey => $item->total_jumlah];
        })->toArray();
    
        $totalPendapatanPerhari = $dataPenjualanPerhari->mapWithKeys(function ($item) {
            $dayKey = sprintf('%02d', $item->day);
            return [$dayKey => $item->total_pendapatan];
        })->toArray();
    
        for ($day = 1; $day <= 31; $day++) {
            $dayKey = sprintf('%02d', $day);
            if (!isset($totalPenjualanPerhari[$dayKey])) {
                $totalPenjualanPerhari[$dayKey] = 0;
            }
            if (!isset($totalPendapatanPerhari[$dayKey])) {
                $totalPendapatanPerhari[$dayKey] = 0;
            }
        }
    
        ksort($totalPenjualanPerhari);
        ksort($totalPendapatanPerhari);
    
        return view('product.detail', compact(
            'produk', 
            'penjualan', 
            'penjualanPertahun', 
            'penjualanPerBulan', 
            'totalPenjualanPerbulan', 
            'totalPenjualanPerhari', 
            'penjualanTerakhir', 
            'totalPendapatanPerbulan', 
            'totalPendapatanPerhari'
        ));
    }
    


    public function store(Request $request)
    {
        $produk = new Produk();
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->gambar = $request->gambar;
        $produk->save();
        return response()->json(['success' => true]);
    }

    public function update(Request $request, $id)
    {
        $produk = Produk::find($id);
        $produk->nama = $request->nama;
        $produk->harga = $request->harga;
        $produk->save();
        return response()->json(['success' => true]);
    }

    public function destroy($id)
    {
        $produk = Produk::find($id);
        $produk->delete();
        return response()->json(['success' => true]);
    }

    public function export()
    {
        return Excel::download(new PenjualanExport, 'penjualan.xlsx');
    }
}
