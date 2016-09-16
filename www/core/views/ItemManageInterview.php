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
    <script type="text/javascript" src="../style/bootstrap/js/bootstrap-toggle.min.js"></script>
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap-datetimepicker.min.css" />
    <link rel="stylesheet" href="../style/bootstrap/css/bootstrap-toggle.min.css" />
    <link rel="stylesheet" href="../style/style.css" />
    <script type="text/javascript">
        function GetValue(id, name, to, from, active)
        {
            if(active == 1)
            {
                $(function() {
                    $('#toggle-one').bootstrapToggle('on')
                });
            }
            else
            {
                $(function() {
                    $('#toggle-one').bootstrapToggle('off')
                });
            }

            document.getElementById('IdInterview').value = id;
            document.getElementById('InterviewName').value = name;
            document.getElementById('IdDateTo').value = to;
            document.getElementById('IdDateFrom').value = from;
        }
    </script>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Редактирование анкеты</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="InterviewName" class="control-label">Наименование анкеты:</label>
                        <input type="text" class="form-control" id="InterviewName" name="interviewName" maxlength="250" value="" required />
                    </div>
                    <div class="form-group">
                        <label for="toggle-one" class="control-label">Сделать анкету активной:</label>
                        <input id="toggle-one" type="checkbox" name="isActive" />
                    </div>
                    <div class="form-group">
                        <label class="control-label">Дата с:</label>
                        <div class="input-group date" id="dateTimePickerTo">
                            <input type="text" class="form-control" id="IdDateTo" name="dateTo" required />
                            <span class="input-group-addon">
                                <span class="glyphicon-calendar glyphicon"></span>
                            </span>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label">Дата по:</label>
                        <div class="input-group date" id="dateTimePickerFrom">
                            <input type="text" class="form-control" id="IdDateFrom" name="dateFrom" required />
                            <span class="input-group-addon">
                                <span class="glyphicon-calendar glyphicon"></span>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <input type="submit" class="btn btn-primary" name="btn"  value="Сохранить изменения" />
                </div>
            </div>
            <input type="hidden" name="idInterview" id="IdInterview" value="" />
            <input type="hidden" name="view" value="ItemManageInterview" />
            <input type="hidden" name="isUpdateInterview" value="true" />
        </form>
    </div>
</div>
<!-- Modal -->
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
                <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?view=ManageInterview"; ?>">Управление созданными анкетами</a></li>
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
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemManageOrganisation"; ?>">Управление организациями</a></li>
        <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemManageInterview"; ?>">Управление анкетами</a></li>
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemManageQuestionAnswer"; ?>">Управление вопросами и ответами</a></li>
    </ul>
</div>
<div class="container">
    <div class="form-interview">
        <div class="alert alert-success <?php echo $successUpdateBox; ?>" role="alert">
            <strong>Сообщение!</strong> Данные успешно обновлены!
        </div>
        <div class="alert alert-danger <?php echo $errorUpdateBox; ?>" role="alert">
            <strong>Ошибка!</strong> Произошла ошибка вовремя обновления данных в базу данных!
        </div>
        <div class="alert alert-success <?php echo $successDeleteBox; ?>" role="alert">
            <strong>Сообщение!</strong> Данные успешно удалены!
        </div>
        <div class="alert alert-danger <?php echo $errorDeleteBox; ?>" role="alert">
            <strong>Ошибка!</strong> Произошла ошибка вовремя удаления данных из базу данных!
        </div>
        <table class="table table-hover" width="100%">
            <thead>
            <th>Наименование анкеты</th>
            <th colspan="2">Действия</th>
            </thead>
            <tbody>
            <?php
            foreach($arrayAllInterview as $item)
            {
                ?>
                <tr>
                    <td width="80%" height="40">
                        <?php echo $item['InterviewName']; ?>
                    </td>
                    <td>
                        <a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModal" onclick="GetValue('<?php echo $item['IdInterview']; ?>','<?php echo $item['InterviewName']; ?>','<?php echo $item['DateTo']; ?>','<?php echo $item['DateFrom']; ?>','<?php echo $item['IsActive']; ?>')">Изменить</a>
                    </td>
                    <td>
                        <a class="btn btn-danger" href="<?php echo $_SERVER['PHP_SELF']."?idInterview=".$item['IdInterview']."&view=ItemManageInterview&isDeleteInterview=true"?>" onclick="return confirm('Вы действительно хотите удалить запись?') ? true : false;">Удалить</a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
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
    $(function () {
        $('#dateTimePickerTo').datetimepicker({pickTime: false, language: 'ru'});
        $('#dateTimePickerFrom').datetimepicker({pickTime: false, language: 'ru'});
    });
</script>
</body>
</html>