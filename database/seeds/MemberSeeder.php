<?php

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Faker\Factory as Faker;


class MemberSeeder extends Seeder
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
        $gender = array('Pria','Wanita');
        
        for($i = 1; $i <= 20; $i++){
            $id = IdGenerator::generate(['table' => 'members', 'length' => 8, 'prefix' =>date('ym')]);
            $jum = $faker->numberBetween(0,1);
            DB::table('members')->insert([
                'id' => $id,
                'name' => $faker->name,
                'gender' => $gender[$jum],
                'birth_day' => $faker->date,
                'birth_place' => $faker->city,
                'address' => $faker->streetAddress,
                'phone_number' => $faker->phoneNumber
               ]);
        }

    }
}
