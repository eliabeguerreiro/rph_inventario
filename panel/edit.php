<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");
//var_dump($_SESSION['usuario']);

$dados = $_GET;
$sqlBus = "SELECT * FROM itens WHERE id_item='". $dados['id'] ."'";
$sqlBuscar = mysqli_query($conn, $sqlBus);
$dados = mysqli_fetch_assoc($sqlBuscar);

if($dados){
    $id=$_GET['id'];
    if($_GET['del']=='n'){
        if($_POST){  
            
            $sql_alt = "UPDATE itens SET loja = 'R".$_POST['local']."' WHERE id_item = '" .$_GET['id']. "'";   
            $sql_alterar = mysqli_query($conn, $sql_alt);  
            //echo($sql_alt);
            
            if($sql_alterar){
                $_SESSION['msg'] = 'Localização do item alterada com Sucesso!';
                $data = date('Y/m/d');
                $tipo = 'alter';
                $detalhes = $_POST['motivo'];
                $sql_l = "INSERT INTO log_alteracao (id_item, id_user, detalhe, data_altera, tipo) VALUES 
                ('" .$id. "','" .$_SESSION['usuario']['id_usuario']. "','" .$detalhes. "','" .$data. "','" .$tipo. "')";
                $sql_log = mysqli_query($conn, $sql_l);  

                echo$sql_l;
                if($sql_log){
                    header("Location:".$_SESSION['URL']);
                }else{
                    $_SESSION['msg'] = 'Ação não registrada!';
                    header("Location:".$_SESSION['URL']);
                }


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
                <input class="form-control" type="text" name="motivo" placeholder="Digite o motivo da alteração:">
                <small>Limite de 300 caracteres</small>
                <br>
                <div class="d-flex align-items-center justify-content-around">

                    <div class="btn-group">
                        <input class="btn btn-danger" type="submit" name="btnAltData" ><br>
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
                $data = date('Y/m/d');
                $tipo = 'remov';
                $detalhes = $_POST['motivo'];
                $sql_l = "INSERT INTO log_alteracao (id_item, id_user, detalhe, data_altera, tipo) VALUES 
                ('" .$id. "','" .$_SESSION['usuario']['id_usuario']. "','" .$detalhes. "','" .$data. "','" .$tipo. "')";
                $sql_log = mysqli_query($conn, $sql_l);  

                //echo$sql_l;
                if($sql_log){
                    header("Location:".$_SESSION['URL']);
                }else{
                    $_SESSION['msg'] = 'Ação não registrada!';
                    header("Location:".$_SESSION['URL']);
                }
      
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
                    <h4><label>Você tem certeza que quer apagar DEFINITIVAMENTE o item ID:
                            <?php echo($_GET['id']);?></label></h4>
                    <br>
                    <input class="form-control" type="text" name="motivo" placeholder="Digite o motivo da alteração:">
                    <small>Insira o motivo antes de confirmar! Limite de 300 caracteres</small>
                    <div class="d-flex align-items-center justify-content-around">

                        <div class="btn-group">
                            <input class="btn btn-danger" type="submit" name="btnAltData" value="Apagar"><br>
                        </div>

                    </div>
                </form>
            </div>
        </center>
        <?php

    }


}



    ?>

    </body>

    </html>

    <?php