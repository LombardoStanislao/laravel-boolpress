<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Tag;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 5; $i++) {
            $newTag = new Tag();
            $newTag->name = $faker->words(3, true);
            // create slug
            $slug = Str::slug($newTag->name);
            // save original slug without changes
            $base_slug = $slug;
            // check if it already exists in the db
            $found_existing_slug = Tag::where('slug', $slug)->first();
            $counter = 1;
            // create while loop if $found_existing_slug = true

            while ($found_existing_slug) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $found_existing_slug = Tag::where('slug', $slug)->first();
            }

            // If it leave this loop i'm sure that there aren't $slug with the same name
            $newTag->slug = $slug;
            $newTag->save();
        }
    }
}
