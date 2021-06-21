<?php

abstract class Manager
{
    public CONST DB_HOST = 'localhost';
    public CONST DB_NAME = 'garage';
    public CONST DB_USER = 'root';
    public CONST DB_PASS = '';

    private PDO $pdo;
    protected string $table;

    public function __construct()
    {
        $this->pdo = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME, self::DB_USER, self::DB_PASS);
    }

    protected function getPDO()
    {
        return $this->pdo;
    }

    protected function setTable($table)
    {
        $this->table = $table;
    }

    public function getAll()
    {
        $query = $this->getPDO()->query('SELECT * FROM '. $this->table);
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get($id)
    {
        $query = $this->getPDO()->prepare('SELECT * FROM '. $this->table .' WHERE id = :id');
        $query->execute([
            'id' => $id
        ]);
        return $query->fetch(PDO::FETCH_ASSOC);
    }


}