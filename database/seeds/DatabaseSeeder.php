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
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        DB::table('users')->truncate();
        DB::table('posts')->truncate();
        DB::table('countries')->truncate();
        DB::table('roles')->truncate();
        DB::table('categories')->truncate();
        DB::table('photos')->truncate();
        DB::table('comments')->truncate();
        DB::table('comment_replies')->truncate();

         $this->call(RolesTableSeeder::class);
         $this->call(CountriesTableSeeder::class, 3);
         $this->call(UsersTableSeeder::class);
         $this->call(CategoriesTableSeeder::class);
         $this->call(PostsTableSeeder::class);
    }
}
