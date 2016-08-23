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
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $_SERVER['PHP_SELF']; ?>">Центр мониторинга качества образования</a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=AddNewInterview"; ?>">Добавление новой анкеты</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ManageInterview"; ?>">Управление созданными анкетами</a></li>
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ViewResultsInterview"; ?>">Просмотр результатов</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo $_SERVER['PHP_SELF']."?exit=true"; ?>">Выйти</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="container">
    <div class="form-interview">
        <h3>Статистические показатели</h3>
        <br>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Количество организаций</div>
                    <div class="panel-body">
                        Доступно организаций: <?php echo $statisticOrganisation[0]['countOrganisations']; ?> шт.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Количество анкет</div>
                    <div class="panel-body">
                        Доступно анкет: <?php echo $statisticInterview[0]['countInterview']; ?> шт.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Количество вопросов</div>
                    <div class="panel-body">
                        Доступно вопросов: <?php echo $statisticQuestion[0]['countQuestion']; ?> шт.
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-info">
                    <div class="panel-heading">Количество ответов на вопросы</div>
                    <div class="panel-body">
                        С вариантом выбора: <?php echo $statisticHit[0]['countHit']; ?> шт.
                        <br>
                        Введенных в текстовые поля: <?php echo $statisticHitTxtField[0]['countHitTxtField']; ?> шт.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="text-muted">© 2016 ФГБОУ ВО "Ростовский государственный университет путей сообщения". Центр мониторинга качества образования.</p>
    </div>
</div>
</body>
</html>