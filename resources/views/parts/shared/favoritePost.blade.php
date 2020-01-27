@isset($post)
    <div class="widget-featured-post  push-down-30">
        <h6>Популярный пост</h6>
        @isset($post->image)
            <img src="{{ asset('storage/' . $post->image) }}" width="293" height="127">
        @endisset
        <h4 class="post-title">
        <a href="post/{{ $post->slug }}">{{ $post->title }}</a>
        </h4>
        @isset ($post->tagline)
            <p>{{ $post->tagline }}</p>
        @endisset
    </div>
@endisset
