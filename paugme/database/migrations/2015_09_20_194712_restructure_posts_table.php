<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RestructurePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->string('subtitle')->after('title')->nullable();
            $table->string('page_image')->after('content_html')->nullable();
            $table->string('meta_description')->after('page_image')->nullable();
            $table->boolean('is_draft')->after('meta_description')->default(true);
            $table->string('layout')->after('is_draft')->default('blog.layouts.post');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('posts', function (Blueprint $table) {
            $table->drop('subtitle');
            $table->drop('page_image');
            $table->drop('meta_description');
            $table->drop('is_draft');
            $table->drop('layout');
        });
    }
}
