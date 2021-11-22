<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

var_dump($_SESSION);




//$sql_alterar = "UPDATE usuarios SET nome = '" .$_SESSION['dado']. "' WHERE id_user = '" .$_SESSION['id_usuario']. "'";


//echo($sql_alterar);


?>


<form method="POST" action="" enctype="multipart/form-data">

    <label>Digite seu nome completo</label>
    <input class="form-control" type="text" name="loja" placeholder="Digite o codigo da loja">
    <br><br>
    <input class="btn btn-primary" type="submit" name="btnCadUsuario" value="Cadastrar"><br>


</form>


<?php

echo "<div class='alert alert-warning' role='alert'>";
    echo $_SESSION['msg'];
echo"</div>";