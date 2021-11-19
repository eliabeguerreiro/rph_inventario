<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: index.php");
} 
   
if(isset($_SESSION['msg'])){
  msg_sistem($_SESSION['msg']);
  unset($_SESSION['msg']);
}
  

var_dump($_SESSION);
var_dump($_GET);

echo("Usuario Logado: ".$_SESSION['usuario']['login']);

?>
<a href='?sair=sim'>Sair</a>");  
<br>
<a class="text-decoration-none text-reset" href="cadastro.php">
    <button type="button" class="btn btn-danger">
        Cadastrar Item
    </button>
</a>
<?php

//logoff da sistema
if($_GET){
  if($_GET['sair'] == 'sim'){
    sair();
  }
}