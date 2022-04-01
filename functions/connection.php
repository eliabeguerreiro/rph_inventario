<?php

define('HOST', 'redepharma.com.br:3306');
define('USUARIO', 'redeph12_inventario');
define('SENHA', 'redeph@inventario');
define('DB', 'redeph12_inventario');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Falha na conexão com o Banco de Dados!');


define('HOST1', 'redepharma.com.br:3306');
define('USUARIO1', 'redeph12_inventario');
define('SENHA1', 'redeph@inventario');
define('DB1', 'redeph12_usuarios');

$conn_user = mysqli_connect(HOST1, USUARIO1, SENHA1, DB1) or die ('Falha na conexão com o Banco de Dados!');