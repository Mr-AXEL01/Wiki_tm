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
                'fullName' =>'',
                'username' =>'',
                'pictureUser' =>'',
                'email' =>'',
                'password' =>'',
                'confirm_password' =>'',
                'fullName_err' =>'',
                'username_err' =>'',
                'pictureUser_err' =>'',
                'email_err' =>'',
                'password_err' =>'',
                'confirm_password_err' =>''
            ];

            // load view
            $this->view('users/register', $data);
        }
    }
}