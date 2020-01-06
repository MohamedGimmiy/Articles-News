<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        factory(App\User::class, 10)->create()->each(function($user){
            $user->profile()->save(factory(App\Profile::class)->make());
        });
        
        factory(App\Tag::class, 20)->create();

        factory(App\Country::class, 20)->create();

        factory(App\Comment::class, 50)->create();

        factory(App\Article::class, 50)->create()->each(function($article){
            $ids = range(1, 50);
            shuffle($ids);
            $sliced = array_slice($ids, 1, 20);
            $article->tags()->attach($sliced);
        });

        factory(App\Role::class, 3)->create()->each(function($role){
            $ids = range(1, 2);
            shuffle($ids);
            $sliced = array_slice($ids, 1, 5);
            $role->users()->attach($sliced);
        });
    }
}
