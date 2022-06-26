<?php
require_once '../Model/User.php';

$init = new Users;

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    switch($_POST['type']){
        case 'register':
            $init->register(); // creation of a new account
            break;
        case 'login':
            $init->login(); 
            break;
        case 'logout':
            $init->logout();
            break;
        default:
            header("../index.php");
            exit();
    }
}

class Users{

    private $userModel;

    public function __construct(){
        $this->userModel = new User;
    }
    
    public function register(){
                
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //initialization of the data
        $data = [
        'usersFname' => trim($_POST['usersFname']),
        'usersLname' => trim($_POST['usersLname']),
        'usersPwd'   => trim($_POST['usersPwd']),
        'usersPwd2'  => trim($_POST['usersPwd2']),
        'usersBirth' => trim($_POST['usersYear']) ."-". trim($_POST['usersMonth']) ."-". trim($_POST['usersDay']),
        'usersGender'=> trim($_POST['usersGender']),
        'usersEmailOrPhone' => trim($_POST['usersEmailOrPhone'])
        ];

        

        // test
        if( empty($data['usersFname']) || empty($data['usersLname']) || empty($data['usersEmailOrPhone']) || 
            empty($data['usersPwd'])   || empty($data['usersPwd2'])  || empty($data['usersBirth']) || 
            empty($data['usersGender'])){
                header("location:  ../index.php");
                exit();
            }

        if(!preg_match("/^[a-zA-Z]*$/", $data['usersFname'])){
            header("location:  ../index.php");
            exit();
        }

        if(!preg_match("/^[a-zA-Z]*$/", $data['usersLname'])){
            header("location:  ../index.php");
            exit();
        }
        
        if($data['usersPwd'] !== $data['usersPwd2']){
            header("location:  ../index.php");
            exit();
        }
    
        if(!preg_match('/^[0-9]{10}+$/', $data['usersEmailOrPhone']) && empty(filter_var($data['usersEmailOrPhone'], FILTER_VALIDATE_EMAIL)) )
        {
            header("location:  ../index.php");
            exit();
        }
    
        if(date_diff(date_create($data['usersBirth']), date_create(date("Y-m-d"))) > 18)
        {
            header("location:  ../index.php");
            exit();
        }

        if($this->userModel->findUserByEmailOrPhone($data['usersEmailOrPhone'])){
            header("location:  ../index.php");
            exit();
        }


        
        //creation of hash key for a password
        $data['usersPwd'] = password_hash($data['usersPwd'], PASSWORD_DEFAULT);

        echo var_dump($data);
       
        $huhu =  $data->usersEmailOrPhone;
        echo var_dump($huhu);

        //Register User
        if($this->userModel->register($data)){
            $this->createUserSession($data);
        }else{
            die();
        }
    }

    public function login(){
        
        //Sanitize POST data
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

        //initialization data
        $data=[
            'usersEmailOrPhone' => trim($_POST['usersEmailOrPhone']),
            'usersPwd' => trim($_POST['usersPwd'])
        ];

        if(empty($data['usersEmailOrPhone']) || empty($data['usersPwd'])){
            header("location:  ../index.php");
            exit();
        }

        if($this->userModel->findUserByEmailOrPhone($data['usersEmailOrPhone'])){
           $loggedInUser =  $this->userModel->login($data['usersEmailOrPhone'], $data['usersPwd']);
           
           if($loggedInUser){
            //Create session
            $this->createUserSession($loggedInUser);
            }else{
                header("location:  ../index.php");
                exit();
            }

        }else{
            header("location:  ../index.php");
            exit();
        }
    }


    public function createUserSession($user){
        session_start();
        $_SESSION['usersFname'] = $user->usersfname;
        $_SESSION['usersEmail'] = $user->usersemailorphone;

        header("location:  ../login.php");
        exit();
    }

    public function logout(){
        unset($_SESSION['usersFname']);
        unset($_SESSION['usersEmail']);
        session_destroy();
        header("location:  ../index.php");
        exit();
    }
}
?>