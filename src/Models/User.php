<?php
namespace Models;

class User
{

    public function getUsers()
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=db', 'devct', 'qwerty');
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION); 
            $statement = $db->query("select * from `user`");
            $rows = $statement->fetchAll(); // Use fetchAll() if you want all results, or just iterate over the statement, since it implements Iterator
            $users = [];
            foreach ($rows as $row) {
                $users[] = [
                    'firstName' => $row['first_name'],
                    'lastName' => $row['last_name'],
                    'email' => $row['email'],
                    'role' => $row['role'],
                    'department' => $row['department'],
                ];
            }
            return $users;
        }
        catch(PDOException $e)
        {
            echo "Error: " . $e->getMessage();
        }
    }
}
