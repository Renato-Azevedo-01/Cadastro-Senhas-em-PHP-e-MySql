<?php
require '../vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
header("Access-Control-Allow-Origin: *");
$dotenv=Dotenv\Dotenv::createImmutable(dirname(__FILE__,2)); #colocando o .env na raiz do backend ==> (correto !!!) 
$dotenv->load();


if(!isset($_SESSION)){
    session_start();
}
$jwt = $_SESSION['encode'];
#echo "$jwt <br>";
$decoded = JWT::decode($jwt, new Key($_ENV['KEY'],'HS256'));
$email = $decoded->email;

If ($email == $_SESSION['email']){
    header('Location: painel.php');
}
else{
    die("você não tem permissão para acessar o painel");
}
?>