<?php

use Illuminate\Database\Seeder;
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
            $newPost->nickname = $faker->name;
            $newPost->realease_date = $faker->dateTimeBetween('-4 year', '-1 day');
            $newPost->post_text = $faker->text(300);
        }
    }
}
