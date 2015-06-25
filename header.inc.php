<?php 

// Inicia a sessão
session_start();

// Criamos uma variável $pagina com o valor da query string 'pagina'
$pagina = !empty($_GET['pagina']) ? $_GET['pagina'] : 'home';

// Conectamos ao servidor. A variável $conexão agora contém 
// o resource de conexão, retornado pelo mysql_connect
$conexao = require_once 'conecta.inc.php';

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mural de recados</title>
<link rel="stylesheet" type="text/css" media="all" href="mural.css" /> 

<meta http-equiv="content-type" content="text/html; charset=UTF-8">

</head>
<body>

<div id="container">
<div id="cabecalho"><h1><a href="index.php" title="Principal">Mural de Recados</a></h1></div>