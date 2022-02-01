<?php

define('HOST', 'redepharma.com.br:3306');
define('USUARIO', 'redeph12_inventario');
define('SENHA', 'redeph@inventario');
define('DB', 'redeph12_inventario');

$conn = mysqli_connect(HOST, USUARIO, SENHA, DB) or die ('Falha na conexão com o Banco de Dados!');
