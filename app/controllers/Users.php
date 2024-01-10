<?php

class Users extends Controller {
    public function __construct() {

    }
    public function register() {
        // check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form
        } else {
            // load form
            $data = [
                'pictureUser' =>'',
                'fullName' =>'',
                'username' =>'',
                'email' =>'',
                'password' =>'',
                'confirm_password' =>'',
                'pictureUser_err' =>'',
                'fullName_err' =>'',
                'username_err' =>'',
                'email_err' =>'',
                'password_err' =>'',
                'confirm_password_err' =>''
            ];

            // load view
            $this->view('users/register', $data);
        }
    }

    public function login() {
        // check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // process form
        } else {
            // load form
            $data = [
                'email' =>'',
                'password' =>'',
                'email_err' =>'',
                'password_err' =>''
            ];

            // load view
            $this->view('users/login', $data);
        }
    }
}