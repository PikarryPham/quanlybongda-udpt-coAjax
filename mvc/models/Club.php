<?php
class Club
{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    // Đếm số lượng
    public function countClub(){
        return $this->db->count('club');
    }

    public function getClub($number_pass)
    {
        $sqlClub = "SELECT * FROM club LIMIT 10 OFFSET $number_pass";
        $resultClub = $this->db->select($sqlClub);
        return $resultClub;
       
    }
    public function getAllClub()
    {
        $sqlClub = "SELECT * FROM club";
        $resultClub = $this->db->select($sqlClub);
        return $resultClub;
       
    }
    public function getCoach($number_pass)
    {
       
        $sqlCoach = "SELECT CFullName FROM coach , club where club.CoachID = coach.CoachID LIMIT 10 OFFSET $number_pass";
        $resultCoach = $this->db->select($sqlCoach);
        return $resultCoach;
    
    }

    public function getCoachAll()
    {
       
        $sqlCoach = "SELECT * FROM coach ";
        $resultCoach = $this->db->select($sqlCoach);
        return $resultCoach;
        

       
    }
    public function getStadium($number_pass)
    {
        
        $sqlStadium = "SELECT SName FROM stadium , club where club.StadiumID = stadium.StadiumID  LIMIT 10 OFFSET $number_pass";
        $resultStadium = $this->db->select($sqlStadium);
        return $resultStadium;
  
    }
    public function getStadiumAll()
    {
        
        $sqlStadium = "SELECT * FROM stadium  ";
        $resultStadium = $this->db->select($sqlStadium);
        return $resultStadium;

       
    }

    public function createClub($name,$shortname,$stadiumid,$coachid)
    {
        $sql = "INSERT INTO club (ClubName,Shortname,StadiumID,CoachID)
                VALUES ('$name','$shortname','$stadiumid','$coachid')";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function findClubById($id)
    {
        $sql = "SELECT * FROM club WHERE ClubID = '$id'";
        $result = $this->db->select($sql);
        return $result;
    }


    public function updateClub($id,$name,$shortname,$stadiumid,$coachid)
    {
        $sql = "UPDATE club SET ClubName = '$name',
                                    	Shortname = '$shortname',
                                        StadiumID = '$stadiumid',
                                        CoachID ='$coachid'
                                        
                                WHERE ClubID = '$id'";
        $result = $this->db->execute($sql);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }


    
    

}
