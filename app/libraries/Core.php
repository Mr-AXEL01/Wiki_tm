<?php
/*
* App Core Class
* => Create URL & Load core controller
* => URL Format - /controller/method.params
*/
class Core {
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        // Look in controllers for first value
        if(isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]). '.php')) {
           // if exists , set as controller
           $this->currentController = ucwords($url[0]);
           // unset o Index
           unset($url[0]);
        }

        // require the controller
        require_once '../app/controllers/'. $this->currentController .'.php';

        // instanciate controller class
        $this->currentController = new $this->currentController;
    }

    public function getUrl() {
       // check if there is a url add 
       if (isset($_GET['url'])) {
        // remove any end-slashes if it's exists
        $url = rtrim($_GET['url'], '/');
        // remove any caracter a url should not have
        $url = filter_var($url, FILTER_SANITIZE_URL);
        // break the url into array of parts
        $url = explode('/',$url);
        return $url;
       }
    }
}