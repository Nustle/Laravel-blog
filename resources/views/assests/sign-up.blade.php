<title>Регистрация</title>

<form method="POST">
    {{ csrf_field() }}

    <input name="login" type="text" placeholder="Введите имя"> <br>
    <input name="password" type="password" placeholder="Введите пароль"> <br>
    <input name="password-reply" type="password" placeholder="Повторите пароль"> <br>

    <input type="submit" value="Добавить">
</form>
