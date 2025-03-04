<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = User::select(['id'])->get(); 
        $categories = Category::select(['id'])->get(); 
        // $tags = Tag::select(['id'])->get(); 

        Post::factory(1000)->make()->sortBy('created_at')->each(function ($post) use($users, $categories){ //$tags
            $post->user_id = $users->random()->id;
            $post->category_id = $categories->random()->id;
            // $post->tag_id = $tags->random()->id;

            $post->save();
        });
    }
}
 