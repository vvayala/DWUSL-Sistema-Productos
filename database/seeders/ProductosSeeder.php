<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;


class ProductosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            [
                'nombre' => 'Tenis Nike Air Max',
                'precio' => 120.50,
                'marca' => 1,
                'created_at' => Carbon::now()
            ],
            [
                'nombre' => 'Tenis Puma RS-X',
                'precio' => 99.99,
                'marca' => 2,
                'created_at' => Carbon::now()
            ],
            [
                'nombre' => 'Tenis Adidas Ultraboost',
                'precio' => 150.00,
                'marca' => 3,
                'created_at' => Carbon::now()
            ],
        );
        DB::table('productos')->insert($data);
    }
}
