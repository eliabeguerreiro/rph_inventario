<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 


//qr code

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Imprimir</title>
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
    <div class='container'>
        <div>
            <center>
                <form class='noprint' action="">


                    <form method="POST" action="" enctype="multipart/form-data">

                        <label>Defina o Intervalo</label>
                        <div class="col-md-8">
                            <input class="form-control" type="text" name="identificador"
                                placeholder="Digite um codigo identificador">
                            <small id="emailHelp" class="form-text text-muted">A pagina suporta apenas 42 qr-codes. Digite o ID de um produto e filtre a pagina, que aparecera o qr-code deste e dos proximos 41 produtos em ordem de cadastro.</small>
                        </div>



                        <br><br>
                        <input class="btn btn-primary" type="submit" name="btnCadUsuario" value="Filtrar"><br>

                    </form>
                    <div class="qr-container mt-3" style="display: flex; flex-wrap: wrap; flex-direction: row;">
                        <?php              
                $sql_ite = "SELECT * FROM `itens` LIMIT 42";
                $sql_item = mysqli_query($conn, $sql_ite);

                while ($itens = mysqli_fetch_assoc($sql_item)){    
                    $aux = 'qr_img0.50j/php/qr_img.php?';   
                    $aux .= "d=".$itens['id_item']."&";
                    $aux .= 'e=H$';
                    $aux .= 's=10$';
                    $aux .= 't=P';
                    
                    echo("<div class='col'><center><div class='card'>");
                    
                    
                    echo("<div class='qr_code'>
                    <img src='".$aux."' alt=''><br>
                    <a style='font-size: 30px;'>".$itens['id_item']."</a>
                    </div>");
                    
                    
                    echo("</div></center><br><br></div>");
                }
                
                
                ?>
                </div>
                    <form>
                        <input  class='noprint' type="button" value="Print this page" onClick="window.print()" />
                    </form>
                    
                    
        </div>
    </div>
</body>


</html>
