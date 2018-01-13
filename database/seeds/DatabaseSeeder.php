<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 100)->create();

        factory(App\Category::class, 8)->create()->each(function(App\Category $category){
          factory(App\Category::class, rand(3, 6))->create([
            'parent_id' => $category->id
          ])->each(function(App\Category $category){
            factory(App\Thread::class, rand(20, 100))->create([
              'user_id' => rand(1, 100),
              'category_id' => $category->id
            ]);
          });
        });
    }
}
