<?php

namespace Database\Seeders;

use App\Models\Label;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $labes = [
            ['author_id' => 1, 'label' => '1', 'diamond'  => 3000],
            ['author_id' => 1, 'label' => '2', 'diamond'  => 5000],
            ['author_id' => 1, 'label' => '3', 'diamond'  => 10000],
            ['author_id' => 1, 'label' => '4', 'diamond'  => 20000],
            ['author_id' => 1, 'label' => '5', 'diamond'  => 50000],
            ['author_id' => 1, 'label' => '6', 'diamond'  => 100000],
            ['author_id' => 1, 'label' => '7', 'diamond'  => 150000],
            ['author_id' => 1, 'label' => '8', 'diamond'  => 200000],
            ['author_id' => 1, 'label' => '9', 'diamond'  => 250000],
            ['author_id' => 1, 'label' => '10', 'diamond' => 300000],
            ['author_id' => 1, 'label' => '11', 'diamond' => 400000],
            ['author_id' => 1, 'label' => '12', 'diamond' => 600000],
            ['author_id' => 1, 'label' => '13', 'diamond' => 1000000],
            ['author_id' => 1, 'label' => '14', 'diamond' => 2000000],
            ['author_id' => 1, 'label' => '15', 'diamond' => 3000000],
            ['author_id' => 1, 'label' => '16', 'diamond' => 5000000],
            ['author_id' => 1, 'label' => '17', 'diamond' => 8000000],
            ['author_id' => 1, 'label' => '18', 'diamond' => 10000000],
            ['author_id' => 1, 'label' => '19', 'diamond' => 15000000],
            ['author_id' => 1, 'label' => '20', 'diamond' => 20000000]
        ];
        Label::insert($labes);
    }
}
