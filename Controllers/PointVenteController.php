<?php

/**
 * class PointVente
 * 
 * use to show the PointVente page
 */
class PointVenteController {

    public function store($params) {

        if(isset($params)) extract($params);
        // echo'<pre>';print_r($values['typePoint']);exit;
       
        if((isset($values['date'])) && (isset($values['montantRetire'])) && (isset($values['montantComplement'])) && (isset($values['montantVendu'])) && (isset($values['depenses'])) && (isset($values['typePoint'])))
        {
            if( ($values['montantVendu'] >=0) && ($values['montantComplement']>=0) && ($values['montantRetire']>=0) && ($values['depenses']>=0) )
            {
                        // Alors on récupère le jour précédent
                        $last_add = (new PointVente())->findModifPrecedent1($values['idAgence'],$values['typePoint']);
                        // echo '<pre>';print_r($last_add);exit;

                        if(!empty($last_add))
                        {
                            // echo 1;exit;
                            $montantRestant =( ($last_add->getMontantRestant() + $values['montantComplement']) - $values['montantVendu'] - $values['montantRetire']);
                            $values['montantRestant'] = $montantRestant;
                
                            $montantVerse = ($values['montantVendu'] - $values['depenses']);
                            $values['montantVerse'] = $montantVerse;
                
                            $sommeDesVentes = ($last_add->getSommeVentes() + $values['montantVendu']);
                            $values['sommeVentes']  = $sommeDesVentes;
                            // echo'<pre>';print_r($sommeDesVentes);exit;
                            
                            $manager = new PointVente();
                            $manager->save($values);

                        }else{
                            // echo 2;exit;
                            $manager = new PointVente();
                            $manager->save($values);
                        }       
            }  
            else {

                $_SESSION["alert"]="error";
                $_SESSION["alert_message"]="Certains montants sont négatifs !";
            }    
        }else {

             $_SESSION["alert"]="error";
            $_SESSION["alert_message"]="Ce point de vente est introuvable !";
        }
        // exit;
        if($values['typePoint']=="EnDetail"){
            $view = new View();
            $view->redirect('detail-agence.html/id/'.$values['idAgence']); 

        }elseif($values['typePoint']=="EnGros"){
            $view = new View();
            $view->redirect('gros-agence.html/id/'.$values['idAgence']); 
        }
    }

    public function update($params) {

        if(isset($params)) extract($params);
        // echo'<pre>';print_r($params);exit;
        
            if((isset($values['id'])) && (isset($values['montantComplement'])) && (isset($values['montantVendu'])) && (isset($values['depenses'])))
            {
                if( ($values['montantVendu'] >=0) && ($values['montantComplement']>=0) && ($values['montantRetire']>=0) && ($values['depenses']>=0) )
                {
                    //on considère le dernier ajout comme la date précédente
                    $exist_pointVente = (new PointVente())->find($values['id']);
                    
                    if($exist_pointVente)
                    {
                        $values['idAgence'] = $exist_pointVente->getIdAgence();
                        $values['date'] = $exist_pointVente->getDate();

                        $date = $exist_pointVente->getDate();

                        $date_precendent = date('y-m-d', strtotime($date) -86400);
                        //On vérifie si la date précédent existe dans la database
                        $exit_precedent = (new PointVente())->findJourPrecendent($date_precendent);
        
                            // Alors on récupère le jour précédent
                            $last_add = (new PointVente())->findModifPrecedent1($values['idAgence'], $values['typePoint']);
                            // echo '<pre>';print_r($last_add);exit;

                            if(!empty($last_add))
                            {

                                $montantRestant =( ($last_add->getMontantRestant() + $values['montantComplement']) - $values['montantVendu'] - $values['montantRetire']);
                                $values['montantRestant'] = $montantRestant;
                    
                                $montantVerse = ($values['montantVendu'] - $values['depenses']);
                                $values['montantVerse'] = $montantVerse;
                    
                                $sommeDesVentes = ($last_add->getSommeVentes() + $values['montantVendu']);
                                $values['sommeVentes']  = $sommeDesVentes;
                                // echo'<pre>';print_r($values);exit;
                                
                                $manager = new PointVente();
                                $manager->save($values);

                            }else{

                                $_SESSION["alert"]="error";
                                $_SESSION["alert_message"]="Ce point de vente est introuvable !";
                            }       
                    }else{
                        $_SESSION["alert"]="error";
                        $_SESSION["alert_message"]="Certains montants sont négatifs !";
                    }  
                }  
                else {

                    $_SESSION["alert"]="error";
                    $_SESSION["alert_message"]="Ce point de vente est introuvable !";
                }    
            }else {

                $_SESSION["alert"]="error";
                $_SESSION["alert_message"]="Ce point de vente est introuvable !";
            }
            
        // exit;
        if($values['typePoint']=="EnDetail"){
            $view = new View();
            $view->redirect('detail-agence.html/id/'.$values['idAgence']); 
        }elseif($values['typePoint']=="EnGros"){
            $view = new View();
            $view->redirect('gros-agence.html/id/'.$values['idAgence']); 
        } 
        
    }

    public function destroy($params) {

        extract($params);
        // print_r($params);exit;
        $point_vente = (new PointVente())->find($id);
        
        $manager = new PointVente();
        $manager->delete($id);
        // exit;
        if($point_vente->getTypePoint()=="EnDetail"){
            $view = new View();
            $view->redirect('detail-agence.html/id/'.$point_vente->getIdAgence());

        }elseif($point_vente->getTypePoint()=="EnGros"){
            $view = new View();
            $view->redirect('gros-agence.html/id/'.$point_vente->getIdAgence());
        }
       

    }

    
    
}