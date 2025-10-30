<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Address::insert([
            [
                'user_id' => 1,
                'address_line1' => '123 MG Road',
                'address_line2' => 'Near Metro Station',
                'city' => 'Bengaluru',
                'state' => 'Karnataka',
                'country' => 'India',
                'postal_code' => '560001',
                'status' => 'home',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'address_line1' => '456 Residency Road',
                'address_line2' => 'Opp. City Mall',
                'city' => 'Bengaluru',
                'state' => 'Karnataka',
                'country' => 'India',
                'postal_code' => '560025',
                'status' => 'office',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'address_line1' => '22 Park Street',
                'address_line2' => 'Flat 7B',
                'city' => 'Kolkata',
                'state' => 'West Bengal',
                'country' => 'India',
                'postal_code' => '700016',
                'status' => 'others',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'user_id' => 1,
                'address_line1' => '789 North Avenue',
                'address_line2' => 'Block A',
                'city' => 'Delhi',
                'state' => 'Delhi',
                'country' => 'India',
                'postal_code' => '110001',
                'status' => 'default',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
