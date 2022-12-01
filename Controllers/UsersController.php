<?php
/**
 * class Home
 * 
 * use to show the home page
 */
class UsersController {

    public function login($params) {

        $login = new Login('Public/login');
        $login->render();
    }

    public function register($params) {

        $login = new Login('Public/register');
        $login->render();
    }

    public function showUsers($params) {

        $manager = new Users();
        $users = $manager->findAll();
        //echo '<pre>'; print_r($users); exit;

        $view = new View('Admin/users/index');
        $view->render(array(
            'titrePage' => 'Liste des utilisateurs',
            'users' => $users,
        ));

    }

    public function profilUsers($params) {

        if(isset($params)) {
            extract($params);
            $id = $id;
        }
        else {
            $id = $_SESSION['id'];
        }
        
        $manager = new Users();
        $user = $manager->find($id);
        echo'<pre>';print_r($user);exit;
        
        $view = new View('Users/profil');
        $view->render(array(
            'titrePage' => 'Profil',
            'user' => $user,
        ));

    }

    public function detailUsers($params) {
        // print_r($_SESSION['idUser']);exit;

        if(isset($params)) {
            
            extract($params);
            $idUser = $idUser;
        }
        else {
            $idUser = $_SESSION['idUser'];
        }
        
        $manager = new Users();
        $user = $manager->find($idUser);

        $view = new View('Users/detail-users');
        $view->render(array(
            'user' => $user,
        ));

    }

    public function saveUsers($params) {
        
        if(isset($params)) extract($params);
        // echo'<pre>';print_r($params);exit;

        $password=$values['email'];
        $telephone=$values['telephone'];
        $email=$values['email'];
        $profil=$values['profil'];
        $etat=0;        
        $idUser='';        

        // Si c'est un nouvel utilisateur, on va enregistrer son profil
        // if(!isset($values['idUser'])) {
          
            $manager = new Users();
            $manager->saveUser($email,$telephone,$password,$profil,$etat);
        // }   
       

        $view = new View();
        $view->redirect('home.html');
    }

    public function saveSelf($params) {

        extract($params);
        // print_r($values['password']);exit;
        $manager = new Users();

        $idUser=$values['idUser'];
        $email=$values['email'];
        $telephone=$values['telephone'];
        $password=$values['password'];

        $manager->save($idUser,$email,$telephone,$password);

        $view = new View();
        $view->redirect('profil.html');

    }

    public function delUsers($params) {

        extract($params);

        $manager = new Users();
        $manager->delete($idUser);

        $view = new View();
        $view->redirect('users.html');

    }

    public function log($params) {

        extract($params);
        // echo'<pre>';print_r($params);exit;   
        $manager = new Users();       
        $manager->log($values);
     
        $view = new View();
        if(isset($_SESSION['email'])) {
            if($_SESSION['poste'] == 'Admin' ){

                $agences = (new Agence())->findAll();
                // $array_agence=[];
                foreach($agences as $agence){
                    // print_r($agence->getLibelle());exit;
                    $array_agence[$agence->getId()]=$agence->getLibelle();

                }
                $_SESSION['agence']  = $array_agence;
              
                $view->redirect('home.html');

            }elseif($_SESSION['poste'] == 'Gerant' ){

                $view->redirect('home.html');

            }elseif($_SESSION['poste'] != 'Admin' || ($_SESSION['poste'] != 'Gerant' ) ){

                $_SESSION["alert"]="error";
                $_SESSION["alert_message"]="Vous n'êtes pas autorisé !";

                $view->redirect('accueil.html');
            }
        }else {
            // echo 2;exit;
            // print_r($_SESSION['echec_message']);exit;
            $view->redirect('login.html');
        }

    }

    public function reg($params) {
        
        extract($params);
        // print_r($params);exit;
        $manager = new Users();
        $manager->save($values);

        $all = $manager->findAll();
        $user = end($all);

        $values['idUser'] = $user->getIdUser();
        $profil = $user->getProfil();

        // if($profil == 1) {
        //     $manage = new Admin();
        //     $manage->save($values);
        // }
        // else if($profil == 2) {
        //     $manage = new Enseignant();
        //     $manage->save($values);
        // }
        // else if($profil == 3) {
        //     $manage = new Etudiant();
        //     $manage->save($values);
        // }
        // else if($profil == 4) {
        //     $manage = new Parent();
        //     $manage->save($values);
        // }
        // else {
        //     $manage = new Etudiant();
        //     $manage->save($values);
        // }

        //A la création d'un utilisateur, on crée un panier pour lui
        // $manager = new PanierManager();
        // $manager->save($values['idUser']);
        //End of new code

        $this->log(array(
            'values' => array(
                'email' => $values['email'],
                'password' => $values['password']
            )
        ));  

    }

    public function logout($params) {

        if(isset($params)) extract($params);

        $_SESSION = array();
        session_destroy();

        $view = new View();
        if($origin == "private")
            $view->redirect('login.html');
        else
            $view->redirect('accueil.html');

    }

    public function changProfil($params) {

        if(isset($params)) extract($params);
        // echo'<pre>';print_r($params);exit;

        $verify = (new Users())->find($id);
        // echo'<pre>';print_r($verify);exit;
        if($verify->getProfil()=='Admin'){
            //Profil = 1: Admin
            $_SESSION['alert'] = 'error';
            $_SESSION['alert_message'] = 'Désolé ! Le changement est impossible ';
        }elseif($verify->getProfil()=='User'){
              //Profil = 1: Manager
              $manager = new Users();
              $manager->updateProfil($id,'Admin');
        }
       
        $view = new View();
        $view->redirect('home.html');
    }

    public function changEtat($params) {

        if(isset($params)) extract($params);
        // echo'<pre>';print_r($params);exit;

        $verify = (new Users())->find($id);
        // echo'<pre>';print_r($verify);exit;
        if($verify->getProfil()==1){
            //Profil = 1: Admin
            $_SESSION['alert'] = 'error';
            $_SESSION['alert_message'] = 'Désolé ! Le changement est impossible ';
        }elseif($verify->getProfil()=='User'){
              //Profil = 1: Manager
              if($verify->getEtat()=='User'){
                $manager = new Users();
                $manager->updateEtat($id,'Admin');
              }elseif($verify->getEtat()=='Admin'){
                $manager = new Users();
                $manager->updateEtat($id,'Admin');
              }
              
        }
       
        $view = new View();
        $view->redirect('home.html');

    }
}