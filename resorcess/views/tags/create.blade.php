@extends('layouts.app')

@section('content')

    <div class="card card-default">
        <div class="card-header">
            {{isset($category)? 'Edit Tag' : 'Create Tag'}}
        </div>

        <div class="card-body">
            @include('partials.error')

            <form action="{{isset($tag)? route('tags.update',$tag->id) : route('tags.store')}}" method="POST">
                @csrf
                @if(isset($tag))
                    @method('PUT')

                @endif
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input  type="text" class="form-control" id="Name" name="name" value="{{isset($tag)? $tag->name : ''}}" autofocus>
                </div>
                <div class="form-body">
                    <button class="btn btn-success">
                        {{isset($tag)? 'Update Tag' : 'Add Tag'}}
                    </button>
                </div>
            </form>
        </div>
    </div>
    @endsection
