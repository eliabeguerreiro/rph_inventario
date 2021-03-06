<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");



if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 
   
if(isset($_SESSION['msg'])){
  msg_sistem($_SESSION['msg']);
  unset($_SESSION['msg']);
}


/*
echo("<div class='jumbotron'>");
var_dump($_SESSION);
echo("</div><br>");
*/


if(!$_SESSION['usuario']['nome']){
  $_SESSION['msg'] = "Usuario sem nome cadastrado, necessário atualizar o perfil!";
  header("Location: caract.php");
 
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Início | Inventário</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Link Google Icons -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>

    <nav class="navbar navbar-light bg-redeph">
        <div class="navbar-container">
            <button class="navbar-toggler bg-redeph-dark" id="sidebarCollapse" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class="material-icons color-white">reorder</span>
            </button>
            <form method="GET" action="" class="d-flex" id="searchbar">
                <input class="form-control me-2" name='id_pesquisa' type="search" placeholder="Procurar">
                <input class="btn btn-redeph-search busca-btn" name='SendPesqItem' type="submit" value="Pesquisar">

                </button>
            </form>
        </div>

    </nav>
    <div class="wrapper">
        <!-- Sidebar -->
        <nav id="sidebar" class="">
            <div class="sidebar-header">
                <img src="../images/logo_white.png" alt="Logo" width="200px" height="auto" />
            </div>

            <ul class="list-unstyled components" id="sidebar-links">
                <li>
                    <a id="exit-btn" data-toggle="modal" data-target="#myModal">Sair</a>
                </li>
                <li>
                    <a href="index.php">Início</a>
                </li>
                <li>
                    <a href="cadastro.php">Cadastro</a>
                </li>
                <li>
                    <a href="print.php">Imprimir</a>
                </li>
                <li>
                    <a href="scan.php">Leitor</a>
                </li>
                <li>
                    <a href="log.php">Log de alterações</a>
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
                                <a type="button" class="btn btn-danger" href='../functions/logout.php?sair=sim'>Sair</a>
                            </center>
                        </div>
                    </div>

                </div>
            </div>

        </div>

        <div class="content" style="flex: auto;">
            <div class="tabela-inventario">
                <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;">Itens do inventário</p>

                <?php
                    $SendPesqItem = filter_input(INPUT_GET, 'id_pesquisa', FILTER_SANITIZE_STRING);

                    $pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);	
                        $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

                        //Setar a quantidade de itens por pagina
                        $qnt_result_pg = 8;

                        //calcular o inicio visualização
                        $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


                    if($SendPesqItem){

                        echo("<table id='customers'><tbody>");

                        $pesquisa = filter_input(INPUT_GET, 'id_pesquisa', FILTER_SANITIZE_STRING);
                        $result_pesquisa = "SELECT * FROM itens WHERE id_item LIKE '%$pesquisa%' LIMIT $inicio, $qnt_result_pg";
                        $resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
                            
                        
                    while ($row_usuario = mysqli_fetch_assoc($resultado_pesquisa)){
                    
                        echo("
                        <tr>
                            <td>ID: ".$row_usuario['id_item']."</td>
                            <td>Identificador: ".$row_usuario['identificador']."</td>  
                            <td>Loja: ".$row_usuario['loja']."</td>
                            <td>Modelo: ".$row_usuario['modelo']."</td>
                            <td></td>

                            <td> <a href='edit.php?del=n&id=".$row_usuario['id_item']."' type='button' class='btn btn-primary'>Editar</a>  
                            <a href='edit.php?del=y&id=".$row_usuario['id_item']."' type='button' class='btn btn-danger'>Apagar</a> </td>
                        </tr>
                        
                        ");
                        ?>
                <?php
                        }

                        $result_pg = "SELECT COUNT(id) AS num_result FROM itens";
                        $resultado_pg = mysqli_query($conn, $result_pg);
                        $row_pg = mysqli_fetch_assoc($resultado_pg);
                        //Quantidade de pagina 
                        $quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
                        
                        //Limitar os link antes depois
                        $max_links = 2;
                        echo("</tbody></table>");
                        ?>
                <?php   
                        $_SESSION['URL']= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 
                        $url = explode('&', $_SESSION['URL']);
                        
                        echo "<nav aria-label='Navegação de página' class='mt-3 mr-2'> <ul class='pagination justify-content-end'> <li class='page-item'> <a class='page-link-rp' href='".$url['0']."&pagina=1' tabindex='-1'>Primeira</a> </li>";
                        
                        for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                            if($pag_ant >= 1){
                                
                                echo "<li class='page-item'><a class='page-link-rp' href='".$url['0']."&pagina=$pag_ant'>$pag_ant</a></li>";
                            }
                        }
                            
                        echo "<li class='page-item disabled'><span class='page-link-rp'>$pagina</span></li>";
                        
                        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                            if($pag_dep <= $quantidade_pg){
                                echo "<li class='page-item'><a class='page-link-rp' href='".$url['0']."&pagina=$pag_dep'>$pag_dep</a></li>";
                            }
                        }
                        
                        echo "<li class='page-item'><a class='page-link-rp' href='".$url['0']."&pagina=$quantidade_pg'>Ultima</a> </li> </ul> </nav>";    

                    }
                     ?>


                <div class='footer'>
                    <!-- Footer -->
                    <footer class='text-center ' style='background-color: #f39822'>
                        <!-- Grid container -->
                        <div class='container p-4'>
                            <!-- Section: Text -->

                            <!-- Section: Links -->

                        </div>
                        <!-- Grid container -->

                        <!-- Copyright -->
                        <div class='text-center p-3' style='background-color: #f38022'>
                            © 2021 Redepharma -
                            <a class='text-dark' href='https://github.com/eliabeguerreiro'>Eliabe Paz</a> &
                            <a class='text-dark' href='https://github.com/kcaiosouza'>Caio Souza</a>
                        </div>
                        <!-- Copyright -->

                    </footer>
                    <!-- Footer -->
                </div>

            </div>
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