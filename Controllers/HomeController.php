<?php

/**
 * class Home
 * 
 * use to show the home page
 */
class HomeController {

    public function showHome($params) {

        $agences = (new Agence())->findAll();
        $pointVentes = (new PointVente())->findLimit();

        $view = new View('home');
        $view->render(array(
            "titrePage" => "Tableau de bord",
            "agences" => $agences,
            "pointVentes" => $pointVentes,
            
        ));    
    }

    
  
    
}