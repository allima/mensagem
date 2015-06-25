<?php
session_start();

// Apagando as variáveis de sessão
unset($_SESSION['login']);
unset($_SESSION['senha']);


header ('Location: index.php');

?>