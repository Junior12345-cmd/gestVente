<?php


/**
 * class view
 * 
 * use to call views
 */

class Views {

    private $page;

    public function __construct($page = null) {
        $this->page = $page;
    }

    public function render($params = array()) {

        // foreach($params as $name => $value) {
        //     ${name} = $value;
        // }
        extract($params); //faire une extraction de params

        $page = $this->page;
        
        ob_start();
        include(VIEW.'Scripts/script.php');
        $scripts = ob_get_clean();
        
        ob_start();
        include(VIEW.$page.'.php');
        $contentPage = ob_get_clean();

        include_once(VIEW.'Public/template2.php');

    }

    public function redirect($route) {
        header("Location: ".HOST.$route);
        exit;
    }

}