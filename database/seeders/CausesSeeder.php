<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CausesSeeder extends Seeder
{

    public function run()
    {
        DB::table('campaigns')->insert([
            'category_id' => 1,
            'user_id' => 2,
            'title' => 'Ensure Education For Every Poor Children',
            'goal' => 10000,
            'per_person_fund' => 160,
            'description' => 'Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                              "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
            'image' => 'campaigns/jrOpvpmxllf1R7y5TgddlMZo31esESmFSkPnbqfl.png',
            'location' => 'bwp',
            'progress' => 57.5,
            'completed' => false,
        ]);

        DB::table('campaigns')->insert([
            'category_id' => 2,
            'user_id' => 2,
            'title' => 'need books for needy students',
            'goal' => 15000,
            'per_person_fund' => 160,
            'description' => 'Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                              "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
            'image' => 'campaigns/lGAYGYTpcYdFqIAEr5Yp3mj8H8uKzFp0HMTq7FE1.png',
            'location' => 'multan',
            'progress' => 67.7,
            'completed' => false,
        ]);

        DB::table('campaigns')->insert([
            'category_id' => 2,
            'user_id' => 2,
            'title' => 'Supply Drinking Water For The People',
            'goal' => 30000,
            'per_person_fund' => 160,
            'description' => 'Section 1.10.33 of "de Finibus Bonorum et Malorum", written by Cicero in 45 BC
                              "At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga.',
            'image' => 'campaigns/w6vYKlvUZ5SZvRInmAnlYLInNITjepEg0cWiCgaw.png',
            'location' => 'multan',
            'progress' => 67.7,
            'completed' => false,
        ]);
    }
}
