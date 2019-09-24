<title>Изменение статьи</title>

<form method="POST">
    {{ csrf_field() }}

    Название<br>
    <input type="text" name="name"><br>
    Новый контент<br>
    <textarea name="content"></textarea><br>
    <input type="submit" value="Добавить">
</form>
<hr>
<a href="#">Назад</a> <br>
