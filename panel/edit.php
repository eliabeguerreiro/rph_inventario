<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

$dados = $_GET;
$sqlBus = "SELECT * FROM itens WHERE id_item='". $dados['id'] ."'";
$sqlBuscar = mysqli_query($conn, $sqlBus);
$dados = mysqli_fetch_assoc($sqlBuscar);

if($dados){
    if($_GET['del']=='n'){
        if($_POST){  
            
            $sql_alt = "UPDATE itens SET loja = 'R".$_POST['local']."' WHERE id_item = '" .$_GET['id']. "'";   
            $sql_alterar = mysqli_query($conn, $sql_alt);  
            
            //echo($sql_alt);
            
            if($sql_alterar){
                $_SESSION['msg'] = 'Localização do item Alterado com Sucesso!';
                header("Location:".$_SESSION['URL']);
                //e insert na tabela de log        
            }           
        }
    
        ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Editar</title>
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
    <center>
        <div class="form-group" style="padding: 20px 20px 20px 20px;">
            <form method="POST" action="">

                <label>Alterar a loja do item ID: <?php echo($_GET['id']);?></label>
                
                <input class="form-control" type="number" name="local" placeholder="Digite o novo local do item ">
                <br>
                <div class="d-flex align-items-center justify-content-around">

                    <div class="btn-group">
                        <input class="btn btn-danger" type="submit" name="btnAltData" value="Alterar"><br>
                    </div>

                </div>

            </form>
        </div>
    </center>

        <?php

        
    }elseif($_GET['del']=='y'){
        if($_POST){  
            
            $sql_alt = "DELETE FROM `itens` WHERE `id_item` = '" .$_GET['id']. "'";
            $sql_alterar = mysqli_query($conn, $sql_alt);  
             
            
            //echo($sql_alt);
            
            if($sql_alterar){
                $_SESSION['msg'] = 'O item foi removido com Sucesso!';
                header("Location:".$_SESSION['URL']);
                //e insert na tabela de log        
            }
           
        }
        
        




        ?>

        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <title>Apagar</title>
            <meta charset="utf-8">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <!-- Bootstrap CSS CDN -->
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
                integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
                crossorigin="anonymous">
            <!-- Our Custom CSS -->
            <link rel="stylesheet" href="styles.css">
            <!-- Link Google Icons -->
            <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
            <!-- Font Awesome JS -->
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
                integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
                crossorigin="anonymous">
            </script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
                integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
                crossorigin="anonymous">
            </script>
        </head>

        <body>

            <form method="POST" action="">
                <label>Apagar o item ID: <?php echo($_GET['id']);?></label>
                <br>
                <input type="submit" name="btnAltData" value="Apagar"><br>

            </form>


            <?php

    }


}





?>

            <!DOCTYPE html>
            <html lang="pt-br">

            <head>
                <title>Apagar</title>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Bootstrap CSS CDN -->
                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
                    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4"
                    crossorigin="anonymous">
                <!-- Our Custom CSS -->
                <link rel="stylesheet" href="styles.css">
                <!-- Link Google Icons -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
                <!-- Font Awesome JS -->
                <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
                    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
                    crossorigin="anonymous">
                </script>
                <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
                    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
                    crossorigin="anonymous">
                </script>
            </head>


            <?php






    ?>

        </body>

        </html>

        <?php