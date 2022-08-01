<?php
class Clubs extends Controller
{
    public function __construct()
    {
        // gọi model Player
        $this->ClubModel = $this->model('Club');
    }

    public function index()
    {
        $page = 1;
        if (isset($_GET['page'])){
            $page = $_GET['page'];
        }     
        $page--;
        $all_clubs   = $this->ClubModel->countClub();

        $number_page = ceil($all_clubs/10);

        //gọi method getuser
        $stadium  = $this->ClubModel->getStadium($page * 10);
        $club  = $this->ClubModel->getClub($page * 10);
        $coach  = $this->ClubModel->getCoach($page * 10);

        for ($i=0; $i < count($club); $i++) {           
            $club[$i]=array_merge($club[$i],$coach[$i],$stadium[$i]);   
        }

        //gọi và show dữ liệu ra view
        $this->view('club/index', [
            'club'=>$club,
            'type'=>'index',
            'start_page' => $this->editPage($page, $number_page)[0],
            'number_page'=>$number_page,
            'end_page'  => $this->editPage($page, $number_page)[1],
            'page' => $page + 1
        ]);
    }

    public function create(){
        $stadium  = $this->ClubModel->getStadiumAll();
        $coach  = $this->ClubModel->getCoachAll();
    

        $this->view('club/add',[
            'coach'=>$coach,
            'stadium'=>$stadium,
        ]);

    }

    public function store()
    {
        if (isset($_POST['name'])) {
            $result = $this->ClubModel->createClub($_POST['name'],$_POST['shortname'], $_POST['stadiumid'],$_POST['coachid']);
           if ($result) {
                header('location:' . URLROOT . '/Clubs/index');
                 
            }
            
        }
        $this->view('club/add');
    
    }

    public function edit($id){

        
        $club  = $this->ClubModel->findClubById($id);

        $stadium  = $this->ClubModel->getStadiumAll();
        $coach  = $this->ClubModel->getCoachAll();
    

        $this->view('club/edit',[
            'coach'=>$coach,
            'stadium'=>$stadium,
            'club'=>$club
        ]);

    }
    public function update($id)
    {
        $club  = $this->ClubModel->findClubById($id);
        if (isset($_POST['submit'])) {
            $result = $this->ClubModel->updateClub($id,$_POST['name'],$_POST['shortname'], $_POST['stadiumid'],$_POST['coachid']);
           if ($result) {
                header('location:' . URLROOT . '/Clubs/index');
           
                
            }
            
        }
        $this->view('club/edit');
    
    }

    
}
