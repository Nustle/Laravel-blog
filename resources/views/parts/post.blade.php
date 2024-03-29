<div class="boxed sticky push-down-45">
    <div class="meta">
        @isset ($post->image)
            <img class="wp-post-image" src="{{ asset('storage/' . $post->image)}}">
        @endisset
        <div class="row">
            <div class="col-xs-12  col-sm-10  col-sm-offset-1">
                <div class="meta__container--without-image">
                    <div class="row">
                        <div class="col-xs-12  col-sm-7">
                            <div class="meta__info">
                                {{ $post->categories->implode('name', ', ') }}
                            </div>
                        </div>
                        <div class="col-xs-12  col-sm-7">
                            <div class="meta__info">
                            <strong>{{ $post->title }}</strong>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-5">
                            <div class="meta__comments">
                                <span class="meta__date"><span class="glyphicon glyphicon-calendar"></span> &nbsp; {{ $post->created_at }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="sticky__box">
        <span class="sticky__circle"></span>
        <span class="sticky__circle"></span>
        <span class="sticky__circle"></span>
        <span class="sticky__circle"></span>
    </div>
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="post-content--front-page">
                <h2 class="front-page-title">
                    <a href="{{ route('site.posts.post', ['id' => $post->id]) }}">{{ $post->caption }}</a>
                </h2>
                @if ($post->tagline)
                    <h3>{{ $post->tagline }}</h3>
                @endif
                @if ($post->announce)
                    <p>
                        {!! $post->announce !!}
                    </p>
                @endif
            </div>
            <a href="{{ route('site.posts.post', ['slug' => $post->slug]) }}">
                <div class="read-more">
                    Читать далее <span class="glyphicon glyphicon-chevron-right"></span>
                    <div class="comment-icon-counter">
                        <span class="glyphicon glyphicon-comment comment-icon"></span>
                    <span class="comment-counter">{{ $post->comments->count() }}</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</div>
