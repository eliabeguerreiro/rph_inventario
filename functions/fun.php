<?php

function msg_sistem ($msg){    
    echo "<div class='alert alert-danger' role='alert'>";
    echo $_SESSION['msg'];
    echo"</div>";
        }

function sair(){
    session_unset();
    header("Location:../index.php");
}