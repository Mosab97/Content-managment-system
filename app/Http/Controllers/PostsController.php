<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\Categories\UpdateCategoriesRequest;
use App\Http\Requests\Posts\CreatePostsRequest;
use App\Http\Requests\Posts\UpdatePostsRequest;
use App\Post;
use App\Tag;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('VerifyCategoriesCount')-> only('create','store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  view('posts.index',[
            'posts' => Post::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',[
            'categories' => Category::get(),
            'tags' => Tag::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreatePostsRequest $request)
    {
        $image = $request->image->store('posts');
        $post = Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'content' => $request->content,
            'image' => $image,
            'published_at' => $request->published_at,
            'category_id' =>$request->category,
            'user_id' => auth()->user()->id

        ]);

        if($request->tags)
        {
            $post->tags()->attach($request->tags);
        }
        session()->flash('success','Post Created Successfully');
        return  redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return  view('posts.create',[
            'post' =>$post,
            'categories' => Category::get(),
            'tags' => Tag::all()


        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePostsRequest $request, Post $post)
    {
        $data = $request->only(['title','description','published_at','content']);

        if($request->hasFile('image')){
            $image  = $request->image->store('posts');
//            Storage::delete($post->image);
            $post->deleteImage();
            $data['image'] = $image;
        }

        if($request->tags){
            $post->tags()->sync($request->tags);
        }
        $post->update($data);

        session()->flash('success','Post Updated Successfully.');
        return redirect(route('posts.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::withTrashed()->where('id','=',$id)->firstOrFail();
        if ($post->trashed())
        {
//            Storage::delete($post->image);
            $post->deleteImage();
            $post->forceDelete();

        }else{
            $post->delete();
        }
        session()->flash('success','Post Deleted Successfully');
        return  redirect(route('posts.index'));

    }

     public function trashed (){
        $trashed = Post::onlyTrashed()->get();
        return view('posts.trashed-index',[
            'posts'=>$trashed
        ]);
     }

     public function restore($id)
     {
         $post = Post::onlyTrashed()->where('id',$id)->restore();
         session()->flash('success','Post Restored Successfully.');
         return redirect(route('trashed-posts.index'));

     }
}
