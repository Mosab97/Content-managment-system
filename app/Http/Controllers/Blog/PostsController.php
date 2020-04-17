<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function show(Post $post)
    {
        return view('Blog.show', [
            'post' => $post

        ]);
    }

    public function category(Category $category)
    {


        return view('blog.category', [
            'category' => $category,
            'posts' =>$category->posts()->searched()->simplePaginate(3),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }

    public function tag(Tag $tag)
    {




        return view('blog.tag', [
            'tag' => $tag,
            'posts' =>$tag->posts()->searched()->simplePaginate(3),
            'categories' => Category::all(),
            'tags' => Tag::all(),
        ]);
    }
}
