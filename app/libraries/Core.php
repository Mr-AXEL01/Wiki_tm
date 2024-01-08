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
        $this->getUrl();
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