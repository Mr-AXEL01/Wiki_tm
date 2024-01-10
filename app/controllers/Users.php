<?php

class Users extends Controller {
    public function __construct() {

    }
    public function register() {
        // check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form

            // Sanitize Post data
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

            // Init data
            $data = [
                'pictureUser' => $_FILES['pictureUser'],
                'fullName' =>trim($_POST['fullName']),
                'username' =>trim($_POST['username']),
                'email' =>trim($_POST['email']),
                'password' =>trim($_POST['password'])
            ];

        } else {
            // load form
            $data = [
                'pictureUser' =>'',
                'fullName' =>'',
                'username' =>'',
                'email' =>'',
                'password' =>''
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

        } else {
            // load form
            $data = [
                'email' =>'',
                'password' =>''
            ];

            // load view
            $this->view('users/login', $data);
        }
    }
}