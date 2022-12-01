<?php

/**
 * class Users

 */
class Users {

    private $bdd;

    private $id;
    private $idAgence;
    private $email;
    private $telephone;
    private $password;
    private $etat;
    private $poste;
    private $createdAt;
    private $updatedAt;
   
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
    public function getEmail() {
        return $this->email;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function getTelephone() {
        return $this->telephone;
    }
    public function setTelephone($telephone) {
        $this->telephone = $telephone;
    }
    public function getPassword() {
        return $this->password;
    }
    public function setPassword($password) {
        $this->password = $password;
    }    
    public function getEtat() {
        return $this->etat;
    }
    public function setEtat($etat) {
        $this->etat = $etat;
    }  
    public function getPoste() {
        return $this->poste;
    }
    public function setPoste($poste) {
        $this->poste = $poste;
    }
    public function getCreatedAt() {
        return $this->createdAt;
    }
    public function setCreatedAt($createdAt) {
        $this->createdAt = $createdAt;
    }
    public function getUpdatedAt() {
        return $this->updatedAt;
    }
    public function setUpdatedAt($updatedAt) {
        $this->updatedAt = $updatedAt;
    }
   

    public function findAll() {

        $bdd = $this->bdd;
        $users = [];

        /*** Accès au model */
        $query = "SELECT * FROM users ORDER BY id ASC";
        $req = $bdd->prepare($query);
        $req->execute();

        while($row = $req->fetch(PDO::FETCH_ASSOC)) {

            $user = new Users();
            $user->setId($row['id']);
            $user->setIdAgence($row['idAgence']);
            $user->setEmail($row['email']);
            $user->setTelephone($row['telephone']);
            $user->setPassword($row['password']);
            $user->setPoste($row['poste']);
            $user->setEtat($row['etat']);

            $users[] = $user;

        };
        return $users;
    }

    public function findAllUser() {

        $bdd = $this->bdd;
        // $users = [];

        /*** Accès au model */
        $query = "SELECT * FROM users ORDER BY id DESC LIMIT 1";
        $req = $bdd->prepare($query);
        $req->execute();

        $row = $req->fetch(PDO::FETCH_ASSOC);

        if($row){
            $user = new Users();
            $user->setId($row['id']);
            $user->setIdAgence($row['idAgence']);
            $user->setEmail($row['email']);
            $user->setTelephone($row['telephone']);
            $user->setPassword($row['password']);
            $user->setPoste($row['poste']);
            $user->setEtat($row['etat']);
        }else{
            $user = [];
        }

        return $user;
    }

    public function find($id) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM users WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        if($row){
            $user = new Users();
            $user->setId($row['id']);
            $user->setIdAgence($row['idAgence']);
            $user->setEmail($row['email']);
            $user->setTelephone($row['telephone']);
            $user->setPassword($row['password']);
            $user->setPoste($row['poste']);
            $user->setEtat($row['etat']);
        }else{
            $user = [];
        }
        return $user;
    }

    public function findAgence($idAgence) {

        $bdd = $this->bdd;

        /*** acces au model ***/
        $query = "SELECT * FROM users WHERE idAgence= :idAgence";
        $req = $bdd->prepare($query);
        $req->bindValue(':idAgence', $idAgence, PDO::PARAM_INT);
        $req->execute();
        $row = $req->fetch(PDO::FETCH_ASSOC);
    
        if($row){
            $user = new Users();
            $user->setId($row['id']);
            $user->setIdAgence($row['idAgence']);
            $user->setEmail($row['email']);
            $user->setTelephone($row['telephone']);
            $user->setPassword($row['password']);
            $user->setPoste($row['poste']);
            $user->setEtat($row['etat']);
        }else{
            $user = [];
        }
        return $user;
    }

    public function save($values) {
        // print_r($id);exit;
        $bdd = $this->bdd;
     
        if(!(empty($id)))
        {
            //   echo 1;exit;
            $query = "UPDATE users SET email = :email, telephone = :telephone, password = :password WHERE id = :id";
        }else{
                // echo 2;exit;
            $query = "INSERT INTO users (id, idAgence, email, telephone, password,etat,poste) VALUES (NULL, :idAgence, :email, :telephone, :password,:etat,:poste)";
        }
        // echo 5;
        $req = $bdd->prepare($query);

        if(!(empty($values['id']))) $req->bindValue(':id', $values['id'], PDO::PARAM_INT);
        $req->bindValue(':idAgence', $values['idAgence'], PDO::PARAM_INT);
        $req->bindValue(':email', $values['email'], PDO::PARAM_STR);
        $req->bindValue(':telephone', $values['telephone']);
        $req->bindValue(':password', $values['password']);
        $req->bindValue(':etat', $values['etat']);
        $req->bindValue(':poste', $values['poste']);

        // echo 6;exit;
        $req->execute();

    }


    public function updateEtat($id,$etat) {
        // print_r($etat);exit;
        $bdd = $this->bdd;
     
        $query = "UPDATE users SET etat = :etat WHERE id = :id";
            
        $req = $bdd->prepare($query);

        if(!(empty($id))) $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->bindValue(':etat', $etat);
        $_SESSION['alert'] = 'success';
        $_SESSION['alert_message'] = 'Changement effectué avec succès !';

        $req->execute();
    }

    public function delete($id) {

        $bdd = $this->bdd;

        $query = "DELETE FROM users WHERE id= :id";
        $req = $bdd->prepare($query);
        $req->bindValue(':id', $id, PDO::PARAM_INT);
        $req->execute();
       
    }

    public function log($values) {
        // echo'<pre>';print_r($values);exit;
         
        $bdd = $this->bdd;

        if(isset($values['telephone']) && !empty($values['telephone']) && isset($values['password']) && !empty($values['password'])) 
        {
            // echo 1;exit;    
            $res = $bdd->prepare("SELECT * FROM users WHERE telephone =? AND password =? ");
            $res->execute(array($values['telephone'], $values['password']));
            $donnees=$res->fetch();
            // echo'<pre>';print_r($donnees);exit;         
            
            if(!empty($donnees))
            {
                         
                $_SESSION["id"]=$donnees["id"];
                $_SESSION["idAgence"]=$donnees["idAgence"];
                $_SESSION["email"]=$donnees["email"];
                $_SESSION["password"]=$donnees["password"];
                $_SESSION["telephone"]=$donnees["telephone"];
                $_SESSION["poste"]=$donnees["poste"];
                $_SESSION["etat"]=$donnees["etat"];

                $_SESSION['alert'] = "success";
                $_SESSION['alert_message'] = "Bienvenue";
                
            }else{
                $_SESSION["alert"]="error";
                $_SESSION["alert_message"]="Vous n'êtes pas autorisé";
            }
        }else{
            $_SESSION["alert"]="error";
            $_SESSION["alert_message"]="Revoir les informations saisies";
        }

    }

    public function getNbrUsers() {

        $bdd = $this->bdd;

		$select = $bdd->query("SELECT * FROM users");

		return $select->rowCount();

    }

}