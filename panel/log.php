<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");
$_SESSION['URL']= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]"; 

if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: index.php");
} 


$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);		
$pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;                    
//Setar a quantidade de itens por pagina
$qnt_result_pg = 5;                  
//calcular o inicio visualização
$inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;


?>

<!DOCTYPE html>
<html lang='pt-br'>

<head>
    <title>Início | Inventário</title>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <!-- Bootstrap CSS CDN -->
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css'
        integrity='sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4' crossorigin='anonymous'>
    <!-- Our Custom CSS -->
    <link rel='stylesheet' href='styles.css'>
    <!-- Link Google Icons -->
    <link rel='stylesheet' href='https://fonts.googleapis.com/icon?family=Material+Icons'>
    <!-- Font Awesome JS -->
    <script defer src='https://use.fontawesome.com/releases/v5.0.13/js/solid.js'
        integrity='sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ' crossorigin='anonymous'>
    </script>
    <script defer src='https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js'
        integrity='sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY' crossorigin='anonymous'>
    </script>
</head>

<body>

    <nav class='navbar navbar-light bg-redeph'>
        <div class='navbar-container'>
            <button class='navbar-toggler bg-redeph-dark' id='sidebarCollapse' type='button' data-bs-toggle='collapse'
                data-bs-target='#navbarToggleExternalContent' aria-controls='navbarToggleExternalContent'
                aria-expanded='false' aria-label='Toggle navigation'>
                <span class='material-icons color-white'>reorder</span>
            </button>
            <div class="left-side">
                <div class="dropdown">
                    <button
                        class="btn btn-redeph-search dropdown-toggle justify-content-center align-items-center d-flex"
                        type="button" data-toggle="dropdown"><span class="material-icons">
                            filter_alt
                        </span>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu" style="padding-left: 7px;">

                        <?php
                        $url = explode('&', $_SESSION['URL']);
                        
                echo("
                <li><a href='".$url['0']."?filtro=data'>Data</a></li>
                <li><a href='".$url['0']."?filtro=user'>Usuário</a></li>
                <li><a href='".$url['0']."?filtro=alter'>Alteração</a></li>
                <li><a href='".$url['0']."?filtro=remov'>Remoção</a></li>
              ");
              ?>
                    </ul>
                </div>


                <form class="d-flex" id="searchbar">

                    <?php
                    if($_GET){
                        $filtro_atual = $_GET['filtro'];		
                        $filtro = (!empty($filtro_atual)) ? $filtro_atual : 'nenhum';   

                        if($filtro){
                            if($filtro == 'nenhum'){
                                //pesquisa sem filtro
                                ?>



                    <?php
                            }
                            if($filtro == 'data'){
                                echo("data");
                            }

                            if($filtro == 'user'){
                                echo("user");
                            }

                            if($filtro == 'alter'){
                                echo("alter");
                            }
                            
                            if($filtro == 'remov'){
                                echo("remov");
                            }

                        
                        
                        }

                    }else{
                        echo("
                            <input class='form-control me-2' type='search' placeholder='Procurar' aria-label='Search'>
                            <button class='btn btn-redeph-search busca-btn' type='submit'>
                                <span class='material-icons'>search</span>
                                
                                     
                        ");
                        
                    }

                ?>
                    
                </form>



                </button>
            </div>
        </div>
    </nav>
    <div class='wrapper'>
        <!-- Sidebar -->
        <nav id='sidebar' class=''>
            <div class='sidebar-header'>
                <img src='../images/logo.png' alt='Logo' width='200px' height='auto' />
            </div>

            <ul class='list-unstyled components'>

            </ul>

            <ul class='list-unstyled components' id='sidebar-links'>
                <li>
                    <a data-toggle='modal' data-target='#myModal'>Sair</a>
                </li>
                <li>
                    <a href='index.php'>Início</a>
                </li>
                <li>
                    <a href='cadastro.php'>Cadastro</a>
                </li>
                <li>
                    <a href='print.php'>Imprimir</a>
                </li>
                <li>
                    <a href='#'>Leitor</a>
                </li>
                <li>
                    <a href='log.php'>Log de alterações</a>
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

        <div class='content' style='flex: auto;'>
            <div class='tabela-inventario'>
                <table id='customers'>
                    <tbody>
                        <tr>
                            <th>Alterações</th>
                            <th></th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                        <tr>

                            <?php
        
        $sqlL = "SELECT * FROM log_alteracao LIMIT $inicio, $qnt_result_pg";
        echo('<br>');
        echo($sqlL);
        echo('<br>');
        $sqlLog = mysqli_query($conn, $sqlL);                                      
        while ($log = mysqli_fetch_assoc($sqlLog)){
            
            echo("<tr>");
            echo("<td>ID do item: ".$log['id_item']."</td>");
            echo("<td>ID do usuario: ".$log['id_user']."</td>");
            echo("<td>Descrição da ação: ".$log['detalhe']."</td>");
            echo("<td>Data de alteração: ".$log['data_altera']."</td>");
            echo("<td>Tipo de alteração: ".$log['tipo']."</td>");
            echo("</tr>");
          }
        //Paginção - Somar a quantidade de usuários
		$result_pg = "SELECT COUNT(id) AS num_result FROM log_alteracao";
		$resultado_pg = mysqli_query($conn, $result_pg);
		$row_pg = mysqli_fetch_assoc($resultado_pg);
		//echo $row_pg['num_result'];
		//Quantidade de pagina 
		$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
		
		//Limitar os link antes depois
		$max_links = 2;
        ?>
                    </tbody>
                </table>
                <?php
		echo "<a href='log.php?pagina=1'>Primeira</a> ";
		
		for($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
			if($pag_ant >= 1){
				echo "<a href='log.php?pagina=$pag_ant'>$pag_ant</a> ";
			}
		}
			
		echo "$pagina ";
		
		for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
			if($pag_dep <= $quantidade_pg){
				echo "<a href='log.php?pagina=$pag_dep'>$pag_dep</a> ";
			}
		}
		
		echo "<a href='log.php?pagina=$quantidade_pg'>Ultima</a>";


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
        <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js'
            integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'>
        </script>
        <!-- Popper.JS -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js'
            integrity='sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ' crossorigin='anonymous'>
        </script>
        <!-- Bootstrap JS -->
        <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js'
            integrity='sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm' crossorigin='anonymous'>
        </script>
        <script type='text/javascript'>
        $(document).ready(function() {
            $('#sidebarCollapse').on('click', function() {
                $('#sidebar').toggleClass('active');
            });
        });
        </script>
</body>


</html>