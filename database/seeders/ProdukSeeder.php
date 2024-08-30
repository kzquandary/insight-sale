<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\File;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get the CSV data
        $data = File::get('data/produk.csv');

        // Split the data into lines
        $lines = explode(PHP_EOL, $data);

        // Loop through each line
        foreach ($lines as $key => $line) {
            if ($key != 0 && !empty($line)) {
                // Split the line into fields
                $fields = str_getcsv($line);

                // Insert the data into the database
                Produk::firstOrCreate([
                    'nama' => $fields[0],
                    'harga' => $fields[1],
                    'gambar' => $fields[2],
                ]);
            }
        }
    }
}
