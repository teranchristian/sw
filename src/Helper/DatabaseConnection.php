<?php
namespace Helper;

class DatabaseConnection
{
    function __construct()
    {
        $this->getConnection();
    }

    public function getConnection()
    {
        try {
            $this->db = new \PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASSWORD);
            $this->db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e)
        {
            throw new \Exception($e->getMessage());
        }
    }

    public function execute($query = null)
    {
        try {
            $statement = $this->db->query($query);
            $rows = $statement->fetchAll();
        }
        catch(PDOException $e)
        {
            throw new \Exception($e->getMessage());
        }
        return $rows;
    }
}
