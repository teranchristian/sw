<?php
namespace Models;

class User
{
    private $db;

    function __construct($db)
    {
        $this->db = $db;
    }

    public function getUsers($orderBy = null, $sortBy = 'DESC')
    {
        $query = "select * from `user` ";
        if (!empty($orderBy)) {
            $query .= "order by $orderBy $sortBy ";
        }
        $rows = $this->db->all($query);

        $users = [];
        foreach ($rows as $row) {
            $users[] = [
                'id' => $row['user_id'],
                'firstName' => $row['first_name'],
                'lastName' => $row['last_name'],
                'email' => $row['email'],
                'role' => $row['role'],
                'department' => $row['department'],
            ];
        }
        return $users;
    }

    public function getUser($id = null)
    {
        $query = "select * from `user` WHERE user_id=:id";
        $param = array(':id' => $id);
        

        $row = $this->db->one($query, $param);
        $user = [];
        if (!empty($row)) {
            $user = [
                'id' => $row['user_id'],
                'firstName' => $row['first_name'],
                'lastName' => $row['last_name'],
                'email' => $row['email'],
                'role' => $row['role'],
                'department' => $row['department'],
                'dob' => $row['dob'],
                'streetAddress1' => $row['street_address_1'],
                'streetAddress2' => $row['street_address_2'],
                'suburb' => $row['suburb'],
                'state' => $row['state'],
                'postcode' => $row['postcode'],
                'country' => $row['country'],
            ];
        }
        return $user;
    }
}
