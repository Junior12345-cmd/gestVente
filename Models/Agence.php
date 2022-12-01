<?php

/**
 * class Agence

 */
class Agence {

    private $bdd;

    private $id;
    private $libelle;
    private $nomGerant;
   
   
    public function __construct() {
        $this->bdd = new PDO("mysql:host=localhost;dbname=gestvente;charset=utf8", "root", "", array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
    }

    public function getId() {
        return $this->id;
    }
    public function setId($id) {
        $this->id = $id;
    }
    public function getLibelle() {
        return $this->libelle;
    }
    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
    public function getNomGerant() {
        return $this->nomGerant;
    }
    public function setNomGerant($nomGerant) {
        $this->nomGerant = $nomGerant;
    }
    

    public function findAll() {

        $bdd = $this->bdd;
        $agences = [];

        /*** Accès au model */
        $query = "SELECT * FROM agence ";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $agence = new Agence();
            $agence->setId($row['id']);
            $agence->setLibelle($row['libelle']);
            $agence->setNomGerant($row['nomGerant']);
           
            $agences[] = $agence;

        };
        return $agences;
    }

    public function lastComing() {

        $bdd = $this->bdd;
        // $users = [];

        /*** Accès au model */
        $query = "SELECT * FROM agence ORDER BY id DESC LIMIT 1";
        $req = $bdd->prepare($query);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){
            $agence = new Agence();
            $agence->setId($row['id']);
            $agence->setLibelle($row['libelle']);
            $agence->setNomGerant($row['nomGerant']);

        }else{
            $user = [];
        }

        return $agence;
    }

    public function find($id) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM agence WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        if($row){

            $agence = new Agence();
            $agence->setId($row['id']);
            $agence->setLibelle($row['libelle']);
            $agence->setNomGerant($row['nomGerant']);

        }else{
            $agence = [];
        }
        return $agence;
    }

    public function findLibelle($libelle) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM agence WHERE libelle = :libelle";
        $req = $bdd->prepare($query);
        $req->bindValue(':libelle', $libelle, PDO::PARAM_STR);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        if($row){
            $agence = new Agence();
            $agence->setId($row['id']);
            $agence->setLibelle($row['libelle']);
            $agence->setNomGerant($row['nomGerant']);
        }else{
            $agence = [];
        }
        return $agence;
    }


    public function save($values) {
        // print_r($idUser);exit;
        $bdd = $this->bdd;
     
        if(!(empty($values['id'])))
        {
            //   echo 1;exit;
            $query = "UPDATE agence SET libelle = :libelle, nomGerant = :nomGerant WHERE id = :id";
        }else{
                // echo 2;exit;
            $query = "INSERT INTO agence (id, libelle, nomGerant) VALUES (NULL, :libelle, :nomGerant)";
        }
        // echo 5;
        $req = $bdd->prepare($query);

        if(!(empty($values['id']))) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':libelle', $values['libelle'], PDO::PARAM_STR);
        $req->bindValue(':nomGerant', $values['nomGerant']);

        // echo 6;exit;
        $req->execute();

    }


    public function delete($id) {

        $bdd = $this->bdd;

        $query = "DELETE FROM agence WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
       
    }


    public function getNbrAgence() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM agence");

		return $select->rowCount();

    }

}