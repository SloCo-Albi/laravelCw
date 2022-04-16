<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MagicCard;

class MagicCardsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        MagicCard::factory()->count(50)->create();
    }
}
