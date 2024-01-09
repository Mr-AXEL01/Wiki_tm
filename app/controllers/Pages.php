<?php
class Pages extends Controller {
    public function __construct() {
        
    }
    public function index() {
        $data = [
            'title' => 'Wiki_Tm',
            'description' => 'Simple social network built on the mvc php design pattern'
        ];

        $this->view('pages/index' , $data);
    }
    public function about() {
        $data = [
            'title' => 'About Us'
        ];
        $this->view('pages/about', $data);
    }
}