@extends('template.base')
@section('head')
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('title', 'Blog')

@section('content')
    <!--wrapper starts-->
    <div id="wrapper">
        <!--container starts-->
        <div id="container">
            <!--ltcontent starts-->
            <div id="ltcontent">
                <!--hdlogo starts-->
                <div id="hdlogo" align="center">
                    <img src="images/topbanner.jpg" alt=""/>
                </div>
                <!--hdlogo ends-->

                <livewire:login-form/>
                <livewire:search/>
            </div>
            <!--ltcontent ends-->

            <!--rtcontent starts-->
            <div id="rtcontent">
                <!--head starts-->
                <div class="head">Блог</div>
                <div class="gap"></div>
                <!--head ends-->
                @auth
                    @if(Auth::user()->is_admin)
                        <button onclick="location.href='{{ route('posts.create') }}'" class="btn btn-primary">Добавить</button>
                    @endif
                @endauth
                <div class="gap"></div>
                @forelse($posts as $post)
                    <livewire:post
                        wire:key="{{$post->id}}"
                        postId="{{$post->id}}"
                        title="{{$post->title}}"
                        content="{{$post->content}}"
                        image="{{$post->image}}"
                        tag="{{$post->tag}}"
                    />
                @empty
                    <h1>Пусто</h1>
                @endforelse

                <div class="gap"></div>


                <!--menulinks starts -->
                {{ $posts->onEachSide(1)->links('vendor.pagination.default') }}
                <div class="clear"></div>
                <!--menulinks ends -->
                <!--post ends-->
            </div>
            <!--rtcontent ends-->
            <div class="clear"></div>
            <br/>

            <!--footer starts-->
            <div id="footer">
                <div>
                    &copy; Задание: Блог
                </div>
            </div>
            <!--footer ends-->
        </div>
        <!--container starts-->
    </div>
    <!--wrapper ends-->

@endsection
