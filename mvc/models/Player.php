<?php
class Player
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    // Đếm số lượng
    public function countPlayers($table){
        return $this->db->count('player');
    }
    public function countPlayerByClubID($id)
    {
        $sql = "SELECT COUNT(*) as number_count FROM player  Where  player.ClubID =  '$id'";
        $result = $this->db->count2($sql);
        return $result;
    }

    public function getAllNationality(){
        $sql = "SELECT Nationality FROM `player` GROUP BY Nationality";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getAllPositions(){
        $sql = "SELECT Position FROM `player` GROUP BY Position";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getPlayer($number_pass)
    {
        $sql = "SELECT * FROM player LIMIT 10 OFFSET $number_pass";
        $result = $this->db->select($sql);
        return $result;
    }

    public function getAllPlayer()
    {
        $sql = "SELECT * FROM player";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getPlayerByClubID($id,$number_pass)
    {
        $sql = "SELECT * FROM player  Where  player.ClubID =  '$id' LIMIT 10 OFFSET $number_pass";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getPlayerByClubIDAndName($id,$name,$national,$position){
        $sql = "SELECT * FROM player  Where  (player.FullName like '%$name%' or player.Nationality like '%$name%' or player.Position like '%$name%') and player.ClubID =  '$id' and player.Nationality like '%$national%' and player.Position like '%$position%'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getPlayerBys($name,$national,$position){
        $sql = "SELECT * FROM player  Where (player.FullName like '%$name%' or player.Nationality like '%$name%' or player.Position like '%$name%') and player.Nationality like '%$national%' and player.Position like '%$position%'";
        $result = $this->db->select($sql);
        return $result;
    }
    public function getClub($number_pass){
        $sqlClub="SELECT club.ClubName FROM player , club Where club.ClubID = player.ClubID LIMIT 10 OFFSET $number_pass";
        $result = $this->db->select($sqlClub);
        return $result;

    }

    public function createPlayer($name,$DOB,$club,$position,$national,$number)
    {
        $sql = "INSERT INTO player (FullName,DOB,ClubID,Position,Nationality,Number)
                VALUES ('$name','$DOB','$club','$position','$national','$number')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function findPlayerById($id)
    {
        $sql = "SELECT * FROM player WHERE PlayerID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }


    public function updatePlayer($id, $name,$DOB,$club,$position,$national,$number)
    {
        $sql = "UPDATE player SET player.FullName = '$name',
                                    	 player.DOB='$DOB',
                                         player.ClubID='$club',
                                         player.Position = '$position',
                                         player.Nationality ='$national',
                                         player.Number='$number'
                                WHERE PlayerID = '$id' ";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    

    public function deletePlayer($id)
    {
        $sql = "DELETE FROM player WHERE PlayerID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function deleteAllPlayer()
    {
        $sql = "DELETE FROM player ";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    
    

   

}
