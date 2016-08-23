<?php

require_once __DIR__.'/../models/ModelCpanel.php';

$modelCpanel = new ModelCPanel();

$sum = 0;

if(isset($_GET['idInterview']) && !empty($_GET['idInterview']))
{
    $questions = $modelCpanel->GetQuestions($_GET['idInterview']);

    foreach($questions as $itemQuestion)
    {
        echo "<div class='col-md-12>'/><strong>".$itemQuestion['QuestionName']."</strong></div><br>";

        $answer = $modelCpanel->GetAnswers($itemQuestion['IdQuestionFK']);

        $sumAnswersHit = $modelCpanel->GetSumAnswers($itemQuestion['IdQuestionFK']);

        foreach($answer as $itemAnswer)
        {
            if($itemAnswer['TypeAnswer'] != "text")
            {
                $countHit = $modelCpanel->GetCountHit($itemAnswer['IdAnswer']);

                if($countHit[0]['countHit'] != 0)
                {
                    $procent = round(($countHit[0]['countHit']/$sumAnswersHit[0]['sumAnswersHit'])*100, 1);
                }
                else
                {
                    $procent = 0;
                }

                echo "<div>".$itemAnswer['AnswerName']." (".$procent." %)</div>";
                echo "<div>
                            <div class='progress'>
                                <div class='progress-bar progress-bar-info progress-bar-striped' role='progressbar' aria-valuenow='20' aria-valuemin='0' aria-valuemax='100' style='width: ".$procent."%'></div>
                            </div>
                      </div>";
            }
            elseif($itemAnswer['TypeAnswer'] == "text")
            {
                echo "<u>".$itemAnswer['AnswerName']."</u><br>";

                $arrayHitTxtField = $modelCpanel->GetHitTxtField($itemAnswer['IdAnswer']);

                foreach($arrayHitTxtField as $item)
                {
                    if(!empty($item['Hit']))
                    {
                        echo "<i>".$item['Hit']."</i><br>";
                    }
                }
                echo "<br>";
            }

        }

        $sum = 0;
    }
}

?>