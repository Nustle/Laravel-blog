<div class="tags widget-tags">
    <h6>Тэги</h6>
    <hr>
        @forelse ($tags as $tag)
            <a href="#" class="tags__link">{{ $tag->name }}</a>
        @empty
            <p>Нет тегов для отображения. </p>
        @endforelse
</div>
