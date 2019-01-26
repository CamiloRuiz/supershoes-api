<?php

use App\Article;
use App\Store;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class StoresTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Article::truncate();
        Store::truncate();
        Schema::enableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 10; $i++) {
            Store::create([
                'name' => $faker->name,
                'address' => $faker->address,
            ]);
        }
    }
}
