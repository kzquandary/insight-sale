<?php

namespace App\Exports;

use App\Models\Penjualan;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class PenjualanExport implements FromCollection, WithHeadings
{
    public function collection()
    {
        return Penjualan::select('produk.nama', 'penjualan.jumlah', 'penjualan.tanggal')
            ->join('produk', 'penjualan.id_produk', '=', 'produk.id')
            ->get();
    }

    public function headings(): array
    {
        return [
            'Nama Produk',
            'Jumlah',
            'Tanggal'
        ];
    }
}
