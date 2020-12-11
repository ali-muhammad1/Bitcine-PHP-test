<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class OrganizationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = [
            [
                'id' => 1,
                'name' => 'Academy of European Law',
            ],
            [
                'id' => 2,
                'name' => 'African Risk Capacity (ARC)',
            ],
        ];


        foreach ($organizations as $org) {
            \Illuminate\Support\Facades\DB::table('organizations')
                ->updateOrInsert(
                    ['id' => $org['id']],
                    $org
                );
        }
    }
}
