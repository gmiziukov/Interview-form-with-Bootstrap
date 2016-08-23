<?php

require_once __DIR__.'/../../classes/RequestToDb.php';

class ModelCPanel
{
    private $request;

    public function __construct()
    {
        $this->request = new RequestToDb();
    }

    public function GetUsersValue($userName)
    {
        $commandText = "SELECT * FROM Users WHERE UserName = '".$userName."'";

        return $this->request->GetData($commandText);
    }

    public function AddOrganisation($organisationName)
    {
        $commandText = "INSERT INTO Organisations(OrganisationName) VALUES ('".$organisationName."')";

        return $this->request->AnyRequest($commandText);
    }

    public function AddInterview($interviewName, $dateTo, $dateFrom, $idOrganisation)
    {
        $commandTextLastId = "INSERT INTO Interviews(InterviewName, DateCreate, DateTo, DateFrom, IsActive) VALUES ('".$interviewName."', CURRENT_DATE, '".$dateTo."', '".$dateFrom."', 1)";

        $idInterview =  $this->request->GetLastId($commandTextLastId);

        $commandText = "INSERT INTO MiddleOI(IdOrganisationFK, IdInterviewFK) VALUES ('".$idOrganisation."','".$idInterview."')";

        return $this->request->AnyRequest($commandText);
    }

    public function AddQuestion($questionName, $orderView, $idInterview)
    {
        $commandTextLastId = "INSERT INTO Questions(QuestionName, OrderView) VALUES ('".$questionName."', '".$orderView."')";

        $idQuestion =  $this->request->GetLastId($commandTextLastId);

        $commandText = "INSERT INTO MiddleIQ(IdInterviewFK, IdQuestionFK) VALUES ('".$idInterview."','".$idQuestion."')";

        $this->request->AnyRequest($commandText);

        return $idQuestion;
    }

    public function AddAnswer($answerName, $groupAnswer, $typeAnswer, $idQuestion)
    {
        $commandTextLastId = "INSERT INTO Answers(AnswerName, GroupAnswer, TypeAnswer) VALUES ('".$answerName."', '".$groupAnswer."', '".$typeAnswer."')";

        $idAnswer = $this->request->GetLastId($commandTextLastId);

        $commandText = "INSERT INTO MiddleQA(IdQuestionFK, IdAnswerFK) VALUES ('".$idQuestion."', '".$idAnswer."')";

        return $this->request->AnyRequest($commandText);
    }

    public function GetData($table)
    {
        $commandText = "SELECT * FROM ".$table."";

        return $this->request->GetData($commandText);
    }

    public function GetInterview()
    {
        $commandText = "SELECT MiddleOI.IdOrganisationFK, Interviews.IdInterview, Interviews.InterviewName, Interviews.DateTo, Interviews.DateFrom, Interviews.IsActive FROM MiddleOI, Interviews WHERE MiddleOI.IdInterviewFK = Interviews.IdInterview";

        return $this->request->GetData($commandText);
    }

    public function GetQuestions($idInterview)
    {
        $commandText = "SELECT MiddleIQ.IdQuestionFK, Questions.QuestionName, Questions.OrderView FROM MiddleIQ INNER JOIN Questions ON MiddleIQ.IdQuestionFK = Questions.IdQuestion WHERE MiddleIQ.IdInterviewFK = ".$idInterview."";

        return $this->request->GetData($commandText);
    }

    public function GetAnswers($idQuestion)
    {
        $commandText = "SELECT Answers.IdAnswer, Answers.AnswerName, Answers.GroupAnswer, Answers.TypeAnswer FROM MiddleQA INNER JOIN Answers ON MiddleQA.IdAnswerFK = Answers.IdAnswer WHERE MiddleQA.IdQuestionFK = ".$idQuestion."";

        return $this->request->GetData($commandText);
    }

    public function GetSumAnswers($idQuestion)
    {
        $commandText = "SELECT SUM(Hit) AS sumAnswersHit FROM Hit INNER JOIN MiddleQA ON Hit.IdAnswerFK=MiddleQA.IdAnswerFK WHERE MiddleQA.IdQuestionFK = ".$idQuestion."";

        return $this->request->GetData($commandText);
    }

    public function GetCountHit($idAnswer)
    {
        $commandText = "SELECT COUNT(Hit) AS countHit FROM Hit WHERE IdAnswerFK = ".$idAnswer."";

        return $this->request->GetData($commandText);
    }

