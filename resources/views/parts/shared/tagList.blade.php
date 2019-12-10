
@forelse ($tags as $tag)
    <strong>{{ $tag->name }}</strong>
@empty
    <p>Нет постов для отображения</p>
@endforelse
