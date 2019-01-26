<?php

use App\Article;
use App\Store;
use Illuminate\Database\Seeder;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++) {
            $store = Store::inRandomOrder()->first();
            Article::create([
                'name' => $faker->sentence(3),
                'description' => $faker->paragraph(2),
                'price' => $faker->randomFloat(2,10,200),
                'total_in_shelf' => $faker->numberBetween(1,50),
                'total_in_vault' => $faker->numberBetween(1,50),
                'store_id' => $store->id
            ]);
        }
    }
}
