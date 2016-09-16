<?php

require_once __DIR__.'/../models/ModelCpanel.php';

class ManageCPanel
{
    private $model;

    public function __construct()
    {
        $this->model = new ModelCPanel();
    }

    public function AddNewOrganisation($organisationName)
    {
        if(isset($organisationName) && !empty($organisationName))
        {
            return $this->model->AddOrganisation(trim($organisationName));
        }
        else
        {
            return false;
        }
    }

    public function AddNewInterview($interviewName, $dateTo, $dateFrom, $idOrganisation)
    {
        if((isset($interviewName) && !empty($interviewName)) && (isset($dateTo) && !empty($dateTo)) && (isset($dateFrom) && !empty($dateFrom)) && (isset($idOrganisation) && !empty($idOrganisation)))
        {
            $To = date("Y-m-d", strtotime($dateTo));
            $From = date("Y-m-d", strtotime($dateFrom));

            return $this->model->AddInterview(trim($interviewName), trim($To), trim($From), trim($idOrganisation));
        }
        else
        {
            return false;
        }
    }

    public function AddNewQuestion($questionName, $orderView, $idInterview)
    {
        if((isset($questionName) && !empty($questionName)) && (isset($orderView) && !empty($orderView)) && (isset($idInterview) && !empty($idInterview)))
        {
            return $this->model->AddQuestion(trim($questionName), trim($orderView), trim($idInterview));
        }
    }

    public function AddNewAnswer($answerName, $groupAnswer, $typeAnswer, $isRequired, $orderView, $idQuestion)
    {
        if((isset($answerName) && !empty($answerName)) && (isset($groupAnswer) && !empty($groupAnswer)) && (isset($typeAnswer) && !empty($typeAnswer)) && (isset($idQuestion) && !empty($idQuestion)))
        {
            return $this->model->AddAnswer(trim($answerName), trim($groupAnswer), trim($typeAnswer), trim($isRequired), trim($orderView), trim($idQuestion));
        }
    }

    public function UpLoadFile($tmpName, $idInterview)
    {
        if((isset($tmpName) && !empty($tmpName)) && (isset($idInterview) && !empty($idInterview)))
        {
            $arrayString = simplexml_load_file($tmpName);

            $id = 0;

            foreach ($arrayString as $key => $value)
            {
                switch($key)
                {
                    case 'question':

                        $id = $this->model->AddQuestion(trim($value->title), trim($value->order), trim($idInterview));

                        break;
                    case 'answer':

                        $this->model->AddAnswer(trim($value->title), trim($value->group), trim($value->type), trim($value->required), trim($value->order), $id);

                        break;
                }
            }

            return true;
        }
        else
        {
            return false;
        }
    }

    public function UpdateOrganisation($idOrganisation, $organisationName)
    {
        if((isset($idOrganisation) && !empty($idOrganisation)) && (isset($organisationName) && !empty($organisationName)))
        {
            return $this->model->UpdateTableOrganisation($idOrganisation, $organisationName);
        }
        else
        {
            return false;
        }
    }

    public function UpdateInterview($idInterview, $interviewName, $dateTo, $dateFrom, $isActive)
    {
        if((isset($idInterview) && !empty($idInterview)) && (isset($interviewName) && !empty($interviewName)) && (isset($dateTo) && !empty($dateTo)) && (isset($dateFrom) && !empty($dateFrom)))
        {
            $To = date("Y-m-d", strtotime($dateTo));
            $From = date("Y-m-d", strtotime($dateFrom));

            return $this->model->UpdateTableInterview($idInterview, $interviewName, $To, $From, $isActive);
        }
        else
        {
            return false;
        }
    }

    public function UpdateQuestion($idQuestion, $questionName, $orderView)
    {
        if((isset($idQuestion) && !empty($idQuestion)) && (isset($questionName) && !empty($questionName)) && (isset($orderView) && !empty($orderView)))
        {
            return $this->model->UpdateTableQuestion($idQuestion, $questionName, $orderView);
        }
        else
        {
            return false;
        }
    }

    public function UpdateAnswer($idAnswer, $answerName, $groupAnswer, $typeAnswer, $isRequired, $orderView)
    {
        if((isset($idAnswer) && !empty($idAnswer)) && (isset($answerName) && !empty($answerName)) && (isset($groupAnswer) && !empty($groupAnswer)) && (isset($typeAnswer) && !empty($typeAnswer)))
        {
            return $this->model->UpdateTableAnswer($idAnswer, $answerName, $groupAnswer, $typeAnswer, $isRequired, $orderView);
        }
        else
        {
            return false;
        }
    }


    public function DeleteOrganisation($idOrganisation)
    {
        if(isset($idOrganisation) && !empty($idOrganisation))
        {
            return $this->model->DeleteFromTableOrganisation($idOrganisation);
        }
        else
        {
            return false;
        }
    }

    public function DeleteInterview($idInterview)
    {
        if(isset($idInterview) && !empty($idInterview))
        {
            return $this->model->DeleteFromTableInterview($idInterview);
        }
        else
        {
            return false;
        }
    }

    public function DeleteQuestion($idQuestion)
    {
        if(isset($idQuestion) && !empty($idQuestion))
        {
            return $this->model->DeleteFromTableQuestion($idQuestion);
        }
        else
        {
            return false;
        }
    }

    public function DeleteAnswer($idAnswer)
    {
        if(isset($idAnswer) && !empty($idAnswer))
        {
            return $this->model->DeleteFromTableAnswer($idAnswer);
        }
        else
        {
            return false;
        }
    }
}

?>