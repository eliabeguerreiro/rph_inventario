<?php

function msg_sistem ($msg){    
    echo "<div class='alert alert-warning' role='alert'>";
    echo $_SESSION['msg'];
    echo"</div>";
        }

function sair(){
    session_unset();
    header("Location:../index.php");
}