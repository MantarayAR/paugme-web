<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::truncate();
        // Don't forget to truncate the pivot table
        DB::table('post_tag_pivot')->truncate();

        factory(Tag::class, 5)->create();
    }
}
