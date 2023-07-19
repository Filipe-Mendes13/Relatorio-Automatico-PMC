<?php
/*=======================================================================
| SCRIPT PADRAO PARA CONECTAR AO BANCO DE DADOS
| Autor = Filipe Mendes
| data = 29-06-2023
| status: Funcionando
|========================================================================*/
header("Access-Control-Allow-Origin: *");
ini_set('default_charset','UTF-8');

ini_set('display_errors', 0 );
error_reporting(0);

// Mesmo que error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);

//=======================================================================
// Connecting, selecting database

$db   = 'juliana';
$con = mysqli_connect('localhost', 'dev', 'Tesla@369');
// SQL query

$banco = mysqli_select_db($con, $db);


?>