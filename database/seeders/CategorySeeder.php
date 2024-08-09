<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Todo',
        ]);
        Category::create([
            'name' => 'InProgress',
        ]);
        Category::create([
            'name' => 'Testing',
        ]);
        Category::create([
            'name' => 'Done',
        ]);
        Category::create([
            'name' => 'Pending',
        ]);
    }
}
