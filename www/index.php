<?php

require_once __DIR__.'/core/models/GenerateInterview.php';

$generateInterview = new GenerateInterview();

if((isset($_GET['view']) && !empty($_GET['view'])) && (isset($_GET['idInterview']) && !empty($_GET['idInterview'])) && (isset($_GET['interviewName']) && !empty($_GET['interviewName'])))
{
    $view = $_GET['view'];

    $arrayQuestions = $generateInterview->GetQuestions($_GET['idInterview']);
}
else
{
    $arrayOrganisations = $generateInterview->GetOrganisations();

    if(count($arrayOrganisations) != 0 && !empty($arrayOrganisations))
    {
        $arrayActiveInterviews = $generateInterview->GetActiveInterview();

        $view = (count($arrayActiveInterviews) != 0 && !empty($arrayActiveInterviews)) ? "LookActiveInterviews" : "NoInterview";
    }
    else
    {
        $view = "NoInterview";
    }
}

require_once __DIR__.'/core/views/'.$view.'.php';

?>