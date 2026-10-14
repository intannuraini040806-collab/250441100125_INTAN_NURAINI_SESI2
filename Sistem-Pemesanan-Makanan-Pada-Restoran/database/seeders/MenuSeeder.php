<?php

namespace Database\Seeders;

use App\Models\Menu;
use App\Models\pesanan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         Menu::factory()
            ->count(6)
            ->state(new Sequence(
                ['nama' => 'Nasi Goreng'],
                ['nama' => 'Soto Ayam'],
                ['nama' => 'Ayam Bakar'],
                ['nama' => 'Es Teh'],
                ['nama' => 'Jus Alpukat'],
            ))
            ->create();
    }
}
