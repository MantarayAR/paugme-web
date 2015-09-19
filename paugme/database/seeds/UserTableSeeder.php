<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement("TRUNCATE TABLE users CASCADE");

        App\User::create([
            'name' => 'tester',
            'email' => 'test@test.com',
            'password' => bcrypt('secret'),
            'remember_token' => str_random(10),
        ]);
        factory(App\User::class, 1)->create();
    }
}
