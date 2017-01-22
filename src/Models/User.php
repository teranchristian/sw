<?php
namespace Models;

class User
{

    public function getUsers($orderBy = null)
    {
        try {
            $db = new \PDO('mysql:host=localhost;dbname=db', 'devct', 'qwerty');
            $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $query = "select * from `user` ";
            if (isset($orderBy)) {
                $query .= "order by $orderBy";
            }
            $statement = $db->query($query);
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
