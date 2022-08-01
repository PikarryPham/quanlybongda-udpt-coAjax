<?php
class Players extends Controller
{
    public function __construct()
    {
        // gọi model Player
        $this->PlayerModel = $this->model('Player');
        $this->ClubModel = $this->model('Club');
    }

    public function index()
    {
        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $page--;
        $all_player   = $this->PlayerModel->countPlayers('player');
        $number_page = ceil($all_player / 10);
        //gọi method getuser
        $player  = $this->PlayerModel->getPlayer($page * 10);
        $club  = $this->PlayerModel->getClub($page * 10);

        $getAllNationality  = $this->PlayerModel->getAllNationality();
        $getAllPositions    = $this->PlayerModel->getAllPositions();
        $getAllClub  = $this->ClubModel->getAllClub();

        if (is_countable($player) && count($player) > 0) {
            for ($i = 0; $i < count($club); $i++) {

                $player[$i] = array_merge($player[$i], $club[$i]);
            }

            //gọi và show dữ liệu ra view
            $this->view('player/index', [
                'player' => $player,
                'nationality' => $getAllNationality,
                'positions' => $getAllPositions,
                'club' => $getAllClub,
                'type' => 'index',
                'start_page' => $this->editPage($page, $number_page)[0],
                'number_page' => $number_page,
                'end_page'  => $this->editPage($page, $number_page)[1],
                'page' => $page + 1
            ]);
        } else {
            $this->view('player/index', [
                'nationality' => $getAllNationality,
                'positions' => $getAllPositions,
                'club' => $getAllClub
            ]);
        }
    }
    public function create()
    {
        $club  = $this->ClubModel->getAllClub();
        $this->view('player/add', [
            'club' => $club
        ]);
    }

    public function store()
    {
        if (isset($_POST['hovaten'])) {

            $result = $this->PlayerModel->createPlayer($_POST['hovaten'], $_POST['DOB'], $_POST['club'], $_POST['position'], $_POST['national'], $_POST['number']);
            if ($result) {
                header('location:' . URLROOT . '/Players/index');
                $this->index();
                // var_dump($_POST['club']);
            }
        }
        $this->view('player/add');
    }

    public function edit($id)
    {

        $player  = $this->PlayerModel->findPlayerById($id);
        $club  = $this->ClubModel->getAllClub();

        $this->view('player/edit', [

            'player' => $player,
            'club' =>  $club
        ]);
    }

    public function update($id)
    {

        if (isset($_POST['submit'])) {
            $result = $this->PlayerModel->updatePlayer($id, $_POST['name'], $_POST['DOB'], $_POST['club'], $_POST['position'], $_POST['national'], $_POST['number']);
            if ($result) {
                header('location:' . URLROOT . '/Players/index');
            }
        }


        $this->view('player/edit');
    }

    public function delete($id)
    {
        $delete = $this->PlayerModel->deletePlayer($id);
    }


    // find player by club
    public function groupPlayer($id)
    {

        $page = 1;
        if (isset($_GET['page'])) {
            $page = $_GET['page'];
        }
        $page--;
        $all_clubs   = $this->PlayerModel->countPlayerByClubID($id);

        $number_page = ceil($all_clubs / 10);

        $player  = $this->PlayerModel->getPlayerByClubID($id, $page * 10);
        $club  = $this->ClubModel->findClubById($id);

        $getAllNationality  = $this->PlayerModel->getAllNationality();
        $getAllPositions    = $this->PlayerModel->getAllPositions();
        $getAllClub  = $this->ClubModel->getAllClub();

        if (is_countable($player) && count($player) > 0) {
            for ($i = 0; $i < count($player); $i++) {
                $player[$i] = array_merge($player[$i], $club[0]);
            }
            //gọi và show dữ liệu ra view
            $this->view('player/index', [
                'player' => $player,
                'nationality' => $getAllNationality,
                'positions' => $getAllPositions,
                'club' => $getAllClub,
                'type' => 'index',
                'start_page' => $this->editPage($page, $number_page)[0],
                'number_page' => $number_page,
                'end_page'  => $this->editPage($page, $number_page)[1],
                'page' => $page + 1,
                'group_id' => $id,
            ]);
        } else {
            $club  = $this->ClubModel->getClub(0);
            $this->view('player/index', [
                'nationality' => $getAllNationality,
                'positions' => $getAllPositions,
                'club' => $getAllClub,
                'group_id' => $id,
            ]);
        }
    }

    public function filterPlayer()
    {
        $club_id        = $_POST['club'];
        $name_player    = $_POST['name'];
        $national_name  = $_POST['national'];
        $position_name  = $_POST['position'];
        if ($club_id != 0) {
            $player  = $this->PlayerModel->getPlayerByClubIDAndName($club_id, $name_player, $national_name, $position_name);
            $club  = $this->ClubModel->findClubById($club_id);
            if (is_countable($player) && count($player) > 0) {
                for ($i = 0; $i < count($player); $i++) {
                    $player[$i] = array_merge($player[$i], $club[0]);
                }
                echo json_encode($player);
            } else {
                echo json_encode([]);
            }
        } else {
            $player  = $this->PlayerModel->getPlayerBys($name_player, $national_name, $position_name);
            if (is_countable($player) && count($player) > 0) {
                for ($i = 0; $i < count($player); $i++) {
                    $club  = $this->ClubModel->findClubById($player[$i]['ClubID']);
                    $player[$i] = array_merge($player[$i], $club[0]);
                }
                echo json_encode($player);
                //gọi và show dữ liệu ra view
            } else {
                echo json_encode([]);
            }
        }
    }

    public function multydelete($id)
    {
        $arrayId = explode(',', $id);
        $a = $this;
        $all = false;
        if (isset($arrayId)) {
            foreach ($arrayId as $id) {

                if ($id == 0) {
                    $all = true;
                    break;
                }
            }
            if ($all == true) {
                $delete = $this->PlayerModel->deleteAllPlayer();
            } else {
                foreach ($arrayId as $id) {
                    $this->delete($id);
                }
            }
        }
    }
}