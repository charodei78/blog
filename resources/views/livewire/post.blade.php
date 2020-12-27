<div class="document">
    <div class="dochead">
        <a href="/posts/{{ $postId }}" class="dhead">{{ $title }}</a>
    </div>
    <div class="dimg">
        <img src="{{ asset('storage/'.substr($image, 7)) }}">
    </div>
    <div class="dcontent">
        <p class="post-text">{{ $content }}</p>
    </div>
    <div class="bubble" align="right">
        <span>#{{ $tag }}</span>
    </div>
</div>
<div class="rtboxbg">&nbsp;</div>
