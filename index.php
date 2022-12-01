<?php
session_start();
include_once('_config.php');

MyAutoload::start();

if(!isset($_GET['r'])) {
    $request = $redirect = 'login.html';
    $router = new Router($request);
    $router->redirect($redirect, $request);
}

if(isset($_GET['r'])) $request = $_GET['r'];

$router = new Router($request);


// Vérification de l'authentificatoin
if(($request == 'login.html') && ( !isset($_SESSION['id']))) {
    $redirect = 'accueil.html';
    $router->redirect($redirect, $request);
}

// Gestion des droits d'accès
if(($request == 'home.html' || $request == 'users.html' || strpos($request, 'admin.html') !== false ) && ( !isset($_SESSION['id']))) {
    $redirect = 'accueil.html';
    $router->redirect($redirect, $request);
}


$router->renderController();