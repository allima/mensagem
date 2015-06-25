<?php
// Iniciamos a sessão
session_start();

  // Função que valida o usuário no banco de dados
  function valida_usuario($usuario,$senha) {
     $conexao = require_once 'conecta.inc.php';
     
     // Criptografa a senha
     $senha = md5($senha);
     
     $sql = "SELECT * FROM usuario WHERE login='$usuario' AND senha='$senha'";
     
     if (!$resultado = mysqli_query($conexao,$sql)) {
         return false;
         }
     elseif(mysqli_num_rows($resultado) != 1) {
         return false;
         }
     else {
         return true;
         }
     
  }

// Passamos as variáveis de $_POST para a 
// função de verificação do usuário
$login = $_POST['login'];
$senha = $_POST['senha'];
if (valida_usuario($login,$senha)) {
    // Escreve na session
    $_SESSION['login'] = $login;
    $_SESSION['senha'] = $senha;
    
    // Redireciona o usuário
    header ("Location: index.php");
    }
else {
    // Caso o usuário não for validado, 
    // apaga as variáveis de sessão e 
    // mostra mensgagem de erro
    unset($_SESSION['login']);
    unset($_SESSION['senha']);
    echo "Senha ou usuário inválidos. Tente outra vez.";
    }

?>