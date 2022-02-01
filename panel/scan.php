<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");


?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/9104146bde.js"
    crossorigin="anonymous"></script>
    <script src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
        integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="styles.css">
    <title>Leitor | Inventário</title>
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
                <li class="hovered">
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
            <div class="topbar">
                <!-- Botão Sanduiche-->
                <div class="toggle">
                    <i class="fas fa-bars"></i>
                </div>
            </div>
            <!-- inbox Chamados -->
            <div class="details">
                <div class="recentInbox" style="padding: 0">
                    <div class="content" style="flex: auto;">
            <div class="tabela-inventario">
                <p class="p-2" style="color: #8f1838; font-weight: bold; font-size: 20px;"></p>


                <div class="form-group " style="padding: 20px 20px 170px 20px;">
                    <div class="classnoname"
                        style="display: flex; flex-direction: column; justify-content: center; align-content: center; align-items: center;">
                        <div class="qr-id">
                            <!-- Camera -->
                            <div class="video-container">
                                <video id="preview" width="290px"></video>
                            </div>
                            <div style="display: flex; flex-direction: row; justify-content: center; align-content: center; align-items: center;" class="btn-group btn-group-toggle mb-5 a" data-toggle="buttons">
                                <label class="btn btn-primary">
                                    <input type="radio" name="options" value="1" autocomplete="off"> Frontal
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="options" value="2" autocomplete="off" checked> Traseira
                                </label>
                            </div>
                            <!-- Código do QRCode -->

                            <div class="container-scan">
                                <div class="getInfo-area">
                                    <div class="id-area">
                                        <label>ID: </label>
                                        <input disabled id="code" value="Aguardando QRCode...">
                                    </div>
                                    <script>
                                    function getCode() {
                                        var qrcode = document.getElementById('code').value;
                                        location.href = '?codigo=' + qrcode
                                    }
                                    </script>
                                    <button onclick="getCode()" id="btn-hidden" class="btn btn-primary"
                                        style="display: none">Coletar Informações</button><br>
                                </div>
                            </div>
                        </div>

                        <!-- Resultados -->
                        <div class="col-md-6" style="display: flex; flex-direction: column">
                            <tbody>
                                <tr>
                                    <tb class="title">Informações</tb>
                                    <tb class="item-info-stl"></tb>
                                    <tb class="item-info-stl"></tb>
                                </tr>
                                <tr>
                                    <br>

                                    <?php
                                if($_GET){

                                    $inf = "SELECT * FROM itens WHERE id_item = '".$_GET['codigo']."'";
                                    $info = mysqli_query($conn, $inf);
                                    $informa = mysqli_fetch_assoc($info);
                                    echo("<tr class='item-info-stl'>");
                                    echo("<tb class='item-info-stl'>ID do item: ".$informa['id_item']."</tb>");
                                    echo("<tb class='item-info-stl'>Identificador: ".$informa['identificador']."</tb>");
                                    echo("<tb class='item-info-stl'>Data de compra: ".$informa['data_compra']."</tb>");
                                    echo("<tb class='item-info-stl'>Loja atual: ".$informa['loja']."</tb>");
                                    echo("</tr>");              

                                }
                            

                            

                            ?>
                            </tbody>
                            </table>
                        </div>

                    </div>
                </div>
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
    <script type="text/javascript">
    // Aqui inicia a câmera por meio da tag vídeo do HTML
    let scanner = new Instascan.Scanner({
        video: document.getElementById('preview'),
        mirror: false
    });
    // Esse recebe o código do QRCode e escreve por cima do HTML na tag "code"
    scanner.addListener('scan', function(code) {
        document.getElementById('code').value = code;
        document.getElementById("btn-hidden").style.display = "block";
        console.log(document.getElementById('code').value)
    });
    // Aqui ele recebe todas as câmeras existentes (no caso do celular, frontal e traseira);
    Instascan.Camera.getCameras().then(function(cameras) {
        if (cameras.length > 0) {
            scanner.start(cameras[1]);
            $('[name="options"]').on('change', function() {
                if ($(this).val() == 1) {
                    if (cameras[0] != "") {
                        scanner.start(cameras[0]);
                    } else {
                        alert('Não foi encontrada a câmera');
                    }
                } else if ($(this).val() == 2) {
                    if (cameras[1] != "") {
                        scanner.start(cameras[1]);
                    } else {
                        alert('Não foi encontrada a câmera');
                    }
                }
            });
        } else {
            console.error('Nenhuma câmera foi encontrada :(');
            alert('Nenhuma câmera foi encontrada :(');
        }
    }).catch(function(e) {
        console.error(e);
        alert(e);
    });
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
