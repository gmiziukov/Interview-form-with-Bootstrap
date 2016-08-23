<?php

require_once __DIR__ . '/DbConnection.php';

class RequestToDb
{
    private $dbConnection;
    private $result;

    public function __construct()
    {
        $this->dbConnection = new DbConnection();
    }

    public function AnyRequest($commandText)
    {
        $this->result = $this->dbConnection->dbh->prepare($commandText);

        return $this->result->execute();
    }

    public function GetData($commandText)
    {
        $this->result = $this->dbConnection->dbh->prepare($commandText);

        $this->result->execute();

        return $this->result->fetchAll(PDO::FETCH_ASSOC);
    }

    public function GetLastId($commandText)
    {
        $this->result = $this->dbConnection->dbh->prepare($commandText);

        $this->result->execute();

        return $this->dbConnection->dbh->lastInsertId();
    }
}

?>