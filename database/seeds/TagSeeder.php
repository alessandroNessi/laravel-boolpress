<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tags=['frontend','skill','advanced','basic','easy','hard','utility','backend'];
        foreach ($tags as $tag) {
            $newTag= new Tag;
            $newTag->name = $tag;
            $newTag->slug = Str::of($newTag->name)->slug("-");
            $newTag->save();
        }
    }
}
