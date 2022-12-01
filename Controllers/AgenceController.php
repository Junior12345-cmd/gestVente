<?php

/**
 * class Agence
 * 
 * use to show the Agence page
 */
class AgenceController {

    public function show($params) {

        if(isset($params)) extract($params);

        

            $view = new View('Admin/agence/detail-point');
            $view->render(array(
                "titrePage" => "Gestion des ventes en détails de l'agence : ",

                
            ));
       
    }
    public function showDetails($params) {

        if(isset($params)) extract($params);

        $agence = (new Agence())->find($id);
        if($agence){
            $pointVentes = (new PointVente())->findAgence($agence->getId());
            // print_r($pointVentes);exit;

            $view = new View('Admin/agence/details-agence');
            $view->render(array(
                "titrePage" => "Gestion des ventes en détails de l'agence : ",
                "agence" => $agence,
                "pointVentes" => $pointVentes
                
            ));
        }else {
            $error404 = new Error404();
            $error404->render();       
        } 
    }

    public function showGros($params) {

        if(isset($params)) extract($params);

        $agence = (new Agence())->find($id);
        if($agence){
            $pointVentes = (new PointVente())->findAgence($agence->getId());
            // print_r($pointVentes);exit;

            $view = new View('Admin/agence/gros-agence');
            $view->render(array(
                "titrePage" => "Gestion des ventes en gros de l'agence : ",
                "agence" => $agence,
                "pointVentes" => $pointVentes
                
            ));
        }else {
            $error404 = new Error404();
            $error404->render();       
        } 
    }

    public function store($params)
    {
        if(isset($params)) extract($params);

        $agence = (new Agence())->findLibelle($values['libelle']);

        if($agence){

            $_SESSION["alert"]="error";
            $_SESSION["alert_message"]="L'agence existe dèjà !";

        }else {
            $manager = new Agence();
            $manager->save($values);
           
        }

        $view = new View();
        $view->redirect('home.html'); 
    }

    public function search($params){

        if(isset($params)) extract($params);

        $values['date'] = $_POST['date'];
        $values['typePoint'] = $_POST['typePoint'];
        $values['idAgence'] = $_POST['idAgence'];

        $last_add = (new PointVente())->findModifPrecedent($values['idAgence'],$values['typePoint']);

        echo json_encode($last_add);
    }
    
}