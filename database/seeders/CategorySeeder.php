<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name' => 'Back End',
            'slug' => 'back-end',
        ]);
        Category::create([
            'name' => 'Front End',
            'slug' => 'front-end',
        ]);
        Category::create([
            'name' => 'Full Stack',
            'slug' => 'full-stack',
        ]);

    }
}
