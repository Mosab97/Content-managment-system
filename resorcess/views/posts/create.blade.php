@extends('layouts.app')

@section('content')

    <div class="card card-defualt">
        <div class="card-header">
            {{isset($post)? 'Edit Post' : 'Create Post'}}

        </div>
        <div class="card-body">
            @include('partials.error')

            <form action="{{isset($post)? route('posts.update',$post->id) : route('posts.store')}}" method="post" enctype="multipart/form-data">
                @csrf
                @if(isset($post))
                @method('PUT')
                    @endif

                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="{{isset($post)? $post->title : ''}}" required>
                </div>

                <div class="form-group">
                    <label for="description">Descritpion</label>
                    <textarea name="description" id="description" cols="5" rows="5" class="form-control" required>{{isset($post)? $post->description : ''}}</textarea>
                </div>

                <div class="form-group">
                    <input id="content" type="hidden" name="content" value="{{isset($post)? $post->content : ''}}" required>
                    <trix-editor input="content"></trix-editor>
                </div>
                <div class="form-group">
                    <label for="published_at">Published At</label>
                    <input type="text" class="form-control" name="published_at" id="published_at" value="{{isset($post)? $post->published_at : ''}}" required>
                </div>
                @if(isset($post))
                    <div class="form-group">
                        <img src="{{asset('storage/' . $post->image)}}" alt="image" width="100%">
                    </div>
                    @endif
                <div class="form-group">
                    <label for="image">Image</label>
                    <input type="file" name="image" id="image" class="form-control" {{isset($post)? "" : 'required'}}>
                </div>

                <div class="form-group">
                    <label for="category">Category</label>
                    <select class="form-control" name="category" id="category" required>
                        @foreach($categories as $category)

                            <option  @if(isset($post))

                                     {{($category->id ===  $post->category_id )? 'selected':''}}
                                     @endif  value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                    </select>
                </div>

         @if($tags->count() > 0)

                    <div class="form-group">
                        <label for="tag">Tags</label>
                        <select name="tags[]" id="tag" class="form-control tags-selector" multiple required>
                            @foreach($tags as $tag)
                                <option
                                   @if(isset($post))
                                   @if($post->hasTag($tag->id)) selected @endif
                                       @endif
                                    value="{{$tag->id}}">{{$tag->name}}</option>
                            @endforeach
                        </select>
                    </div>
             @endif
                <div class="form-group">
                    <button type="submit" class="btn btn-success">{{isset($post)? 'Update Post' : 'Create Post'}}</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('css')

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />


@endsection

@section('scripts')

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix-core.js"></script>
{{--    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/trix/1.2.1/trix.js"></script>--}}

    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>



    <script>
    flatpickr('#published_at',{
        enableTime: true,
      enableSeconds:true
    })

    $(document).ready(function() {
        $('.tags-selector').select2();
    });


</script>


@endsection
