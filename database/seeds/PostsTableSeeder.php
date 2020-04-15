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
        $author1 = \App\User::create([
            'name' => 'Ahmed',
            'email' => 'Ahmed@Ahmed.com',
            'password' => \Illuminate\Support\Facades\Hash::make( 'Ahmed@Ahmed.com')
        ]);



        $author2 = \App\User::create([
            'name' => 'Ali',
            'email' => 'Ali@Ali.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Ali@Ali.com')
        ]);



        $author3 = \App\User::create([
            'name' => 'Amal',
            'email' => 'Amal@Amal.com',
            'password' => \Illuminate\Support\Facades\Hash::make('Amal@Amal.com')
        ]);

        $category1 = \App\Category::create([
            'name' => 'News'
        ]);


        $category2 = \App\Category::create([
            'name' => 'Marketing'
        ]);

        $category3 = \App\Category::create([
            'name' => 'Partnership'
        ]);

        $post1 = \App\Post::create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'category_id' => $category1->id,
            'image' => 'posts/01.jpg',
            'user_id' => $author1->id
        ]);



        $post2 = \App\Post::create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'category_id' => $category2->id,
            'image' => 'posts/02.jpg',
            'user_id' => $author2->id


        ]);



        $post3 = \App\Post::create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'category_id' => $category2->id,
                    'image' => 'posts/03.jpg',
            'user_id' => $author1->id

        ]);



        $post4 = \App\Post::create([
            'title' => 'The standard Lorem Ipsum passage, used since the 1500s',
            'description' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'content' => "Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
            'category_id' => $category3->id,
            'image' => 'posts/04.jpg',
            'user_id' => $author3->id


        ]);


        $tag1 = \App\Tag::create([
            'name' => 'job'
        ]);



        $tag2 = \App\Tag::create([
            'name' => 'customers'
        ]);



        $tag3 = \App\Tag::create([
            'name' => 'recored'
        ]);


        $post1->tags()->attach([$tag1->id,$tag2->id]);
        $post2->tags()->attach([$tag2->id,$tag3->id]);
        $post3->tags()->attach([$tag1->id,$tag3->id]);


    }
}
