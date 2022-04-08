<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");



if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9104146bde.js"
    crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Inventário | Redepharma</title>
</head>
<body> 
    <div style="position: relative; width: 100%;">
        <!-- sideBar -->
        <div class="navigation">
            <ul>
                <li>
                    <a href="#">
                        <span class="icon"><img src="../images/small_logo_white.png" width="60px" height="60px" id="logo_redeph"></i></span>
                        <span class="title">Redepharma</span>
                        
                        
                    </a>
                </li>
                <li class="hovered">
                    <a href="./">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li>
                    <a href="./cadastro.php">
                        <span class="icon"><i class="fas fa-plus"></i></span>
                        <span class="title">Cadastro</span>
                    </a>
                </li>
                <li>
                    <a href="./print.php">
                        <span class="icon"><i class="fas fa-print"></i></span>
                        <span class="title">Imprimir</span>
                    </a>
                </li>
                <li>
                    <a href="./scan.php">
                        <span class="icon"><i class="fas fa-qrcode"></i></span>
                        <span class="title">Leitor</span>
                    </a>
                </li>
                <li>
                    <a href="./log.php">
                        <span class="icon"><i class="fas fa-clipboard-list"></i></span>
                        <span class="title">Log de alterações</span>
                    </a>
                </li>
                <li>
                    <a href="#" id="exit-btn" data-toggle="modal" data-target="#myModal">
                        <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                        <span class="title">Sair</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- main -->
        <div class="main">
            <!-- Mensagem de bem vindo -->
            <?php

            if(isset($_SESSION['msg'])){
                msg_sistem($_SESSION['msg']);
                unset($_SESSION['msg']);
            }

            ?>
            <div class="topbar">
                <!-- Botão Sanduiche-->
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>
                <!-- Busca -->
                <div class="search">
                    <form method="GET" action="" class="d-flex" id="searchbar">
                    <label>
                            <input name='id_pesquisa' type="search" placeholder="Procurar...">
                            <i class="fas fa-search"></i>
                        </label>
                    </form>
                </div>
            </div>
            <!-- inbox Chamados -->
            <div class="details">
                <div class="recentInbox">
                    <div class="cardHeader">
                        <h2>Itens do inventário</h2>
                    </div>
                    <div class="content" style="flex: auto;">
            <div class="tabela-inventario">
                <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>

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
                        $result_pesquisa = "SELECT * FROM itens WHERE id_item LIKE '%$pesquisa%' OR identificador LIKE '%$pesquisa%'  ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
                        $resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
                            
                        
                    while ($row_usuario = mysqli_fetch_assoc($resultado_pesquisa)){
                    
                        $au = "SELECT nome FROM usuarios WHERE id_user = ".$row_usuario['autor']."";
                        $aut = mysqli_query($conn_user, $au);
                        $autor = mysqli_fetch_assoc($aut);



                        echo("
                        <tr>
                            <td>ID: ".$row_usuario['id_item']."</td>
                            <td>Identificador: ".$row_usuario['identificador']."</td>  
                            <td>Loja: ".$row_usuario['loja']."</td>
                            <td>Autor: ".$autor['nome']."</td>
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

                    }else{

                        echo("<table id='customers'><tbody>");

                        $pesquisa = filter_input(INPUT_GET, 'id_pesquisa', FILTER_SANITIZE_STRING);
                        $result_pesquisa = "SELECT * FROM itens ORDER BY id DESC LIMIT $inicio, $qnt_result_pg";
                        $resultado_pesquisa = mysqli_query($conn, $result_pesquisa);
                            
                        
                    while ($row_usuario = mysqli_fetch_assoc($resultado_pesquisa)){
                    
                        $au = "SELECT nome FROM usuarios WHERE id_user = ".$row_usuario['autor']."";
                        $aut = mysqli_query($conn_user, $au);
                        $autor = mysqli_fetch_assoc($aut);



                        echo("
                        <tr>
                            <td>ID: ".$row_usuario['id_item']."</td>
                            <td>Identificador: ".$row_usuario['identificador']."</td>  
                            <td>Loja: ".$row_usuario['loja']."</td>
                            <td>Autor: ".$autor['nome']."</td>
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
                                
                                echo "<li class='page-item'><a class='page-link-rp' href='pagina=$pag_ant'>$pag_ant</a></li>";
                            }
                        }
                            
                        echo "<li class='page-item disabled'><span class='page-link-rp'>$pagina</span></li>";
                        
                        for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                            if($pag_dep <= $quantidade_pg){
                                echo "<li class='page-item'><a class='page-link-rp' href='?pagina=$pag_dep'>$pag_dep</a></li>";
                            }
                        }
                        
                        echo "<li class='page-item'><a class='page-link-rp' href='?pagina=$quantidade_pg'>Ultima</a> </li> </ul> </nav>";    

//tem que corrigir logo esse BO da paginação ta feio já


                    }
                     ?>
                </div>
            </div>
        </div>
    </div>

    <script>
        // ativar barra lateral
        let toggle = document.querySelector('.toggle');
        let navigation = document.querySelector('.navigation');
        let main = document.querySelector('.main');
        var edit_save = document.getElementById("logo_redeph");

        toggle.onclick = function(){
            navigation.classList.toggle('active');
            main.classList.toggle('active');
        }
    </script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
            integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
            integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
            integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous">
    </script>

            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog">

                    <!-- Conteudo -->
                    <div class="modal-content">
                        <div class="modal-header">
                            <h4 class="modal-title">Deseja sair do inventário?</h4>
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
</body>
</html>