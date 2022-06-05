<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'nama' => 'Makanan'
        ]);
        Category::create([
            'nama' => 'Minuman'
        ]);
        Category::create([
            'nama' => 'Kendaraan'
        ]);
        Category::create([
            'nama' => 'Alat Masak'
        ]);
    }
}
