<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="utf-8">
    <title>Laravel blog</title>
    <style>
        tml,
        body {
            margin: 0;
            padding: 0;
            background-color: #e9e9e9;
            font-family: Geneva, Tahoma, sans-serif;
            font-size: 18px;
        }

        a {
            color: inherit;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        .base-container {
            display: inherit;
            justify-content: flex-end;
            margin: 0 auto;
            width: 1080px;
        }

        #top-panel {
            padding: 5px;
            background-color: #353333;
            height: 40px;
            width: 100%;
            position: fixed;
            top: 0;
            display: flex;
            flex-wrap: nowrap;
            justify-content: flex-end;
            align-items: center;
        }

        #content-wrapper {
            border: 1px solid #f7f7f7;
            background-color: #fff;
            margin-top: 80px;
            padding: 10px;
            box-sizing: border-box;
            border-radius: 5px;
        }

        #sign-up {
            display: flex;
            justify-content: center;
        }

        .main-title {
            border-bottom: 3px solid #f7f7f7;
            padding-bottom: 5px;
            display: flex;
            justify-content: center;
            margin: 5px 0;
            font-size: 1.5em;
        }

        .form {
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            font-size: 1.2em;
            border: 1px solid #c5c5c5;
            width: 60%;
            margin: auto;
            padding: 10px;
        }

        .form-item {
            margin: 10px 0;
        }

        .form-item input {
            outline: none;
            font-size: 1.2em;
        }

        .form-item input::-webkit-meter-suboptimal-value,
        .form-item input::-webkit-input-placeholder {
            color: #c5c5c5;
        }

        .form-item input[type="text"],
        .form-item input[type="password"] {
            width: 100%;
        }

        .signin {
            color: #fff;
            font-size: 0.9em;
        }
    </style>
</head>

<body>
    <div id="top-panel">
        <div class="base-container">
            <span class="inline-box signin">
                <a href="#">Регистрация</a> |
                <a href="#">Войти</a>
            </span>
        </div>
    </div>
    <div id="content-wrapper" class="base-container">
        <h1 class="main-title">Laravel blog</h1>
        <div class="content">Laravel рулит!!!</div>
    </div>
</body>

</html>
