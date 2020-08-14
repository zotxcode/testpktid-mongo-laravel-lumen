<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call('UsersTableSeeder');

    	DB::table('states')->insert([
            'state' => "UNPAID",
            'state_id' => 1,
        ]);
    	DB::table('states')->insert([
            'state' => "PAID",
            'state_id' => 2,
        ]);

        DB::table('payment_types')->insert([
            'payment_type_name' => "Invoice",
            'payment_type' => "29",
        ]);


        DB::table('locations')->insert([
            "location_name" => "Hub Jakarta Selatan", "location_type" => "HUB", "location_id" => "5cecb20b6c49615b174c3e74"
        ]);

        DB::table('customers')->insert([
            "customer_code" => "9999999", "customer_name" => "PT. NARA OKA PRAKARSA", "customer_address" => "JL. KH. AHMAD DAHLAN NO. 100, SEMARANG TENGAH 12420", "customer_email" => "info@naraoka.co.id", "customer_phone" => "024-1234567", "customer_address_detail" => null, "customer_zip_code" => "12420", "zone_code" => "CGKFT", "organization_id" => 6, "location_id" => "5cecb20b6c49615b174c3e74"
        ]);
        DB::table('customers')->insert([
            "customer_code" => "8888888", "customer_name" => "PT AMARIS HOTEL SIMPANG LIMA", "customer_address" => "JL. KH. AHMAD DAHLAN NO. 01, SEMARANG TENGAH", "customer_email" => "", "customer_phone" => "0248453499", "customer_address_detail" => "KOTA SEMARANG SEMARANG TENGAH KARANGKIDUL", "customer_zip_code" => "50241", "zone_code" => "SMG", "organization_id" => 6, "location_id" => "5cecb20b6c49615b174c3e74"
        ]);
        DB::table('customers')->insert([
            "customer_code" => "1678593", "customer_name" => "PT. AMARA PRIMATIGA", "customer_address" => "JL. xxx", "customer_email" => "", "customer_phone" => "123132131", "customer_address_detail" => "xxxxxx", "customer_zip_code" => "123121", "zone_code" => "sdfsdf", "organization_id" => 6, "location_id" => "5cecb20b6c49615b174c3e74"
        ]);




    }
}
