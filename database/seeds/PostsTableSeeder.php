<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
        	'subject' => str_random(30),
        	'content' => str_random(1000),
            'user_id' => 1,
        	'category' => 'blog',

        ]);
    }
}
