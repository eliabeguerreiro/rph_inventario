<?php
session_start();
include_once("functions/fun.php");
//notificando o usuario
if(isset($_SESSION['msg'])){
  msg_sistem($_SESSION['msg']);
  unset($_SESSION['msg']);
}

session_start();


$serverName = "10.7.0.4\sqlexpress";
$connectionInfo = array( "Database"=>"RedePharmaOrdoucao", "UID"=>"redeph.suporte", "PWD"=>"R5@Od$4=6!3");
$conn = sqlsrv_connect( $serverName, $connectionInfo);
if( $conn === false ) {
    die( print_r( sqlsrv_errors(), true ));
}

/* Begin the transaction. */
if ( sqlsrv_begin_transaction( $conn ) === false ) {
    die( print_r( sqlsrv_errors(), true ));
}


$sql = "SELECT * FROM Table_1 LIMIT 0,10";
$stmt = sqlsrv_query( $conn, $sql);
if( $stmt === false ) {
     die( print_r( sqlsrv_errors(), true));
}

// Make the first (and in this case, only) row of the result set available for reading.
if( sqlsrv_fetch( $stmt ) === false) {
     die( print_r( sqlsrv_errors(), true));
}

// Get the row fields. Field indices start at 0 and must be retrieved in order.
// Retrieving row fields by name is not supported by sqlsrv_get_field.
$name = sqlsrv_get_field( $stmt, 0);
echo "$name: ";

$comment = sqlsrv_get_field( $stmt, 1);
echo $comment;




?>

<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Login | Inventário</title>
</head>
<body>

    <div class="area-login shadow">
        <div class="text-container">
            <img src="./images/logo.png" alt="Logo">
            <h1 class="login-name">Área de Login</h1>
            <h3>Efetue o seu login para prosseguir</h3>
        </div>

        <form method="POST" action="functions/loger.php">
            <div class="login-container">
                <input placeholder="Login" name="login" required>
            </div>
            <br>
            <div class="password-container">
                <input placeholder="Senha" type="password" name="senha" required>
            </div>

            <br>

            <div class="button-container">
                <button type="submit">Entrar</button>
            </div>

        </form>

    </div>
</body>
</html>