<?php

require_once __DIR__.'/../models/GenerateInterview.php';

function GetAnswers($idQuestion)
{
    $generateInterview = new GenerateInterview();

    return $generateInterview->GetAnswers($idQuestion);
}

?>