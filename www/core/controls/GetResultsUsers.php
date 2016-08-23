<?php

require_once __DIR__.'/../models/InsertResultsUsers.php';

$insertResultsUsers = new InsertResultsUsers();

$arrayGroupsAnswers = $insertResultsUsers->GetGroupsAnswers();

foreach($arrayGroupsAnswers as $itemGroupAnswer)
{
    if(!empty($_POST[$itemGroupAnswer['GroupAnswer']]) && isset($_POST[$itemGroupAnswer['GroupAnswer']]) && $itemGroupAnswer['TypeAnswer'] != "text")
    {
        $insertResultsUsers->InsertHit($_POST[$itemGroupAnswer['GroupAnswer']], 1);
    }
    elseif($itemGroupAnswer['TypeAnswer'] == "text" && !empty($_POST['userTxt']))
    {
        foreach($_POST['userTxt'] as $key => $value)
        {
            if(!empty($value))
            {
                $insertResultsUsers->InsertHitTxtField($key, $value);
            }
        }
    }
}

$view = "EndInterview";

require_once __DIR__.'/../views/'.$view.'.php';

?>