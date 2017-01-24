<?php
namespace Models;

class User
{
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers($orderBy = null, $sortBy = 'ASC')
    {
        $query = "select * from `user` ";
        if (isset($orderBy)) {
            $query .= "order by $orderBy $sortBy ";
        }
        $rows = $this->db->execute($query);

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
}
