<?php


/**
 * class view
 * 
 * use to call views
 */

class View {

    private $template;

    public function __construct($template = null) {
        $this->template = $template;
    }

    public function render($params = array()) {

        // foreach($params as $name => $value) {
        //     ${name} = $value;
        // }
        extract($params); //faire une extraction de params

        $template = $this->template;
        
        ob_start();
        include(VIEW.'Scripts/script.php');
        $scripts = ob_get_clean();
        
        ob_start();
        include(VIEW.$template.'.php');
        $contentPage = ob_get_clean();

        // print_r(1);exit;
        if(isset($_SESSION['id']) && !empty($_SESSION['id']) && ($_SESSION['poste'] != 'User')){
            include_once(VIEW.'_template.php');
        }else{
            $error404 = new Error404();
            $error404->render();
        }

    }

    public function redirect($route) {
        // print_r($route);exit;
        header("Location: ".HOST.$route);
        exit;
    }

}