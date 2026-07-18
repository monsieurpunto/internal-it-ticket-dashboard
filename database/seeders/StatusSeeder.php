<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $statuses = [
            [
                'name' => 'Open',
                'description' => 'Ticket has been created and is waiting to be processed.',
            ],
            [
                'name' => 'In Progress',
                'description' => 'Ticket is currently being handled by IT staff.',
            ],
            [
                'name' => 'Resolved',
                'description' => 'The reported issue has been resolved.',
            ],
            [
                'name' => 'Closed',
                'description' => 'Ticket has been completed and officially closed.',
            ],
        ];

        foreach ($statuses as $status) {
            Status::firstOrCreate(
                ['name' => $status['name']],
                $status,
            );
        }
    }
}