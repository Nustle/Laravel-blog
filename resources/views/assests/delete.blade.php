<title>Удаление статьи</title>

<form method="POST">
    {{ csrf_field() }}

    Название<br>
    <input type="text" name="name"><br>
    <input type="submit" value="Удалить">
</form>
<hr>
<a href="#">Назад</a>
