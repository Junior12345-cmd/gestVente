<?php

/**
 * class PointVente

 */
class PointVente {

    private $bdd;

    private $id;
    private $idAgence;
    private $date;
    private $montantVendu;
    private $montantComplement;
    private $montantRetire;
    private $montantRestant;
    private $depenses;
    private $montantVerse;
    private $sommeVentes;
    private $typePoint;
   
   
    public function __construct() {
        $this->bdd = new PDO("mysql:host=localhost;dbname=gestvente;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getIdAgence() {
        return $this->idAgence;
    }
    public function setIdAgence($idAgence) {
        $this->idAgence = $idAgence;
    }

    public function getDate() {
        return $this->date;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function getMontantVendu() {
        return $this->montantVendu;
    }
    public function setMontantVendu($montantVendu) {
        $this->montantVendu = $montantVendu;
    }
    public function getMontantComplement() {
        return $this->montantComplement;
    }
    public function setMontantComplement($montantComplement) {
        $this->montantComplement = $montantComplement;
    }
    public function getMontantRetire() {
        return $this->montantRetire;
    }
    public function setMontantRetire($montantRetire) {
        $this->montantRetire = $montantRetire;
    }
    public function getMontantRestant() {
        return $this->montantRestant;
    }
    public function setMontantRestant($montantRestant) {
        $this->montantRestant = $montantRestant;
    }
    public function getDepenses() {
        return $this->depenses;
    }
    public function setDepenses($depenses) {
        $this->depenses = $depenses;
    }

    public function getMontantVerse() {
        return $this->montantVerse;
    }
    public function setMontantVerse($montantVerse) {
        $this->montantVerse = $montantVerse;
    }

    public function getSommeVentes() {
        return $this->sommeVentes;
    }
    public function setSommeVentes($sommeVentes) {
        $this->sommeVentes = $sommeVentes;
    }

    public function getTypePoint() {
        return $this->typePoint;
    }
    public function setTypePoint($typePoint) {
        $this->typePoint = $typePoint;
    }
    

    public function findAll() {

        $bdd = $this->bdd;
        $pointVentes = [];

        /*** Accès au model */
        $query = "SELECT * FROM pointvente ";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);
           
            $pointVentes[] = $pointVente;

        };
        return $pointVentes;
    }

    public function findLimit() {

        $bdd = $this->bdd;
        $pointVentes = [];

        /*** Accès au model */
        $query = "SELECT * FROM pointvente ORDER BY id DESC LIMIT 5";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);
           
