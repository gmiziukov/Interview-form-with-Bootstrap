<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Панель администрирования</title>
    <script type="text/javascript" src="../style/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../style/bootstrap/js/moment-with-locales.min.js"></script>
    <script type="text/javascript" src="../style/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../style/bootstrap/js/bootstrap-datetimepicker.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap-datetimepicker.min.css" />
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
        <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewInterview"; ?>">Добавление анкетирования</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewQuestion"; ?>">Добавление вопросов</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemAddNewAnswer"; ?>">Добавление ответов</a></li>
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
                <label for="OrganisationName" class="control-label">Выберите организацию:</label>
                <select class="form-control" id="OrganisationName" name="idOrganisation">
                    <?php
                    foreach($arrayOrganisations as $items)
                    {
                        ?>
                        <option value="<?php echo $items['IdOrganisation']; ?>">
                            <?php echo $items['OrganisationName']; ?>
                        </option>
                        <?php
                    }
                    ?>
                </select>
            </div>
            <div class="form-group">
                <label for="InterviewName" class="control-label">Наименование новой анкеты:</label>
                <input type="text" class="form-control" id="InterviewName" name="interviewName" maxlength="250" required />
            </div>
            <div class="form-group">
                <label class="control-label">Дата с:</label>
                <div class="input-group date" id="dateTimePickerTo">
                    <input type="text" class="form-control" name="dateTo" required />
                    <span class="input-group-addon">
                        <span class="glyphicon-calendar glyphicon"></span>
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label">Дата по:</label>
                <div class="input-group date" id="dateTimePickerFrom">
                    <input type="text" class="form-control" name="dateFrom" required />
                    <span class="input-group-addon">
                        <span class="glyphicon-calendar glyphicon"></span>
                    </span>
                </div>
            </div>
            <input class="btn btn-primary" type="submit" name="btn" value="Добавить" />
            <input type="hidden" name="view" value="ItemAddNewInterview" />
            <input type="hidden" name="isAddInterview" value="true" />
        </form>
    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="text-muted">© 2016 ФГБОУ ВО "Ростовский государственный университет путей сообщения". Центр мониторинга качества образования.</p>
    </div>
</div>
<script type="text/javascript">
    $(function () {
        $('#dateTimePickerTo').datetimepicker({pickTime: false, language: 'ru'});
        $('#dateTimePickerFrom').datetimepicker({pickTime: false, language: 'ru'});
    });
</script>
</body>
</html>