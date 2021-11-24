<?php

function msg_sistem ($msg){    
    echo "<div class='alert alert-warning' role='alert'><center>";
    echo $_SESSION['msg'];
    echo"</div></center>";
        }

function sair(){
    session_unset();
    header("Location:../index.php");
}