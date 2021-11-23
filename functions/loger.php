<?php
session_start();
include_once("connection.php");
include_once("fun.php");

if($_POST){
    
  //verificando se o usuario inseriu os dados (se sim, coletando login e senha)

  $login = $_POST['login'];
  $senha = $_POST['senha'];

  if(!empty($login) AND (!empty($senha))){
    
    //verificando a existencia do usuario no banco de dados(se sim, confirma senha)

    $result_user = "SELECT * FROM `usuarios` WHERE usuario = '$login' LIMIT 1;";
    $resultado_user = mysqli_query($conn, $result_user);


      if($resultado_user){
        //verificando senha encriptografada
        $row_user = mysqli_fetch_assoc($resultado_user); 

        if(password_verify($senha, $row_user['senha'])){
          //criando sessão do usuario
          $_SESSION['usuario']['id_usuario'] = $row_user['id_user'];
          $_SESSION['usuario']['login'] = $row_user['usuario'];
          $_SESSION['usuario']['nome'] = $row_user['nome'];
          $_SESSION['usuario']['tipo'] = $row_user['tipo'];
          
          $_SESSION['msg'] = "Bem Vindo!";
          header("Location:../panel/index.php");
          
        }else{
          $_SESSION['msg'] = "Login ou senha incorretos!";
          header("Location:../index.php");
          
        }     
      }
  }else{
    $_SESSION['msg'] = "Você precisa inserir todos os dados de login!";
    header("Location:../index.php");
  
  }
}else{
  $_SESSION['msg'] = "Página não encontrada!";
  header("Location:../index.php");
}
