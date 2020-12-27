@extends('template.base')
@section('title', $post->title)

@section('content')
    <div class="container shadow-sm p-3 mb-5 bg-white rounded">
        @if(Auth::user()->is_admin)
            <div class="row">
                <div class="col">
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <button type="button"
                                onclick="location.href = '{{ route('posts.edit', ['post' => $post->id]) }}'"
                                class="btn btn-primary">Изменить
                        </button>
                        <button type="button"
                                onclick="fetch('{{ route('posts.destroy', ['post' => $post->id]) }}', {method: 'DELETE',
                                        headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}'}}); location.href='/'"
                                class="btn btn-danger">Удалить
                        </button>
                    </div>
                </div>
            </div>
        @endif
        <div class="row">
            <div class="col">
                <h1>
                    {{ $post->title }}
                </h1>
            </div>
            <div class="col">
                <h3>
                    #{{ $post->tag }}
                </h3>
            </div>
        </div>
        <div class="row">
            <img class="rounded w-100 m-3" style="height: 400px; object-fit: cover" src="{{ asset('storage/'.substr($post->image, 7)) }}">
        </div>
        <div class="row">
            <div class="col">
                <h3 style="text-indent: 20px">
                    {{ $post->content }}
                </h3>
            </div>
        </div>
    </div>
@endsection
