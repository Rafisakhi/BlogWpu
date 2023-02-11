<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Post;
use App\Models\Category;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name' => 'Read Beands',
            'username' => 'BigBeands',
            'email' => 'readBeands@gmail.com',
            'password' => bcrypt('12345'),
        ]);
        // User::create([
        //     'name' => 'Gandum',
        //     'email' => 'gandum@gmail.com',
        //     'password' => bcrypt('12225'),
        // ]);

        User::factory(3)->create();

        Category::create([
            'name' => 'Programing',
            'slug' => 'programing',
        ]);
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
        ]);


        Category::create([
            'name' => 'Personal',
            'slug' => 'personal',
        ]);

        Post::factory(20)->create();

        // Post::create([
        //     'title' => 'Judul Pertama',
        //     'slug' => 'judul-pertama',
        //     'excerpt' => 'ipsum dolo sit amet consectetur, adipisicing elit. Sunt aut nesciunt, doloremque ipsum consequatur aliquid nulla maiores quo nam suscipit laborum. Quidem culpa perferendis vero ad eligendi quas quaerat explicabo,',
        //     'body' => '<p>ipsum dolor sit amet consectetur, adipisicing elit. Sunt aut nesciunt, doloremque ipsum consequatur aliquid nulla maiores quo nam suscipit laborum. Quidem culpa perferendis vero ad eligendi quas quaerat explicabo, ut impedit libero,</p><p> nemo repudiandae ullam voluptatem reprehenderit aliquam minima ipsum distinctio blanditiis in aut? Quo iure distinctio fugiat! Dolor, rerum! Nisi esse error nemo quidem vitae hic. Illo doloremque rem sapiente repudiandae expedita autem inventore iusto reprehenderit blanditiis magnam eligendi suscipit dolore labore itaque dolor atque earum vero cupiditate quasi,</p><p> temporibus eaque sed nisi! Vitae amet provident veniam autem nostrum, unde, culpa molestias, ratione blanditiis molestiae rem enim fuga inventore error nam? Possimus molestiae voluptates iusto ratione debitis rerum hic earum facilis, dolorum accusantium vel tempore, ducimus voluptate repellat perspiciatis? Amet voluptatibus quo nulla quaerat, magnam autem similique dolorum officia numquam odio, totam quos atque. Omnis esse sit ipsa. Dicta commodi quis libero perspiciatis tempora, aut laudantium voluptate numquam.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Judul kedua',
        //     'slug' => 'judul-kedua',
        //     'excerpt' => 'ipsum dolo sit amet consectetur, adipisicing elit. Sunt aut nesciunt, doloremque ipsum consequatur aliquid nulla maiores quo nam suscipit laborum. Quidem culpa perferendis vero ad eligendi quas quaerat explicabo,',
        //     'body' => '<p>ipsum dolor sit amet consectetur, adipisicing elit. Sunt aut nesciunt, doloremque ipsum consequatur aliquid nulla maiores quo nam suscipit laborum. Quidem culpa perferendis vero ad eligendi quas quaerat explicabo, ut impedit libero,</p><p> nemo repudiandae ullam voluptatem reprehenderit aliquam minima ipsum distinctio blanditiis in aut? Quo iure distinctio fugiat! Dolor, rerum! Nisi esse error nemo quidem vitae hic. Illo doloremque rem sapiente repudiandae expedita autem inventore iusto reprehenderit blanditiis magnam eligendi suscipit dolore labore itaque dolor atque earum vero cupiditate quasi,</p><p> temporibus eaque sed nisi! Vitae amet provident veniam autem nostrum, unde, culpa molestias, ratione blanditiis molestiae rem enim fuga inventore error nam? Possimus molestiae voluptates iusto ratione debitis rerum hic earum facilis, dolorum accusantium vel tempore, ducimus voluptate repellat perspiciatis? Amet voluptatibus quo nulla quaerat, magnam autem similique dolorum officia numquam odio, totam quos atque. Omnis esse sit ipsa. Dicta commodi quis libero perspiciatis tempora, aut laudantium voluptate numquam.</p>',
        //     'category_id' => 1,
        //     'user_id' => 1,
        // ]);
        // Post::create([
        //     'title' => 'Judul ketiga',
        //     'slug' => 'judul-tiga',
        //     'excerpt' => 'ipsum dolo sit amet consectetur, adipisicing elit. Sunt aut nesciunt, doloremque ipsum consequatur aliquid nulla maiores quo nam suscipit laborum. Quidem culpa perferendis vero ad eligendi quas quaerat explicabo,',
        //     'body' => '<p>ipsum dolor sit amet consectetur, adipisicing elit. Sunt aut nesciunt, doloremque ipsum consequatur aliquid nulla maiores quo nam suscipit laborum. Quidem culpa perferendis vero ad eligendi quas quaerat explicabo, ut impedit libero,</p><p> nemo repudiandae ullam voluptatem reprehenderit aliquam minima ipsum distinctio blanditiis in aut? Quo iure distinctio fugiat! Dolor, rerum! Nisi esse error nemo quidem vitae hic. Illo doloremque rem sapiente repudiandae expedita autem inventore iusto reprehenderit blanditiis magnam eligendi suscipit dolore labore itaque dolor atque earum vero cupiditate quasi,</p><p> temporibus eaque sed nisi! Vitae amet provident veniam autem nostrum, unde, culpa molestias, ratione blanditiis molestiae rem enim fuga inventore error nam? Possimus molestiae voluptates iusto ratione debitis rerum hic earum facilis, dolorum accusantium vel tempore, ducimus voluptate repellat perspiciatis? Amet voluptatibus quo nulla quaerat, magnam autem similique dolorum officia numquam odio, totam quos atque. Omnis esse sit ipsa. Dicta commodi quis libero perspiciatis tempora, aut laudantium voluptate numquam.</p>',
        //     'category_id' => 2,
        //     'user_id' => 2,
        // ]);


    }
}
