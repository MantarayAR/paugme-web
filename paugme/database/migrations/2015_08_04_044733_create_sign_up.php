<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSignUp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sign_ups', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->boolean('opt_out')->default(false);
            $table->enum('source', [
                'General',
                'Product Hunt',
                'Facebook',
                'Twitter',
                'Google Ad'
            ])->default('General');
            $table->timestamps();

            $table->unique('email');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('sign_ups');
    }
}
