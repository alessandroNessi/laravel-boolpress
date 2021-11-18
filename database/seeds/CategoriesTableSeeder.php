<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Category;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories=['php','html','css','js','sql','laravel'];
        foreach ($categories as $cat_name) {
            $category= new Category;
            $category->name = $cat_name;
            $category->slug = Str::of($category->name)->slug("-");
            $category->save();
        }
    }
}