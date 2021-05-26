<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Seeder;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 25; $i++) {
            $id = rand(1,10);
            Item::create([
                'name' => 'Item ' . $i,
                'amount' => rand(500,1000),
                'brand_id' => ceil($id/2),
                'model_id' => $id
            ]);
        }
    }
}
