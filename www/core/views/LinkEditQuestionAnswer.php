<?php

require_once __DIR__.'/../models/ModelCpanel.php';

$modelCpanel = new ModelCPanel();

if(isset($_GET['idInterview']))
{
    $idInterview = $_GET['idInterview'];
}
elseif(isset($_POST['idInterview']))
{
    $idInterview = $_POST['idInterview'];
}

$questions = $modelCpanel->GetQuestions($idInterview);

?>
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
    <script type="text/javascript">
        function GetQuestionValue(key, name, order)
        {
            document.getElementById('IdQuestion').value = key;
            document.getElementById('QuestionName').value = name;
            document.getElementById('OrderView').value = order;
        }
        function GetAnswerValue(key, name, group)
        {
            document.getElementById('IdAnswer').value = key;
            document.getElementById('AnswerName').value = name;
            document.getElementById('GroupAnswer').value = group;
        }
    </script>
</head>
<body>
<!-- Modal -->
<div class="modal fade" id="myModalOne" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Редактирование вопроса</h4>
                </div>
                <div class="modal-body">
                    <label for="QuestionName" class="control-label">Наименование вопроса:</label>
                    <input class="form-control" type="text" name="questionName" id="QuestionName" maxlength="250" value="" required />
                </div>
                <div class="modal-body">
                    <label for="OrderView" class="control-label">Порядок:</label>
                    <input class="form-control" type="text" name="orderView" id="OrderView" value="" required />
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <input type="submit" class="btn btn-primary" name="btn"  value="Сохранить изменения" />
                </div>
            </div>
            <input type="hidden" name="idQuestion" id="IdQuestion" value="" />
            <input type="hidden" name="view" value="LinkEditQuestionAnswer" />
            <input type="hidden" name="idInterview" value="<?php echo $idInterview; ?>" />
            <input type="hidden" name="isUpdateQuestion" value="true" />
        </form>
    </div>
</div>
<!-- Modal -->
<!-- Modal -->
<div class="modal fade" id="myModalTwo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form role="form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="myModalLabel">Редактирование ответа</h4>
                </div>
                <div class="modal-body">
                    <label for="AnswerName" class="control-label">Наименование ответа:</label>
                    <input class="form-control" type="text" name="answerName" id="AnswerName" maxlength="250" value="" required />
                </div>
                <div class="modal-body">
                    <label for="GroupAnswer" class="control-label">Группа ответа:</label>
                    <input class="form-control" type="text" name="groupAnswer" id="GroupAnswer" maxlength="30" value="" required />
                </div>
                <div class="modal-body">
                    <label for="TypeAnswer" class="control-label">Тип ответа:</label>
                    <select class="form-control" id="TypeAnswer" name="typeAnswer">
                        <option value="radio">Одиночный выбор</option>
                        <option value="checkbox">Множественный выбор</option>
                        <option value="text">Ввод текста</option>
                    </select>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
                    <input type="submit" class="btn btn-primary" name="btn"  value="Сохранить изменения" />
                </div>
            </div>
            <input type="hidden" name="idAnswer" id="IdAnswer" value="" />
            <input type="hidden" name="view" value="LinkEditQuestionAnswer" />
            <input type="hidden" name="idInterview" value="<?php echo $idInterview; ?>" />
            <input type="hidden" name="isUpdateAnswer" value="true" />
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
        <li><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemManageInterview"; ?>">Управление анкетами</a></li>
        <li class="active"><a href="<?php echo $_SERVER['PHP_SELF']."?view=ItemManageQuestionAnswer"; ?>">Управление вопросами и ответами</a></li>
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
            <th>Наименование</th>
            <th colspan="2">Действия</th>
            </thead>
            <tbody>
                <?php
                foreach($questions as $itemQuestion)
                {
                    ?>
                        <tr><td width="80%" height="40"><strong><?php echo $itemQuestion['QuestionName']; ?></strong></td>
                        <td><a class="btn btn-primary" href="#" data-toggle="modal" data-target="#myModalOne" onclick="GetQuestionValue('<?php echo $itemQuestion['IdQuestionFK']; ?>','<?php echo $itemQuestion['QuestionName']; ?>','<?php echo $itemQuestion['OrderView']; ?>')">Изменить</a></td>
                        <td><a class="btn btn-danger" href="<?php echo $_SERVER['PHP_SELF']."?idQuestion=".$itemQuestion['IdQuestionFK']."&view=LinkEditQuestionAnswer&idInterview=".$idInterview."&isDeleteQuestion=true"?>" onclick="return confirm('Вы действительно хотите удалить запись?') ? true : false;">Удалить</a></td></tr>
                    <?php

                    $answer = $modelCpanel->GetAnswers($itemQuestion['IdQuestionFK']);

                    foreach($answer as $itemAnswer)
                    {
                        if($itemAnswer['TypeAnswer'] != "text")
                        {
                            ?>
                            <tr><td width="80%" height="40"><?php echo $itemAnswer['AnswerName']; ?></td>
                                <td><a href="#" data-toggle="modal" data-target="#myModalTwo" onclick="GetAnswerValue('<?php echo $itemAnswer['IdAnswer']; ?>','<?php echo $itemAnswer['AnswerName']; ?>','<?php echo $itemAnswer['GroupAnswer']; ?>')">Изменить</a></td>
                                <td><a href="<?php echo $_SERVER['PHP_SELF']."?idAnswer=".$itemAnswer['IdAnswer']."&view=LinkEditQuestionAnswer&idInterview=".$idInterview."&isDeleteAnswer=true"?>" onclick="return confirm('Вы действительно хотите удалить запись?') ? true : false;">Удалить</a></td></tr>
                            <?php
                        }
                        elseif($itemAnswer['TypeAnswer'] == "text")
                        {
                            ?>
                            <tr><td width="80%" height="40"><?php echo $itemAnswer['AnswerName']; ?></td>
                                <td><a href="#" data-toggle="modal" data-target="#myModalTwo" onclick="GetAnswerValue('<?php echo $itemAnswer['IdAnswer']; ?>','<?php echo $itemAnswer['AnswerName']; ?>','<?php echo $itemAnswer['GroupAnswer']; ?>')">Изменить</a></td>
                                <td><a href="<?php echo $_SERVER['PHP_SELF']."?idAnswer=".$itemAnswer['IdAnswer']."&view=LinkEditQuestionAnswer&idInterview=".$idInterview."&isDeleteAnswer=true"?>" onclick="return confirm('Вы действительно хотите удалить запись?') ? true : false;">Удалить</a></td></tr>
                            <?php
                        }
                    }
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
</body>
</html>