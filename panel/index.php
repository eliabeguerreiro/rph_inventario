<?php

session_start();
include("functions/connection.php");
include("functions/fun.php");

if(isset($_SESSION['msg'])){
    msg_sistem($_SESSION['msg']);
    unset($_SESSION['msg']);
  }