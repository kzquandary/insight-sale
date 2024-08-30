<?php

namespace App\Http\Controllers;

use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;
use Phpml\Regression\SVR;
use Phpml\SupportVectorMachine\Kernel;
use Carbon\Carbon;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;

        $product = Produk::all();
        $terlaris = Penjualan::selectRaw('id_produk, SUM(jumlah) as total_jumlah,MAX(tanggal) as tanggal_terakhir')
            ->groupBy('id_produk')
            ->orderByDesc('total_jumlah')
            ->with('produk')
            ->take(3)
            ->get();

        $pendapatanTahunIni = Penjualan::selectRaw('SUM(jumlah * produk.harga) as total_revenue')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->whereYear('tanggal', "2023")
            ->first();


        $pendapatanBulanIni = Penjualan::selectRaw('SUM(jumlah * produk.harga) as total_revenue')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->whereYear('tanggal', "2023")
            ->whereMonth('tanggal', "12")
            ->first();

        $penjualanTahunIni = Penjualan::selectRaw('SUM(jumlah) as total_jumlah')
            ->whereYear('tanggal', "2023")
            ->first();

        $penjualanBulanIni = Penjualan::selectRaw('SUM(jumlah) as total_jumlah')
            ->whereYear('tanggal', "2023")
            ->whereMonth('tanggal', "12")
            ->first();
        

        $monthlyRevenue = Penjualan::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(jumlah * produk.harga) as total_revenue')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->groupByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->orderBy('year')
            ->orderBy('month')
            ->get();
        $pendapatan = $monthlyRevenue->mapWithKeys(function ($item) {
            $monthKey = sprintf('%02d', $item->month);
            return [$monthKey => $item->total_revenue];
        })->toArray();

        for ($month = 1; $month <= 12; $month++) {
            $monthKey = sprintf('%02d', $month);
            if (!isset($pendapatan[$monthKey])) {
                $pendapatan[$monthKey] = 0;
            }
        }

        ksort($pendapatan);
        return view('index', compact('product', 'terlaris', 'pendapatan', 'pendapatanTahunIni', 'pendapatanBulanIni', 'penjualanTahunIni', 'penjualanBulanIni'));
    }

    public function getRevenue()
    {
        $monthlyRevenue = Penjualan::selectRaw('YEAR(tanggal) as year, MONTH(tanggal) as month, SUM(jumlah * produk.harga) as total_revenue')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->groupByRaw('YEAR(tanggal), MONTH(tanggal)')
            ->orderBy('year')
            ->orderBy('month')
            ->get();

        $pendapatan = $monthlyRevenue->mapWithKeys(function ($item) {
            $monthKey = sprintf('%02d', $item->month);
            return [$monthKey => $item->total_revenue];
        })->toArray();

        for ($month = 1; $month <= 12; $month++) {
            $monthKey = sprintf('%02d', $month);
            if (!isset($pendapatan[$monthKey])) {
                $pendapatan[$monthKey] = 0;
            }
        }

        ksort($pendapatan);

        // Persiapan data untuk SVR
        $X = range(1, 12); // Array bulan
        $y = array_values($pendapatan); // Array pendapatan

        // Konversi menjadi array 2D untuk SVR
        $X = array_map(function ($x) {
            return [$x];
        }, $X);

        // Inisialisasi dan latih model SVR
        $regression = new SVR(Kernel::RBF);
        $regression->train($X, $y);

        // Prediksi pendapatan untuk bulan selanjutnya (misalnya, bulan ke-13)
        $nextMonth = [13];
        $predictedRevenue = $regression->predict($nextMonth);

        // Mengembalikan prediksi dan data asli
        return response()->json([
            'pendapatan' => $pendapatan,
            'predicted' => $predictedRevenue
        ]);
    }
}
