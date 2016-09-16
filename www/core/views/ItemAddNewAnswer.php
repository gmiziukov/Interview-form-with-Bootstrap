<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администрирования</title>
    <script type="text/javascript" src="../style/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../style/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../style/bootstrap/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap-toggle.min.css" />
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
                <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?view=AddNewInterview"; ?>">Добавление новой анкеты</a></li>
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
    <ul class="nav nav-justified">
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewOrganisation"; ?>">Добавление организаций</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewInterview"; ?>">Добавление анкетирования</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewQuestion"; ?>">Добавление вопросов</a></li>
        <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewAnswer"; ?>">Добавление ответов</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemPacketLoad"; ?>">Пакетная загрузка</a></li>
    </ul>
</div>
<div class="container">
    <div class="form-interview">
        <div class="alert alert-success <?php echo $successInsertBox; ?>" role="alert">
            <strong>Сообщение!</strong> Данные успешно добавлены!
        </div>
        <div class="alert alert-danger <?php echo $errorInsertBox; ?>" role="alert">
            <strong>Ошибка!</strong> Произошла ошибка вовремя добавления данных в базу данных!
        </div>
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="QuestionName" class="control-label">Выберите вопрос:</label>
                <select class="form-control" id="QuestionName" name="idQuestion">
                    <?php
                    foreach($arrayQuestions as $items)
                    {
                        ?>
                        <option value="<?php echo $items['IdQuestion']; ?>">
                            <?php echo $items['QuestionName']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="TypeAnswer" class="control-label">Выберите тип ответа:</label>
                <select class="form-control" id="TypeAnswer" name="typeAnswer">
                    <option value="radio">Одиночный выбор</option>
                    <option value="checkbox">Множественный выбор</option>
                    <option value="text">Ввод текста</option>
                </select>
            </div>
            <div class="form-group">
                <label for="AnswerName" class="control-label">Наименование нового ответа:</label>
                <input type="text" class="form-control" id="AnswerName" name="answerName" maxlength="250" required />
            </div>
            <div class="form-group">
                <label for="GroupAnswer" class="control-label">Установите группу для ответа:</label>
                <input type="text" class="form-control" id="GroupAnswer" name="groupAnswer" maxlength="30" required />
            </div>
            <div class="form-group">
                <label for="toggle-one" class="control-label">Сделать поле обязательным для заполнения:</label>
                <input id="toggle-one" type="checkbox" name="isRequired" />
            </div>
            <div class="form-group">
                <label for="OrderView" class="control-label">Порядок сортировки:</label>
                <input type="number" class="form-control" id="OrderView" name="orderView" maxlength="30" required />
            </div>
            <input class="btn btn-primary" type="submit" name="btn" value="Добавить" />
            <input type="hidden" name="view" value="ItemAddNewAnswer" />
            <input type="hidden" name="isAddAnswer" value="true" />
        </form>
    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="text-muted">© 2016 ФГБОУ ВО "Ростовский государственный университет путей сообщения". Центр мониторинга качества образования.</p>
    </div>
</div>
<script type="text/javascript">
    $(function() {
        $('#toggle-one').bootstrapToggle();
    });
</script>
</body>
</html>