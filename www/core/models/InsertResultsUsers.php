<?php

require_once __DIR__.'/../../classes/RequestToDb.php';

class InsertResultsUsers
{
    private $request;

    public function __construct()
    {
        $this->request = new RequestToDb();
    }

    public function GetGroupsAnswers()
    {
        $sql = new RequestToDb();

        $commandText = "SELECT DISTINCT GroupAnswer, TypeAnswer FROM Answers";

        return $sql->GetData($commandText);
    }

    public function InsertHit($idAnswerFK, $hit)
    {
        $sql = new RequestToDb();

        $commandText = "INSERT INTO Hit(IdAnswerFK, Hit) VALUES ('".$idAnswerFK."', '".$hit."')";

        $sql->AnyRequest($commandText);
    }

    public function InsertHitTxtField($idAnswerFK, $hit)
    {
        $sql = new RequestToDb();

        $commandText = "INSERT INTO HitTxtField(IdAnswerFK, Hit) VALUES ('".$idAnswerFK."', '".$hit."')";

        $sql->AnyRequest($commandText);
    }
}

?>