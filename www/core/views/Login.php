<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администрирования</title>
    <script type="text/javascript" src="../style/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../style/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/style.css" />
</head>
<body>
<div class="navbar navbar-default navbar-fixed-top" role="navigation">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">Центр мониторинга качества образования</a>
        </div>
    </div>
</div>
<div class="container">
    <div class="alert alert-danger <?php echo $errorSelectBox; ?>" role="alert">
        <strong>Ошибка!</strong> Неправильная пара логин-пароль!
    </div>
    <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <div class="form-sign">
            <p class="form-sign-heading">ФОРМА ВХОДА</p>
            <div class="form-group">
                <label for="UserName">Имя пользователя</label>
                <input type="text" class="form-control" id="UserName" name="userName" placeholder="Введить имя пользователя" required />
            </div>
            <div class="form-group">
                <label for="Password">Пароль</label>
                <input type="password" class="form-control" id="Password" name="password" placeholder="Введите пароль" required />
            </div>
            <input type="submit" class="btn btn-primary" value="Войти">
        </div>
    </form>
</div>
<div id="footer">
    <div class="container">
        <p class="text-muted">© 2016 ФГБОУ ВО "Ростовский государственный университет путей сообщения". Центр мониторинга качества образования.</p>
    </div>
</div>
</body>
</html>