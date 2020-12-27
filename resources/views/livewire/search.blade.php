<div id="search">
    <input type="search" placeholder="Поиск..." wire:model.debounce.400ms="input" name="search" class="form-control ds-input"/>
    @if($posts)
    <ul class="list-group">
        @foreach($posts as $post)
        <li class="list-group-item">
            <a href="/posts/{{ $post->id }}">
                {{ $post->title }}
            </a>
        </li>
        @endforeach
    </ul>
    @endif
</div>
