<?php

use Illuminate\Database\Seeder;

class ProvidersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=0; $i<20; $i++ ){
            
            $faker = Faker\Factory::create();

            DB::table('providers')->insert([
                'nome' => $faker->company(),
                'created_at'=> \Carbon\Carbon::now()
            ]);
        }
    }
}
