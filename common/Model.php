<?php

namespace Common;

class Model
{
    public Database $db;
    public string|null $tableName;

    public function __construct(string $tableName = null)
    {
        $this->db = new Database('mysql:dbname=BSC;dbhost=localhost', 'root', 'charo2002');
        $this->tableName = $tableName;
    }

    public function find()
    {
        $sql = "SELECT * FROM " . $this->tableName;
        $query = $this->db->pdo()->query($sql);
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function findById(string $id)
    {
        $sql = "SELECT * FROM " . $this->tableName . " WHERE id = :id";
        $query = $this->db->pdo()->prepare($sql);
        $query->execute(["id" => (int)$id]);
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }

    public function removeById(string $id)
    {
        $sql = "DELETE FROM " . $this->tableName . " WHERE id = :id";
        $query = $this->db->pdo()->prepare($sql);
        $query->execute(["id" => (int)$id]);
        return $query->fetchAll(\PDO::FETCH_CLASS, self::class);
    }
}
