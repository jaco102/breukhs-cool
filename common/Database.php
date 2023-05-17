<?php

namespace Common;

use PDO;

class Database
{
    public PDO $pdo;

    public function __construct(public $dsn, public $dbUser, public $dbPwd)
    {
    }

    public function pdo()
    {
        if (isset($this->pdo)) {
            return $this->pdo;
        }

        $this->pdo = new PDO($this->dsn, $this->dbUser, $this->dbPwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
        return $this->pdo;
    }
}
