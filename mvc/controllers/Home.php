<?php
class Home extends Controller
{
    public function __construct()
    {
        // gọi model Player
        $this->UserModel = $this->model('User');
    }

    public function index()
    {
        
       
        $data = [
            'title' => 'Home page'
        ];
        $this->view('index');
    }
    

    

    
}