            $pointVentes[] = $pointVente;

        };
        return $pointVentes;
    }


    public function findPrecedent($idAgence) {

        $bdd = $this->bdd;

        /*** Accès au model */
        $query = "SELECT * FROM pointvente ORDER BY id DESC LIMIT 1 WHERE idAgence=:idAgence";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAgence', $idAgence, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){
            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);

        }else{
            $pointVente = [];
        }
        return $pointVente;
    }

    public function findModifPrecedent($idAgence,$typePoint) {

        $bdd = $this->bdd;  
        $pointVente = [];
        /*** Accès au model */
        $query = "SELECT * FROM pointvente WHERE idAgence=:idAgence AND typePoint=:typePoint ORDER BY id DESC LIMIT 1";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAgence', $idAgence, PDO::PARAM_INT);
        $req->bindValue(':typePoint', $typePoint, PDO::PARAM_STR);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){

            $pointVente = $row;
        
        }else{
            $pointVente = [];
        }
        return $pointVente;
    }
    public function findModifPrecedent1($idAgence,$typePoint) {

        $bdd = $this->bdd;  
        $pointVente = [];
        /*** Accès au model */
        $query = "SELECT * FROM pointvente WHERE idAgence=:idAgence AND typePoint=:typePoint ORDER BY id DESC LIMIT 1";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAgence', $idAgence, PDO::PARAM_INT);
        $req->bindValue(':typePoint', $typePoint, PDO::PARAM_STR);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){

            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);
        
        }else{
            $pointVente = [];
        }
        return $pointVente;
    }
  
    public function find($id) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM pointvente WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        if($row){
            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);

        }else{
            $pointVente = [];
        }
        return $pointVente;
    }
    public function findDate($date) {

        $bdd = $this->bdd;

        $pointVentes = [];
        /*** acces au model ***/
        $query = "SELECT * FROM pointvente WHERE date= :date";
        $req = $bdd->prepare($query);
        $req->bindValue(':date', $date);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)){
    
            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);

            $pointVentes [] = $pointVente;
        
        }
        return $pointVentes;

    }


    public function findJourPrecendent($date_precedent) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM pointvente WHERE date= :date";
        $req = $bdd->prepare($query);
        $req->bindValue(':date', $date_precedent);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        if($row){
            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);

        }else{
            $pointVente = [];
        }
        return $pointVente;
    }

    public function findAgence($idAgence) {

        $bdd = $this->bdd;
        $pointVentes = [];
        /*** acces au model ***/
        $query = "SELECT * FROM pointvente WHERE idAgence = :idAgence";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAgence', $idAgence);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)){
    
            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);

            $pointVentes[] = $pointVente;
        }

        return $pointVentes;
    }

    public function searchAgence($idAgence,$typePoint) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM pointvente WHERE idAgence = :idAgence AND typePoint = :typePoint";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAgence', $idAgence);
        $req->bindValue(':typePoint', $typePoint);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){
            $pointVente = new PointVente();

            $pointVente->setId($row['id']);
            $pointVente->setIdAgence($row['idAgence']);
            $pointVente->setdate($row['date']);
            $pointVente->setMontantVendu($row['montantVendu']);
            $pointVente->setMontantComplement($row['montantComplement']);
            $pointVente->setMontantRetire($row['montantRetire']);
            $pointVente->setMontantRestant($row['montantRestant']);
            $pointVente->setDepenses($row['depenses']);
            $pointVente->setMontantVerse($row['montantVerse']);
            $pointVente->setSommeVentes($row['sommeVentes']);
            $pointVente->setTypePoint($row['typePoint']);

        }else{
            $pointVente = [];
        }
          

        return $pointVente;
    }


    public function save($values) {
        // print_r($values);exit;
        $bdd = $this->bdd;
     
        if(!(empty($values['id'])))
        {
            //   echo 1;exit;
            $query = "UPDATE pointvente SET idAgence = :idAgence, date = :date, montantVendu = :montantVendu, montantComplement = :montantComplement, montantRetire = :montantRetire, montantRestant = :montantRestant, depenses = :depenses, montantVerse = :montantVerse, sommeVentes = :sommeVentes, typePoint = :typePoint  WHERE id = :id";
            
            $_SESSION["alert"]="success";
            $_SESSION["alert_message"]="Modification effectuée avec succès !";

        }else{
                // echo 2;exit;
            $query = "INSERT INTO pointvente (id, idAgence, date, montantVendu, montantComplement, montantRetire, montantRestant, depenses, montantVerse, sommeVentes, typePoint) VALUES (NULL, :idAgence, :date, :montantVendu, :montantComplement, :montantRetire, :montantRestant, :depenses, :montantVerse, :sommeVentes, :typePoint)";
            
            $_SESSION["alert"]="success";
            $_SESSION["alert_message"]="Ajout effectué avec succès !";
        }
        // echo 5;
        $req = $bdd->prepare($query);

        if(!(empty($values['id']))) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':idAgence', $values['idAgence']);
        $req->bindValue(':date', $values['date']);
        $req->bindValue(':montantVendu', $values['montantVendu']);
        $req->bindValue(':montantComplement', $values['montantComplement']);
        $req->bindValue(':montantRetire', $values['montantRetire']);
        $req->bindValue(':montantRestant', $values['montantRestant']);
        $req->bindValue(':depenses', $values['depenses']);
        $req->bindValue(':montantVerse', $values['montantVerse']);
        $req->bindValue(':sommeVentes', $values['sommeVentes']);
        $req->bindValue(':typePoint', $values['typePoint']);

        // echo 6;exit;
        $req->execute();

    }


    public function delete($id) {

        $bdd = $this->bdd;

        $query = "DELETE FROM pointVente WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
       
    }

}