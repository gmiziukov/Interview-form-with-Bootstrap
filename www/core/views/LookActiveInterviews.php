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
    <div class="form-interview">
        <?php
        foreach($arrayOrganisations as $itemOrganisation)
        {
            ?>
            <p class="form-interview-heading"><?php echo $itemOrganisation['OrganisationName']; ?></p>
            <?php
            foreach($arrayActiveInterviews as $itemInterview)
            {
                if($itemOrganisation['IdOrganisation'] == $itemInterview['IdOrganisationFK'])
                {
                    ?>
                    <div class="form-group">
                        <a href="<?php echo $_SERVER['PHP_SELF']."?idInterview="?><?php echo $itemInterview['IdInterview']; ?>&interviewName=<?php echo $itemInterview['InterviewName']; ?>&view=SelectedActiveInterview">
                            <?php echo $itemInterview['InterviewName']; ?>
                        </a>
                    </div>
                    <?php
                }
            }
        }
        ?>
    </div>
</div>
<div id="footer">
    <div class="container">
        <p class="text-muted">© 2016 ФГБОУ ВО "Ростовский государственный университет путей сообщения". Центр мониторинга качества образования.</p>
    </div>
</div>
</body>
</html>