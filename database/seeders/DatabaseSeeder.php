<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $nandi = User::factory()->create(['name' => 'Nandi', 'email' => 'nandi@gmail.com', 'user_name' => "nandi"]);
        $sellie = User::factory()->create(['name' => 'Sellie', 'email' => 'sellie@gmail.com', 'user_name' => "sellie"]);

        $frontend = Category::factory()->create(['name' => 'Frontend', 'slug' => 'frontend']);
        $backend = Category::factory()->create(['name' => 'Backend', 'slug' => 'backend']);

        Blog::factory(2)->create(['category_id' => $frontend->id, 'user_id' => $nandi->id]);
        Blog::factory(2)->create(['category_id' => $backend->id, 'user_id' => $sellie->id]);
        Blog::factory(2)->create(['category_id' => $frontend->id, 'user_id' => $sellie->id]);
        Blog::factory(2)->create(['category_id' => $backend->id, 'user_id' => $nandi->id]);

        // $nandi = User::create([
        //     'name' => 'Nandi',
        //     'slug' => Str::slug('Nandi'),
        //     'email' => 'nandi@gmail.com',
        //     'password' => bcrypt('nandi1142')
        // ]);

        // $sellie = User::create([
        //     'name' => 'Sellie',
        //     'slug' => Str::slug('Sellie'),
        //     'email' => 'sellie@gmail.com',
        //     'password' => bcrypt('sellie1142')
        // ]);

        // $frontend = Category::create([
        //     'name' => 'Frontend',
        //     'slug' => Str::slug('Frontend')
        // ]);

        // $backend = Category::create([
        //     'name' => 'Backend',
        //     'slug' => Str::slug('Backend')
        // ]);

        // Blog::create([
        //     'title' => 'Frontend Blog',
        //     'category_id' => $frontend->id,
        //     'user_id' => $nandi->id,
        //     'slug' => Str::slug('Frontend Blog'),
        //     'intro' => 'Intro for frontend blog by database seeder',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem explicabo incidunt neque repellat quia sapiente reprehenderit molestiae at porro vero optio nihil quos voluptates ab, sed accusamus nobis pariatur natus?'
        // ]);

        // Blog::create([
        //     'title' => 'Backend Blog',
        //     'category_id' => $backend->id,
        //     'user_id' => $sellie->id,
        //     'slug' => Str::slug('Backend Blog'),
        //     'intro' => 'Intro for Backend blog by database seeder',
        //     'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptatem explicabo incidunt neque repellat quia sapiente reprehenderit molestiae at porro vero optio nihil quos voluptates ab, sed accusamus nobis pariatur natus?'
        // ]);
    }
}
