<?php

namespace Database\Seeders;

use App\Models\IssueCategory;
use Illuminate\Database\Seeder;

class IssueCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Hardware',
                'description' => 'Physical devices and hardware-related issues.',
            ],
            [
                'name' => 'Software',
                'description' => 'Applications and software-related issues.',
            ],
            [
                'name' => 'Network',
                'description' => 'Internet, LAN, Wi-Fi, and network connectivity issues.',
            ],
            [
                'name' => 'Account',
                'description' => 'User accounts, passwords, and access-related issues.',
            ],
            [
                'name' => 'Printer',
                'description' => 'Printer and printing-related issues.',
            ],
            [
                'name' => 'Other',
                'description' => 'Other issues that do not fit existing categories.',
            ],
        ];

        foreach ($categories as $category) {
            IssueCategory::firstOrCreate(
                ['name' => $category['name']],
                $category,
            );
        }
    }
}