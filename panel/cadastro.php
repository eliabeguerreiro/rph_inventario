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
    $upload_item = "INSERT INTO itens (id_item, identificador, tipo, data_compra, loja, modelo) 
    VALUES('" .$ctrl. "','" .$dados['identificador']. "','" .$dados['tipo']. "',
    '" .$dados['data_c']. "','R" .$dados['loja']. "','" .$dados['modelo']. "');";
    $upload = mysqli_query($conn, $upload_item);

     if(mysqli_insert_id($conn)){
        $_SESSION['msg'] = "Item ".$dados['tipo']." cadastrado com sucesso";
    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Área Cadastral</title>
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

    <nav class="navbar navbar-light bg-redeph ">
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
        <nav id="sidebar">
            <div class="sidebar-header">
                <img src="../images/logo.png" alt="Logo" width="200px" height="auto" />
            </div>

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

        <!-- Modal -->
        <div class="modal fade " id="myModal" role="dialog">
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
                            <button type="button" class="btn btn-danger" data-dismiss="modal"
                                href='../functions/logout.php?sair=sim'>Sair</button>
                        </center>
                    </div>
                </div>

            </div>
        </div>
        <div id="content" style="flex: auto;">
            <div id="content-container">



                <div class="form-group " style="padding: 20px 20px 170px 20px;">

                    <?php    
                    if(isset($_SESSION['msg'])){
                        msg_sistem($_SESSION['msg']);
                        unset($_SESSION['msg']);
                    }
                    ?>
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
                <div class="footer ">
                    <!-- Footer -->
                    <footer class="text-center" style="background-color: #f39822">

                        <div class="container p-4">
                        </div>

                        <div class="text-center p-3" style="background-color: #f38022">
                            © 2021 Redepharma -
                            <a class="text-dark" href="https://github.com/eliabeguerreiro">Eliabe Paz</a> & <a
                                class="text-dark" href="https://github.com/kcaiosouza">Caio Souza</a>
                        </div>
                        <!-- Copyright -->

                    </footer>
                    <!-- Footer -->
                </div>
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