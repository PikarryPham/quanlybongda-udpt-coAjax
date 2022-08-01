<?php
class Users extends Controller
{
    public function __construct()
    {
        // gọi model Player
        $this->UserModel = $this->model('User');
    }

    
    public function index()
    {
        $message='';
        
       
        $this->view('login',[
            'message'=> $message
        ]);
    }

    public function login(){
        $users=$this->UserModel->getUser();
       
        $a=false;
       
            foreach($users as $user){

                if($_POST['username']==$user['name'] && $_POST['password']==$user['password'])
                {
                    $a=true;
                    break;   
                }
                
                
            }
            if( $a ==true){
                $this->view('index');

            }
            else{
                $message = "Invalid Username or Password!";
                $this->view('login',[
                    'message'=> $message
                ]);

            }

    }

    
}
