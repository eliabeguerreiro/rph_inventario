<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

//var_dump($_SESSION['usuario']);


if(!empty($_SESSION['usuario']['id_usuario']))
{}
else{$_SESSION['msg']='Você precisa logar para acessar o painel!</br>';
    header("Location: ../index.php");
} 


if($_POST){
    
    $dados = $_POST;
    $sql_alterar = "UPDATE usuarios SET nome = '" .$_POST['nome']. "' WHERE id_user = '" .$_SESSION['usuario']['id_usuario']. "'";
    $alterar = mysqli_query($conn, $sql_alterar);
    
    if($alterar){
    
        $result_user = "SELECT * FROM `usuarios` WHERE id_user = '".$_SESSION['usuario']['id_usuario']."' LIMIT 1;";
        $resultado_user = mysqli_query($conn, $result_user);
        $row_user = mysqli_fetch_assoc($resultado_user); 
        
        //echo("<br>".$result_user."<br>");

        //var_dump($row_user);

        if($row_user){
            
            $_SESSION['usuario']['nome'] = $row_user['nome'];         
            $_SESSION['msg'] = "Perfil Atualizado!";
            header("Location:index.php");
    
    }
    }
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Perfil</title>
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
        <?php
echo "<div class='alert alert-warning' role='alert'>";
    echo $_SESSION['msg'];
echo"</div>";
?>
    </center>
    <div class='jumbotron'>
        <form method="POST" action="" enctype="multipart/form-data">

            <label>Digite seu nome completo</label>
            <input class="form-control" type="text" name="nome" placeholder="Nome completo">
            <br><br>
            <input class="btn btn-primary" type="submit" name="btnCadNome" value="Cadastrar"><br>

        </form>
    </div>
</body>
</html>