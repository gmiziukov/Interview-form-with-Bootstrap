<?php

require_once __DIR__.'/../../classes/RequestToDb.php';

class GenerateInterview
{
    private $request;

    public function __construct()
    {
        $this->request = new RequestToDb();
    }

    public function GetOrganisations()
    {
        $commandText = "SELECT * FROM Organisations";

        return $this->request->GetData($commandText);
    }

    public function GetActiveInterview()
    {
        $commandText = "SELECT MiddleOI.IdOrganisationFK, Interviews.IdInterview, Interviews.InterviewName FROM MiddleOI, Interviews WHERE MiddleOI.IdInterviewFK = Interviews.IdInterview AND Interviews.IsActive = 1";

        return $this->request->GetData($commandText);
    }

    public function GetQuestions($idInterview)
    {
        $commandText = "SELECT Questions.IdQuestion, Questions.QuestionName FROM MiddleIQ INNER JOIN Questions ON MiddleIQ.IdQuestionFK = Questions.IdQuestion WHERE MiddleIQ.IdInterviewFK = ".$idInterview."";

        return $this->request->GetData($commandText);
    }

    public function GetAnswers($idQuestion)
    {
        $commandText = "SELECT Answers.IdAnswer, Answers.AnswerName, Answers.GroupAnswer, Answers.TypeAnswer, Answers.IsRequired FROM MiddleQA INNER JOIN Answers ON MiddleQA.IdAnswerFK = Answers.IdAnswer WHERE MiddleQA.IdQuestionFK = ".$idQuestion."";

        return $this->request->GetData($commandText);
    }
}

?>