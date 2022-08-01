<?php
class User
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function getUser()
    {
        $sql = "SELECT * FROM user_";
        $result = $this->db->select($sql);
        return $result;
    }
}
