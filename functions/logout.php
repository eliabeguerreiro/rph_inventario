<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

if($_GET['sair']){
  if($_GET['sair'] == 'sim'){
    session_unset();
    header("Location:../index.php");
  }
}
