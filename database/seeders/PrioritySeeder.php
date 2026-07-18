<?php

namespace Database\Seeders;

use App\Models\Priority;
use Illuminate\Database\Seeder;

class PrioritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $priorities = [
            [
                'name' => 'Low',
                'description' => 'Low business impact.',
            ],
            [
                'name' => 'Medium',
                'description' => 'Moderate business impact.',
            ],
            [
                'name' => 'High',
                'description' => 'High business impact requiring prompt attention.',
            ],
        ];

        foreach ($priorities as $priority) {
            Priority::firstOrCreate(
                ['name' => $priority['name']],
                $priority,
            );
        }
    }
}