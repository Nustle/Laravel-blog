<div class="boxed push-down-45">
    <div class="row">
        <div class="col-xs-10  col-xs-offset-1">
            <div class="contact">
                <h2>Новый пост</h2>
                <form action="{{ route('site.posts.createPost') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-xs-12">

                            @error('title')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror
                            <input type="text" placeholder="Заголовок поста" class="@error('title') is-invalid @enderror" name="title" value="{{ old('title') }}">
                        </div>
                        <div class="col-xs-12">

                            @error('tagline')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror
                            <input type="text" placeholder="Теглайн" class="@error('tagline') is-invalid @enderror" name="tagline" value="{{ old('tagline') }}">
                        </div>
                        <div class="col-xs-12">

                            @error('announce')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror
                            <textarea rows="6" type="text" placeholder="Анонс" class="@error('announce') is-invalid @enderror" name="announce">{{ old('announce') }}</textarea>
                        </div>
                        <div class="col-xs-12">

                            @error('fulltext')
                                <strong class="register-error">{{ $message }}</strong>
                            @enderror
                            <textarea rows="6" type="text" placeholder="Текст статьи" class="@error('fulltext') is-invalid @enderror" name="fulltext">{{ old('fulltext') }}</textarea>
                            <button type="submit" class="btn btn-primary">Добавить</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
