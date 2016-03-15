<?php 

$hostBD = 'localhost';
$loginBD = 'root';
$senhaBD = '';

$conexao = mysql_connect($hostBD, $loginBD, $senhaBD);
mysql_select_db("precoconstrucao", $conexao);
