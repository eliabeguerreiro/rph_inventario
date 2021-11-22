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


<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap CSS CDN -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- Our Custom CSS -->
  <link rel="stylesheet" href="styles.css">
  <!-- Link Google Icons -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
  <!-- Font Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
</head>
<body>

    <nav class="navbar navbar-light bg-redeph">
        <div class="container-fluid">
          <button class="navbar-toggler bg-redeph-dark" id="sidebarCollapse" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="material-icons color-white">reorder</span>
          </button>
        </div>
      </nav>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img src="./images/logo.png" alt="Logo" width="200px" height="auto" />
            </div>
    
            <ul class="list-unstyled components">
                <form class="d-flex" id="searchbar">
                    <input class="form-control me-2" name='id_pesquisa' type="search" placeholder="Procurar" aria-label="Search">
                    <button class="btn btn-redeph-search busca-btn" name='SendPesqItem' type="submit">
                        <!-- Icone do Google Icons -->
                        <span class="material-icons">search</span>
                    </button>
                  </form>
            </ul>
                
            <ul class="list-unstyled components" id="sidebar-links">
                <li>
                    <a href="../index.html">Início</a>
                </li>
                <li>
                    <a href="cadastro.php">Cadastro</a>
                </li>
                <li>
                    <a href="#">Escanear</a>
                </li>
                <br>
            </ul>
        </nav>

<div class="content">
  <!-- Botão que ativa -->
  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Modal</button>

  <!-- Modal -->
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Conteudo -->
      <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">Cabeçalho</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <p>Informação</p>
          <form>
              <input/>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-warning" data-dismiss="modal">Fechar</button>
          <button type="button" class="btn btn-success" data-dismiss="modal">Salvar</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
        });
    });
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

