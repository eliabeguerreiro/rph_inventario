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
*/


if(!$_SESSION['usuario']['nome']){
  $_SESSION['msg'] = "Usuario sem cadastro necessário atualizar o perfil!";
  header("Location: caract.php");
 
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
        integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous">
    </script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
        integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous">
    </script>
</head>

<body>

    <nav class="navbar navbar-light bg-redeph">
        <div class="container-fluid">
            <button class="navbar-toggler bg-redeph-dark" id="sidebarCollapse" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-icons color-white">reorder</span>
            </button>
        </div>

    </nav>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img src="../images/logo.png" alt="Logo" width="200px" height="auto" />
            </div>

            <ul class="list-unstyled components">
                <form method="POST" action="" class="d-flex" id="searchbar">
                    <input class="form-control me-2" name='id_pesquisa' type="search" placeholder="Procurar">
                    <input class="btn btn-redeph-search busca-btn" name='SendPesqItem' type="submit" value="Pesquisar">

                    </button>
                </form>
            </ul>

            <ul class="list-unstyled components" id="sidebar-links">
                <li>
                    <a data-toggle="modal" data-target="#myModal">Sair</a>
                </li>
                <li>
                    <a href="index.php">Início</a>
                </li>
                <li>
                    <a href="cadastro.php">Cadastro</a>
                </li>
                <li>
                    <a href="#">Leitor</a>
                </li>
                <br>
            </ul>
        </nav>

        <div class="content">

            <!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Conteudo -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Deseja sair do inventario</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                            <center>
                                <button type="button" class="btn btn-primary" data-dismiss="modal">Voltar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Sair</button>
                            </center>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="content" style="flex: auto;">
            <div class="tabela-inventario">
                <table id="customers">
                    <tbody>
                        <tr>
                            <th>Inventário</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <?php
                    $SendPesqItem = filter_input(INPUT_POST, 'SendPesqItem', FILTER_SANITIZE_STRING);

                    if($SendPesqItem){
                    
                        $pesquisa = filter_input(INPUT_POST, 'id_pesquisa', FILTER_SANITIZE_STRING);
                        $result_pesquisa = "SELECT * FROM itens WHERE id_item LIKE '%$pesquisa%'";
                        $resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
                        while ($row_usuario = mysqli_fetch_assoc($resultado_pesquisa)){
                    
                        echo("
                        <tr>
                            <td>ID: ".$row_usuario['id_item']."</td>
                            <td>Identificador: ".$row_usuario['identificador']."</td>  
                            <td>Loja: ".$row_usuario['loja']."</td>
                            <td>Modelo: ".$row_usuario['modelo']."</td>
                            <td></td>

                            <td> <button type='button' class='btn btn-primary'>Editar</button>  
                            <button type='button' class='btn btn-danger'>Apagar</button> </td>
                        </tr>
                        ");
                       
                        }

                    }
                    ?>

                    </tbody>
                </table>
            </div>

            <!-- Footer -->
            <footer class="text-center " style="background-color: #f39822">
                <!-- Grid container -->
                <div class="container p-4">
                    <!-- Section: Text -->

                    <!-- Section: Links -->

                </div>
                <!-- Grid container -->

                <!-- Copyright -->
                <div class="text-center p-3" style="background-color: #f38022">
                    © 2021 Redepharma -
                    <a class="text-dark" href="https://github.com/eliabeguerreiro">Eliabe Paz</a> & <a class="text-dark"
                        href="https://github.com/kcaiosouza">Caio Souza</a>
                </div>
                <!-- Copyright -->

            </footer>
            <!-- Footer -->
        </div>

        <!-- jQuery CDN - Slim version (=without AJAX) -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
        </script>
        <!-- Popper.JS -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
        </script>
        <!-- Bootstrap JS -->
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
        </script>
        <script type="text/javascript">
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        </script>
</body>


</html>
<?php
  
  


/*logoff da sistema
if($_GET['sair']){
  if($_GET['sair'] == 'sim'){
    sair();
  }
}
*/