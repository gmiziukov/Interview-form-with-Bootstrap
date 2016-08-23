<?php

class DbConnection
{
    private $server = 'localhost';
    private $userName = 'root';
    private $userPasswords = '';
    private $dataBaseName = 'interview.db';

    public $dbh;

    public function __construct()
    {
        try
        {
            $this->dbh = new PDO('mysql:dbname='.$this->dataBaseName.';host='.$this->server.'',$this->userName,$this->userPasswords);
        }
        catch(PDOException $ex)
        {
            echo "Ошибка подключения: " . $ex->getMessage();
        }
    }
}

?>