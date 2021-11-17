<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

if(isset($_SESSION['msg'])){
    msg_sistem($_SESSION['msg']);
    unset($_SESSION['msg']);
  }


var_dump($_GET);

echo("Usuario Logado: ".$_SESSION['usuario']['login']);



echo("<br><a href='?sair=sim'>Sair</a>");  


//logoff da sistema
if($_GET){
  if($_GET['sair'] == 'sim'){
    sair();
  }
}