<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class BooksSedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        $faker = Faker::create('id_ID');
        $category = array('ficton','non-ficton','science','comic','religion','law','engineering');

        for($i = 1; $i <= 20; $i++){
            $jum = $faker->numberBetween(0,6);
            DB::table('books')->insert([
                'author' => $faker->name,
                'title' => $faker->sentence(3),
                'category' => $category[$jum],
                'publisher' => $faker->sentence(2),
                'year_released' => $faker->numberBetween(2000,2020)
               ]);
        }
    }
}
