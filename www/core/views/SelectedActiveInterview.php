<?php

require_once __DIR__.'/../controls/GetAnswersByIdQuestion.php';

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Система электронного анкетирования</title>
    <script type="text/javascript" src="./style/bootstrap/js/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="./style/bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="./style/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="./style/style.css" />
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
    <form role="form" method="post" action="./core/controls/GetResultsUsers.php">
        <div class="form-interview">
            <p class="form-interview-heading"><?php echo $_GET['interviewName']; ?></p>
            <?php
            foreach($arrayQuestions as $itemQuestion)
            {
                ?>
                <p class="form-interview-heading-question"><?php echo $itemQuestion['QuestionName']; ?></p>
                <?php
                $arrayAnswers =  GetAnswers($itemQuestion['IdQuestion']);
                foreach($arrayAnswers as $itemAnswer)
                {
                    ?>
                    <div class="form-group">
                        <?php
                        if($itemAnswer['TypeAnswer'] != "text")
                        {
                            ?>
                            <label>
                                <input type="<?php echo $itemAnswer['TypeAnswer']; ?>" name="<?php echo $itemAnswer['GroupAnswer']; ?>" value="<?php echo $itemAnswer['IdAnswer']; ?>" />
                            </label>
                            <?php echo $itemAnswer['AnswerName'];
                        }
                        elseif($itemAnswer['TypeAnswer'] == "text")
                        {
                            echo $itemAnswer['AnswerName'];
                            ?>
                            <br>
                            <label>
                                <textarea class="form-control" cols="50" rows="5" maxlength="500" name="userTxt[<?php echo $itemAnswer['IdAnswer']; ?>]"></textarea>
                            </label>
                            <?php
                        }
                        ?>
                    </div>
                    <?php
                }
            }
            ?>
            <input class="btn btn-primary" type="submit" name="btn" value="Сохранить результаты анткетирования" />
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