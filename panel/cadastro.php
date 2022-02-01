<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");



if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 

//coletando dados do formulario
if($_POST){
    
    $dados = $_POST;

    //criando o ID_ITEM
    $sql_cont = "SELECT * FROM `itens`";
    $sql_controle = mysqli_query($conn, $sql_cont);
    $total = mysqli_num_rows($sql_controle);
    $controle = $total + 1;
    if($controle < 10){
        $ctrl = $_SESSION['usuario']['id_usuario']."0000".$controle; 
    
    }elseif($controle < 100){
        $ctrl = $_SESSION['usuario']['id_usuario']."000".$controle; 
        
    }elseif($controle < 1000){
        $ctrl = $_SESSION['usuario']['id_usuario']."00".$controle; 
        
    }elseif($controle < 10000){
        $ctrl = $_SESSION['usuario']['id_usuario']."0".$controle; 
    }

    //Fazendo upload dos dados pro BD
    $upload_item = "INSERT INTO itens (id_item, identificador, tipo, data_compra, loja, modelo, autor) 
    VALUES('" .$ctrl. "','" .$dados['identificador']. "','" .$dados['tipo']. "',
    '" .$dados['data_c']. "','R" .$dados['loja']. "','" .$dados['modelo']. "','" .$_SESSION['usuario']['id_usuario']. "');";
    $upload = mysqli_query($conn, $upload_item);

     if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "Item ".$dados['tipo']." cadastrado com sucesso";
    }
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
    <title>Cadastro | Inventário</title>
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
                <li>
                    <a href="./">
                        <span class="icon"><i class="fas fa-home"></i></span>
                        <span class="title">Início</span>
                    </a>
                </li>
                <li class="hovered">
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
            </div>
            <!-- inbox Chamados -->
            <div class="details">
                <div class="recentInbox">
                    <div class="cardHeader">
                        <h2>Cadastrar Item</h2>
                    </div>
                    <div class="content" style="flex: auto;">
            <div class="tabela-inventario">
                <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>
                    <center>
                        <form method="POST" action="" enctype="multipart/form-data">

                            <label>Identificador</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="identificador"
                                    placeholder="Digite um codigo identificador">
                                <small id="emailHelp" class="form-text text-muted">Siga nessa ordem de preferencia:
                                    Numero MAC, Serial ou codigo exclusivo do item que esteja fisicamente
                                    visível.</small>
                            </div>
                            <br>
                            <br>

                            <label>Número da loja</label>
                            <div class="col-md-8">
                                <input class="form-control" type="number" name="loja"
                                    placeholder="Digite o codigo da loja">
                                <small id="emailHelp" class="form-text text-muted">Sempre insira 2 digitos. Exemplo:
                                    01, 05, 15 </small>
                            </div>
                            <br>

                            <label>Modelo</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="tipo"
                                    placeholder="Digite o modelo do item">
                                <small id="emailHelp" class="form-text text-muted">O modelo será padronizado em marca +
                                    modelo.
                                    Ex: hp officejet pro 6970 | lg flatron 24bl550j-b</small>
                            </div>
                            <br>

                            <label>Tipo</label>
                            <div class="col-md-8" style="padding-left: 15px;">
                                <select class="form-control" name="modelo">
                                    <option value="">Selecione o modelo</option>
                                    <option value="desktop">Desktop</option>
                                    <option value="monitor">Monitor</option>
                                    <option value="equipamento_rede">Equipamento de Rede</option>
                                    <option value="nobrake">Nobrake</option>
                                    <option value="leitor">Leitor</option>
                                    <option value="impressora">Impressora</option>
                                    <option value="equipamento_audiovisual">Equipamento Audiovisual</option>
                                </select>
                            </div>

                            <br>

                            <label>Data Aquisição/Registro</label>
                            <div class="col-md-8">
                                <input class="form-control" type="date" name="data_c"
                                    placeholder="Digite a data de nascimento">
                                <small id="emailHelp" class="form-text text-muted">Opcional</small>
                            </div>

                            <br><br>
                            <input class="btn btn-primary" type="submit" name="btnCadUsuario" value="Cadastrar"><br>

                        </form>
                    </center>
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
