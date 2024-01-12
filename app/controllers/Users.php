<?php

class Users extends Controller {
    // private $model;
    private $service;
    public function __construct() 
    {
        // $this->model = $this->model("User");
        $this->service = $this->service("UserServiceImp");
    }

    public function login()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $email = $_POST["email"];
            $password = $_POST["password"];
            $loggedInUser = $this->service->login($email, $password);
            // var_dump($this->service->isAuthor($loggedInUser->user_id));
            if ($loggedInUser) {
                $this->createSession($loggedInUser);
                if ($this->service->isAuthor($loggedInUser->user_id)) {
                    redirect('author/dashboard');
                } else {
                    redirect('admin/dashboard');
                }
            } else {
                $this->view("users/login");
            }

        }

        $this->view("users/login");
    }

    public function register()
    {
        if($_SERVER["REQUEST_METHOD"] == "POST" ){
            // var_dump($_POST);
            $newUser = new User();
            $newUser->fullName = $_POST["fullName"];
            $newUser->username = $_POST["username"];
            $pictureUser = $_FILES["pictureUser"]["name"];
            $tempName = $_FILES["pictureUser"]["tmp_name"];
            move_uploaded_file($tempName,   URLROOT . '/public/images/uploads/' . $pictureUser);
            $newUser->pictureUser = $pictureUser;
            $newUser->email = $_POST["email"];
            $newUser->password = $_POST["password"];
            try{
                $this->service->create($newUser);
                flash('register_success','You are registered and can log in');
                redirect('users/login');
               }
               catch(PDOException $e){
                die("Error: Unable to register. Please try again later.");
               }
        }
        $this->view("users/register");
    }

    public function createSession($user)
    {
        $_SESSION["idUser"] = $user->idUser;
        $_SESSION["fullName"] = $user->fullName;
        $_SESSION["email"] = $user->email;
        // header("Location:".URLROOT."client/product");
    }
    
    public function logout()
    {
        unset($_SESSION["idUser"]);
        unset($_SESSION["fullName"]);
        unset($_SESSION["email"]);
        session_destroy();
        redirect('users/login');
    }
    
    public function isloggedIn()
    {
        return isset($_SESSION["idUser"]);
    }
}