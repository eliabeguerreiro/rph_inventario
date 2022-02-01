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
/*
echo("<div class='jumbotron'>");
var_dump($_SESSION['usuario']);
echo("</div><br>");
echo("Usuario Logado: ".$_SESSION['usuario']['login']);
*/

if(!$_SESSION['usuario']['nome']){
echo("<div class='jumbotron'>");



echo("Usuario sem nome, atualize seus dados!</div><br>");
 
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Painel Principal - Inventario</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
        integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>

    <div>
        <form method='POST' action="">
            <input type="text" name='id_pesquisa' placeholder='Digite o ID do item'>

            <input type="submit" name='SendPesqItem' value="Pesquisar">
        </form>


    </div>




    <a href='?sair=sim'>Sair</a>
    <br>
    <a class="text-decoration-none text-reset" href="cadastro.php">
        <button type="button" class="btn btn-danger">
            Registrar Item
        </button>
    </a>




    <video id="webcam"></video>


<script src="instascan.min.js"></script>
<script>
  const scanner = new Instascan.Scanner({
    video: document.getElementById('webcam')
  })
  scanner.addListener('scan', content => {
    console.log(content)
  })
  Instascan.Camera.getCameras().then( cameras => {
    if(cameras.length > 0){
      scanner.start(cameras[0])
    }
  })



</script>

</body>

</html>

<?php

$SendPesqItem = filter_input(INPUT_POST, 'SendPesqItem', FILTER_SANITIZE_STRING);

if($SendPesqItem){

  $pesquisa = filter_input(INPUT_POST, 'id_pesquisa', FILTER_SANITIZE_STRING);
  $result_pesquisa = "SELECT * FROM itens WHERE id_item LIKE '%$pesquisa%'";
  $resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
  while ($row_usuario = mysqli_fetch_assoc($resultado_pesquisa)){
    echo("<br>--------------------------------------------------------------<br>");
    echo " ID: ".$row_usuario['id_item']."<br>";
    echo " Loja: ".$row_usuario['loja']."<br>";
    echo " Código Identificador: ".$row_usuario['identificador']."<br>";
    echo " Data de Registro: ".$row_usuario['data_compra']."<br>";
    echo("--------------------------------------------------------------<br>");

  }

}


//logoff da sistema
if($_GET){
  if($_GET['sair'] == 'sim'){
    sair();
  }
}
