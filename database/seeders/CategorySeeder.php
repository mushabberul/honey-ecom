<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categoris = [
            'Honey',
            'Natural Oil',
            'Nuts',
            'Coconut',
            'Butter',
        ];
        foreach($categoris as $category){
            Category::create([
                'title'=>$category,
                'slug'=>Str::slug($category)
            ]);
        }
    }
}
