<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;
use App\Models\Penjualan;
use Carbon\Carbon;
class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = File::get('data/penjualan_pengmas.csv');

        // Split the data into lines
        $lines = explode(PHP_EOL, $data);

        // Loop through each line
        foreach ($lines as $key => $line) {
            if ($key != 0 && !empty($line)) {
                // Split the line into fields
                $fields = str_getcsv($line);
                $date = Carbon::createFromFormat('d/m/Y', $fields[2]);

                // Insert the data into the database
                Penjualan::firstOrCreate([
                    'id_produk' => $fields[0],
                    'jumlah' => $fields[1],
                    'tanggal' => $date,
                ]);
            }
        }
    }
}
