<?php
class Database
{
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $name = 'footballdb';
    private $conn;

    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->name);
        mysqli_set_charset($this->conn,'utf8');
    }

    // Lấy số lượng
    public function count($table){
        $sql = "SELECT count(*) as 'number_count' FROM $table";
        $result = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($result);
        return $result['number_count'];
    }

    public function count2($sql){
        $result = mysqli_query($this->conn, $sql);
        $result = mysqli_fetch_array($result);
        return $result['number_count'];
    }

    //lấy dữ liệu
    public function select($sql)
    {
        $data = null;
        $result = $this->conn->query($sql);
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        }
    }

    // thêm sửa xóa
    public function execute($sql)
    {
        $result = $this->conn->query($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
}
