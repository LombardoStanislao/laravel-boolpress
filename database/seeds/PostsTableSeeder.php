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
            $newPost->nickname = $faker->userName();
            $newPost->release_date = $faker->dateTimeBetween('-4 year', '-1 day');
            $newPost->post_title = $faker->sentence();
            $newPost->post_subtitle = $faker->sentence(4);
            $newPost->post_text = $faker->text(600);
            $newPost->save();
        }
    }
}