    public function GetStatisticOrganisation()
    {
        $commandText = "SELECT COUNT(IdOrganisation) AS countOrganisations FROM Organisations";

        return $this->request->GetData($commandText);
    }

    public function GetStatisticInterview()
    {
        $commandText = "SELECT COUNT(IdInterview) AS countInterview FROM Interviews";

        return $this->request->GetData($commandText);
    }

    public function GetStatisticQuestion()
    {
        $commandText = "SELECT COUNT(IdQuestion) AS countQuestion FROM Questions";

        return $this->request->GetData($commandText);
    }

    public function GetStatisticHit()
    {
        $commandText = "SELECT COUNT(IdHit) AS countHit FROM Hit";

        return $this->request->GetData($commandText);
    }

    public function GetStatisticHitTxtField()
    {
        $commandText = "SELECT COUNT(IdHit) AS countHitTxtField FROM HitTxtField";

        return $this->request->GetData($commandText);
    }

    public function GetHitTxtField($idAnswer)
    {
        $commandText = "SELECT Hit FROM HitTxtField WHERE IdAnswerFK = ".$idAnswer."";

        return $this->request->GetData($commandText);
    }

    public function UpdateTableOrganisation($idOrganisation, $organisationName)
    {
        $commandText = "UPDATE Organisations SET OrganisationName='".$organisationName."' WHERE IdOrganisation = ".$idOrganisation."";

        return $this->request->AnyRequest($commandText);
    }

    public function UpdateTableInterview($idInterview, $interviewName, $dateTo, $dateFrom, $isActive)
    {
        $commandText = "UPDATE Interviews SET InterviewName='".$interviewName."', DateTo='".$dateTo."', DateFrom='".$dateFrom."', IsActive=".$isActive." WHERE IdInterview = ".$idInterview."";

        return $this->request->AnyRequest($commandText);
    }

    public function UpdateTableQuestion($idQuestion, $questionName, $orderView)
    {
        $commandText = "UPDATE Questions SET QuestionName='".$questionName."',OrderView='".$orderView."' WHERE IdQuestion = ".$idQuestion."";

        return $this->request->AnyRequest($commandText);
    }

    public function UpdateTableAnswer($idAnswer, $answerName, $groupAnswer, $typeAnswer)
    {
        $commandText = "UPDATE Answers SET AnswerName='".$answerName."',GroupAnswer='".$groupAnswer."',TypeAnswer='".$typeAnswer."' WHERE IdAnswer = ".$idAnswer."";

        return $this->request->AnyRequest($commandText);
    }

    public function DeleteFromTableOrganisation($idOrganisation)
    {
        $commandText = "DELETE FROM Organisations WHERE IdOrganisation = ".$idOrganisation."";

        return $this->request->AnyRequest($commandText);
    }

    public function DeleteFromTableInterview($idInterview)
    {
        $commandTextOne = "DELETE FROM Interviews WHERE IdInterview = ".$idInterview."";
        $commandTextTwo = "DELETE FROM MiddleOI WHERE IdInterviewFK = ".$idInterview."";

        $this->request->AnyRequest($commandTextOne);
        return $this->request->AnyRequest($commandTextTwo);
    }

    public function DeleteFromTableQuestion($idQuestion)
    {
        $commandTextOne = "DELETE FROM Questions WHERE IdQuestion = ".$idQuestion."";
        $commandTextTwo = "DELETE FROM MiddleIQ WHERE IdQuestionFK = ".$idQuestion."";
        $commandTextThree = "DELETE FROM MiddleQA WHERE IdQuestionFK = ".$idQuestion."";

        $this->request->AnyRequest($commandTextOne);
        $this->request->AnyRequest($commandTextTwo);
        return $this->request->AnyRequest($commandTextThree);
    }

    public function DeleteFromTableAnswer($idAnswer)
    {
        $commandTextOne = "DELETE FROM Answers WHERE IdAnswer = ".$idAnswer."";
        $commandTextTwo = "DELETE FROM MiddleQA WHERE IdAnswerFK = ".$idAnswer."";
        $commandTextThree = "DELETE FROM Hit WHERE IdAnswerFK = ".$idAnswer."";
        $commandTextFour = "DELETE FROM HitTxtField WHERE IdAnswerFK = ".$idAnswer."";

        $this->request->AnyRequest($commandTextOne);
        $this->request->AnyRequest($commandTextTwo);
        $this->request->AnyRequest($commandTextThree);
        return $this->request->AnyRequest($commandTextFour);
    }
}

?>