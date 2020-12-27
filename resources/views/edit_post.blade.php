@extends('template.base')
@section('title', $post->title)

@section('content')
    <form
        method="POST"
        @if($type == 'edit')
            action="{{ route('posts.update', ['post' => $post->id]) }}"
        @else
            action="{{ route('posts.store', ['post' => $post->id]) }}"
        @endif
        class="container shadow-sm p-3 mb-5 bg-white rounded"
        enctype="multipart/form-data"
    >
        @csrf
        @if($type == 'edit')
            @method('PUT')
        @else
            @method('POST')
        @endif
        <div class="row">
            <div class="col">
                <h1>
                    <input type="text" class="form-control" min="10" required name="title" value="{{ $post->title }}">
                </h1>
            </div>
            <div class="col">
                <h3>
                    <input type="text" class="form-control" required name="tag" value="{{ $post->tag }}">
                </h3>
            </div>
        </div>
        <div class="row">
            <input type="file" required name="image" class="form-control m-2" accept="image/x-png,image/gif,image/jpeg">
        </div>
        <div class="row">
            <div class="col">
                <h3 style="text-indent: 20px">
                    <textarea  class="form-control m-2" style="height: 60vh" name="content" required>{{ $post->content }}
                    </textarea>
                </h3>
            </div>
        </div>
        <button class="btn btn-success">Отправить</button>
    </form>
@endsection

