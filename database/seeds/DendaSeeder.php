<?php

use Illuminate\Database\Seeder;
use App\Models\Master\Denda;
class DendaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Denda::insert([
            [
              'price'  => '1000',
            ],
        ]);
    }
}
