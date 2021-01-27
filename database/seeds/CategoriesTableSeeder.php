<?php

use Illuminate\Database\Seeder;
use App\Category;
use Faker\Generator as Faker;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        for ($i=0; $i < 5; $i++) {
            $newCategory = new Category();
            $newCategory->name = $faker->words(3, true);
            // create slug
            $slug = Str::slug($newCategory->name);
            // save original slug without changes
            $base_slug = $slug;
            // check if it already exists in the db
            $found_existing_slug = Category::where('slug', $slug)->first();
            $counter = 1;
            // create while loop if $found_existing_slug = true

            while ($found_existing_slug) {
                $slug = $base_slug . '-' . $counter;
                $counter++;
                $found_existing_slug = Category::where('slug', $slug)->first();
            }

            // If it leave this loop i'm sure that there aren't $slug with the same name
            $newCategory->slug = $slug;
            $newCategory->save();
        }

    }
}
