<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
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
        for ($i=0; $i < 10 ; $i++) {
            $newPost = new Post();
            $newPost->post_title = $faker->sentence(6,true);
            $newPost->post_subtitle = $faker->sentence(4);
            $newPost->post_text = $faker->text(600);
            // create slug
            $slug = Str::slug($newPost->post_title);
            // save original slug without changes
            $base_slug = $slug;
            // check if it already exists in the db
            $found_existing_slug = Post::where('slug', $slug)->first();
            $counter = 1;
            // create while loop if $found_existing_slug = true

            while ($found_existing_slug) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $found_existing_slug = Post::where('slug', $slug)->first();
            }

            // If it leave this loop i'm sure that there aren't $slug with the same name
            $newPost->slug = $slug;
            $newPost->save();
        }
    }
}
