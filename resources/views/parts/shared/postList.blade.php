@if(isset($recentPosts) && isset($popularPosts))
    <div class="widget-posts  push-down-30">
        <h6>Популярное / Свежее</h6>
        <ul class="nav  nav-tabs">
            <li class="active">
                <a href="#recent-posts" data-toggle="tab"> <span class="glyphicon  glyphicon-time"></span> &nbsp;Свежо</a>
            </li>
            <li>
                <a href="#popular-posts" data-toggle="tab"> <span class="glyphicon  glyphicon-flash"></span> &nbsp;Популярно </a>
            </li>
        </ul>

        <div class="tab-content">
            <div class="tab-pane  fade  in  active" id="recent-posts">
                @forelse($recentPosts as $recentPost)
                    <div class="push-down-25">
                        @isset($recentPost->image)
                            <img src="{{ asset('storage/' . $recentPost->image) }}">
                        @endisset
                        <h5>
                        <a href="post/{{ $recentPost->slug }}">{{ $recentPost->title }}</a><br>
                        <span class="widget-posts__time">{{ $recentPost->created_at }}</span>
                        </h5>
                    </div>
                @empty
                    <div class="push-down-15">
                        Нет доступных записей для отображения
                    </div>
                @endforelse
            </div>
            <div class="tab-pane  fade" id="popular-posts">
                @forelse($popularPosts as $popularPost)
                    <div class="push-down-25">
                        @isset($popularPost->image)
                            <img src="{{ asset('storage/' . $popularPost->image) }}">
                        @endisset
                        <h5>
                        <a href="post/{{ $popularPost->slug }}">{{ $popularPost->title }}</a><br>
                            <span class="widget-posts__views">
                                {{ $popularPost->views_count }}
                                <img src="https://img.icons8.com/material-sharp/24/000000/visible.png">
                            </span>
                        </h5>
                    </div>
                @empty
                    <div class="push-down-15">
                        Нет доступных записей для отображения
                    </div>
                @endforelse
            </div>
        </div>
    </div>
@endif
