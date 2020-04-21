@extends('layouts.app')
@section('css')
    <style>
        .btn-info{
            color: #fff;
        }
    </style>
@endsection

@section('content')




    <div class="card card-default">
        <div class="card-header">Trashed Posts</div>
        <div class="card-body">
    @if($posts->count() > 0)
<table class="table">

    <thead>
    <th>Image</th>
    <th>Title</th>
    <th></th>
    <th></th>
    </thead>
    <tbody>
    @foreach($posts as $post)
        <tr>
            <td>
                <img src="{{asset('storage/'.$post->image)}}" width="120px" height="60px" alt="post image">
            </td>


            <td>
                {{$post->title}}
            </td>

                <td>
                    <form action="{{route('restore-posts',$post->id)}}" method="post">

                        @csrf
                        @method('PUT')
{{--                        <a href="{{route('posts.restore',$post->id)}}" class="btn btn-info btn-sm">Restore</a>--}}

                        <button type="submit" class="btn btn-info btn-sm">Restore</button>

                    </form>
                </td>


            <td>
                <form action="{{route('posts.destroy',$post->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit"  class="btn btn-danger btn-sm">Trash</button>
                </form>
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
        @else
        <h1 class="text-center">No Posts Yet</h1>
        @endif
        </div>
    </div>
@endsection
