<?php
session_start();


$serverName = "WIN-IAS58QF5FM5\sqlexpress";
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
