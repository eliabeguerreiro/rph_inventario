<?php

session_start();
include_once("functions/connection.php");

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
//obtendo dados inseridos no form

if($btnLogin){
  //verificando se o usuario inseriu os dados (se sim, coletando login e senha)

  $user = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
  $password = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  

  if(!empty($user) AND (!empty($password))){
    //verificando a existencia do usuario no banco de dados(se sim, confirma senha)

    $result_us = "SELECT * FROM user WHERE user = $user LIMIT 1;";
    $result_user = mysqli_query($conn, $result_user);


      if($result_user){
        //verificando senha encriptografada
        $row_user = mysqli_fetch_assoc($result_us);   
        $pass = $password;
        $pass = password_hash($password, PASSWORD_DEFAULT);
        
        if(password_verify($password, $row_user['password'])){
          //criando sessão do usuario
          $_SESSION['user']['id_user'] = $row_user['id_user'];
          $_SESSION['user']['user'] = $row_user['id_user'];
          $_SESSION['user']['type'] = $row_user['id_user'];
          //encaminhar aqui para pagina de painel geral
          
        }else{
          $_SESSION['msg'] = "Login ou senha incorretos!";
          
        }     
      }
  }else{
    $_SESSION['msg'] = "Você precisa inserir todos os dados de login!";
  
  }
}else{
  $_SESSION['msg'] = "Página não encontrada!";
}

//notificando o usuario
if(isset($_SESSION['msg'])){
  msg_sistem($_SESSION['msg']);
  unset($_SESSION['msg']);
}

?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Login</title>
  </head>

  <body>

    <div class="area-login">
      <div class="text-container">
        <img src="./images/logo.png" alt="Logo">
        <h1 class="login-name">Área de Login</h1>
        <h3>Efetue o seu login para processeguir</h3>
      </div>
      <form>

        <div class="email-container">
          <input placeholder="E-mail" type="email" name="email" required>
        </div>
        <br>
        <div class="password-container">
          <input placeholder="Senha" type="password" name="senha" required>
        </div>

        <br>

        <div class="button-container">
          <button type="submit">Entrar</button>
        </div>

      </form>

    </div>

  </body>  
</html>
<?php
