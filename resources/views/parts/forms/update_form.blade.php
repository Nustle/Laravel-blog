<div class="boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="contact">
                <h2>Редактирование поста</h2>
                <form action="{{ route('site.posts.updatePost', ['id' => $post->id]) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12">
                            <select name="category">
                                @foreach ($categories as $category)
                                    <option selected>{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-xs-12">
                            <input type="file" name="image">

                            @error('image')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror
                            <input class="@error('image') is-invalid @enderror" type="text" placeholder="Выберите файл" disabled>
                        </div>
                        <div class="col-xs-12">
                            @error('title')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror

                            <input type="text" placeholder="Заголовок поста" class="@error('title') is-invalid @enderror" name="title" value="{{ old('title', $post->title) }}">
                        </div>
                        <div class="col-xs-12">
                            @error('tagline')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror

                            <input type="text" placeholder="Теглайн" class="@error('tagline') is-invalid @enderror" name="tagline" value="{{ old('tagline', $post->tagline) }}">
                        </div>
                        <div class="col-xs-12">
                            @error('announce')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror

                            <textarea rows="6" type="text" placeholder="Анонс" class="@error('announce') is-invalid @enderror" name="announce">{{ old('announce', $post->announce) }}</textarea>
                        </div>
                        <div class="col-xs-12">
                            @error('fulltext')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror

                            <textarea rows="6" type="text" placeholder="Текст статьи" class="@error('fulltext') is-invalid @enderror" name="fulltext">{{ old('fulltext', $post->fulltext) }}</textarea>
                        </div>
                        <div class="col-xs-12">
                            <select name="tag">
                                @foreach ($tags as $tag)
                                    <option selected class="tags__link">{{ $tag->name }}</option>
                                @endforeach
                            </select>
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
