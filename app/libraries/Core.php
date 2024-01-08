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

        // check for second part of Url
        if (isset($url[1])) {
            // check to see if method exists in controller
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
                // unset 1 index
                unset($url[1]);
            }
        }

        // Get params 
        $this ->params = $url ? array_values($url) : [];

        // call a callback with arrray of params
        call_user_func_array([$this->currentController,
        $this->currentMethod],$this->params);
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