<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class SteelTechSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@steeltech.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('steeltech@4670'),
                'role' => 'admin',
                'is_active' => true,
            ]
        );

        // Top-level product categories (matches sidebar menu)
        $categories = [
            'VLF Plus Series',
            'VLF E Plus Series',
            'VLF B Series',
            'VLF G Series',
            'VLF-T Series',
            'VLT Series',
            'VLT-S Series',
            'VLT-Z Series',
        ];

        foreach ($categories as $index => $name) {
            Category::updateOrCreate(
                ['slug' => Str::slug($name)],
                [
                    'name' => $name,
                    'icon' => 'fa-cog',
                    'is_active' => true,
                    'sort_order' => $index,
                ]
            );
        }
    }
}
