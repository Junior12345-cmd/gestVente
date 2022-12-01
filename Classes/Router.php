<?php

/**
 * class Router
 * 
 * create routes and find controllers
 */
class Router {

    private $request;

    private $routes = [
        "home.html" => ["controller" => "HomeController", "method" => "showHome"],
        "accueil.html" => ["controller" => "UsersController", "method" => "login"],

        "detail-agence.html" => ["controller" => "AgenceController", "method" => "showDetails"],
        "detail-point.html" => ["controller" => "AgenceController", "method" => "show"],
        "add-agence.html" => ["controller" => "AgenceController", "method" => "store"],
        "add-point.html" => ["controller" => "PointVenteController", "method" => "search"],

        "rechercher_agence.html" => ["controller" => "AgenceController", "method" => "search"],
        "gros-agence.html" => ["controller" => "AgenceController", "method" => "showGros"],
        "add-pointVente.html" => ["controller" => "PointVenteController", "method" => "store"],
        "update-pointVente.html" => ["controller" => "PointVenteController", "method" => "update"],
        "delete-pointVente.html" => ["controller" => "PointVenteController", "method" => "destroy"],

       

        "login.html" => ["controller" => "UsersController", "method" => "login"],
        "register.html" => ["controller" => "UsersController", "method" => "register"],
        "profil.html" => ["controller" => "UsersController", "method" => "profilUsers"],
        "log.html" => ["controller" => "UsersController", "method" => "log"],
        "logout.html" => ["controller" => "UsersController", "method" => "logout"],       
        "registry.html" => ["controller" => "UsersController", "method" => "reg"],
        "edit-users.html" => ["controller" => "UsersController", "method" => "saveUsers"],
        "detail-users.html" => ["controller" => "UsersController", "method" => "detailUsers"],
        "users.html" => ["controller" => "UsersController", "method" => "showUsers"],
        "add-users.html" => ["controller" => "UsersController", "method" => "saveUsers"],
        "up-users.html" => ["controller" => "UsersController", "method" => "saveSelf"],
        "del-users.html" => ["controller" => "UsersController", "method" => "delUsers"],
        
    ];

    public function __construct($request) {
        $this->request = $request;
    }

    public function getRoute() {
        $elements = explode('/', $this->request);
        return $elements[0];
    }

    public function getParams() {

        $params = null;

        // extract GET params
        $elements = explode('/', $this->request);
        unset($elements[0]);
        for($i = 1; $i < count($elements); $i++) {
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }

        // extract POST params
        if($_POST) {
            foreach($_POST as $key => $val ) {
                $params[$key] = $val;
            }
        }

        return $params;
    }

    public function renderController() {

        $route = $this->getRoute();
        $params = $this->getParams();

        if(key_exists($route, $this->routes)) {
            
            $controller = $this->routes[$route]['controller'];
            $method = $this->routes[$route]['method'];

            $currentController = new $controller();
            $currentController->$method($params);
        }
        else {
            //echo "404";
            $error404 = new Error404();
            $error404->render();
        }
    }

    public function redirect($redirect, $request) {
        if(key_exists($request, $this->routes)) { 
            header("Location: ".HOST.$redirect);
            exit;
        }
    }

    public function rediriger($redirect) {
        header("Location: ".HOST.$redirect);
        exit;
    }
}