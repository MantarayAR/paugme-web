<?php

use Illuminate\Database\Seeder;
use App\Tag;
use App\Post;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        // Pull all the tag names from the file

        Post::truncate();

        $tags = Tag::lists('tag')->all();

        factory(Post::class, 20)->create()->each(function ($post) use ($tags) {

            // 30% of the time don't assign a tag
            if (mt_rand(1, 100) <= 30) {
                return;
            }

            shuffle($tags);
            $postTags = [$tags[0]];

            // 30% of the time we're assigning tags, assign 2
            if (mt_rand(1, 100) <= 30) {
                $postTags[] = $tags[1];
            }

            $post->syncTags($postTags);
        });
    }
}
