<?php

function msg_sistem ($msg){    
    echo "<center><div class='alert alert-warning' role='alert'>";
    echo $_SESSION['msg'];
    echo"</center></div>";
        }

function sair(){
    session_unset();
    header("Location:../index.php");
}