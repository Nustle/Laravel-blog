<form method="POST">
    {{ csrf_field() }}

    <input name="login" type="text" placeholder="Введите логин"> <br>
    <input name="password" type="password" placeholder="Введите пароль"> <br>
    <input name="remember" type="checkbox">
    <label>Запомнить меня</label> <br>
    <input type="submit" value="Войти"> <br>
</form>
