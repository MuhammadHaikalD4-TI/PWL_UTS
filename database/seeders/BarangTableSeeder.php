<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('barang')->insert([
            [
                'nama_barang' => 'Laptop Asus',
                'jumlah' => 2,
                'deskripsi' => 'Laptop Asus Gaming ROG G15, RAM 16GB',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'nama_barang' => 'Handphone Samsung',
                'jumlah' => 3,
                'deskripsi' => 'Samsung Galaxy S20',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
