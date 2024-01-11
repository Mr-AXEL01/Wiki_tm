<?php

class Users extends Controller {
    private $model;
    private $service;
    public function __construct() {
        $this->model = $this->model("User");
        $this->service = $this->service("UserServiceImp");
    }
    public function register() {
        // check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form

            // Sanitize Post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'pictureUser' => $_FILES['pictureUser']["tmp_name"],
                'fullName' =>trim($_POST['fullName']),
                'username' =>trim($_POST['username']),
                'email' =>trim($_POST['email']),
                'password' =>trim($_POST['password']),
                'confirm_password' =>trim($_POST['confirm_password']),
            ];

            if(!empty($data['email']) && !empty($data['fullName']) && !empty($data['username']) && !empty($data['password'])) {

                // hash password
                $data['password'] = password_hash($data['password'], PASSWORD_BCRYPT);
                extract($data, EXTR_SKIP);
                // Register User
                $this->model->__set("pictureUser", $pictureUser);
                $this->model->__set("fullName", $fullName);
                $this->model->__set("username", $username);
                $this->model->__set("email", $email);
                $this->model->__set("password", $password);
                $userService = $this->service->create($this->model);
            }

        } else {
            // load form
            $data = [
                'pictureUser' =>'',
                'fullName' =>'',
                'username' =>'',
                'email' =>'',
                'password' =>'',
                'confirm_password' =>''
            ];

            // load view
            $this->view('users/register', $data);
        }
    }

    public function login() {
        
        // check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form

            // Sanitize Post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'email' =>trim($_POST['email']),
                'password' =>trim($_POST['password'])
            ];


            extract($data, EXTR_SKIP);
            $this->model->__set("email", $email);
            $this->model->__set("password", $password);
            $result =  $this->service->fetchByEmail($this->model);
            print_r($result);



        } else {
            // load form
            $data = [
                'email' =>'',
                'password' =>''
            ];

            // load view
            $this->view('users/login');
            
        }

    }
}