<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i=0;$i<50;$i++){
            $post= new Post;
            $post->title = $faker->words(5,true);
            $post->slug = Str::of($post->title)->slug("-");
            $post->content = $faker->text();
            $post->save();
        }
    }
}
