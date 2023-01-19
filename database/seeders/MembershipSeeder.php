<?php

namespace Database\Seeders;

use App\Models\Membership;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $membership = [
            ['author_id' => 1, 'name' => 'general', 'price'  => 1000],
            ['author_id' => 1, 'name' => 'vip', 'price'  => 5000],
            ['author_id' => 1, 'name' => 'vvip', 'price'  => 15000]
        ];

        Membership::insert($membership);
    }
}
