<?php

use Illuminate\Database\Seeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {

        DB::table('ak_provider')->insert([
          [
           'ak_provider_firstname'=> 'Ahmad',
           'ak_provider_lastname'=>'Elang',
           'ak_provider_email'=> 'sayaelang@gmail.com',
           'ak_provider_password'=> bcrypt('prayogotok'),
           'ak_provider_region'=> '1101',
           'ak_provider_address'=> 'Test Daerah',
           'ak_provider_zipcode'=> '12323',
           'ak_provider_description'=> 'Mahal',
           'ak_provider_telephone'=> '081297451092',
           'ak_provider_last_activity'=> Carbon\Carbon::now(),
           ],
        ]);

        DB::table('ak_provider_img')->insert([
            [
            'ak_provider_id' => '4', 
            'ak_provider_img_path' => 'https://myanimelist.cdn-dena.com/images/anime/5/38273.jpg', 
            ],
        ]);

    }
}
