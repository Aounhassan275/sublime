<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i < 11; $i++) {
            Category::create([
                'name' => 'Model ' . $i,
                'brand_id' => ceil($i/2)
            ]);
            
        }
    }
}
