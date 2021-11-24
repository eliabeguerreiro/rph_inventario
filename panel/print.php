<?php
session_start();
include("../functions/connection.php");
include("../functions/fun.php");

$sql_cont = "SELECT * FROM `itens`";
    $sql_controle = mysqli_query($conn, $sql_cont);


//qr code
$aux = 'qr_img0.50j/php/qr_img.php?';   
$aux .= 'd=QUALQUER COISA&';
$aux .= 'e=H$';
$aux .= 's=10$';
$aux .= 't=P';
    

if($_POST){
echo("<div class='qr_code print'>
        <img src='".$aux."' alt=''>
        <a style='font-size: 30px;'>$ctrl</a>
      </div>"); }
