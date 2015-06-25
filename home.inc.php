<?php

// Função que retorna se o usuário está logado ou não.
// Caso esteja, retorna também o nome do usuário
function status_usuario () {
    if ( (!isset($_SESSION['login'])) or (!isset($_SESSION['senha'])) )
      return 'Usuário não está logado';
    else
      return 'Usuário ' . $_SESSION['login'] . ' logado';
}


// Função que exibe as mensagens do mural de recados
function exibe_mural() {

// Usa a variável global da conexão com o MySQL
global $conexao;
$sql = "SELECT 
          u.login, u.email, m.titulo, m.texto, u.nome, u.sobrenome, m.data 
        FROM 
          usuario u, mensagem m 
        WHERE 
          u.cod=m.cod_usuario 
        ORDER BY 
          data DESC";
$resultado = mysqli_query($conexao,$sql);
while ($linha = mysqli_fetch_array($resultado)) {
    $data = strtotime($linha['data']);
    $dia  = date("d/m/Y",$data);
    $hora = date("H:i:s",$data);
    echo '<div class="mensagem">';
    echo '<h4>' . $linha['titulo']. "</h4>\n";
    echo '<p>' . $linha['texto'] . "</p>\n";
    echo '<h5>Criada dia ' . $dia . ' ás ' . $hora . ',  
          por <a href=mailto:' . $linha['email'] . '>' . 
          $linha['login'] . '</a> ( ' . $linha['nome'] . ' ' . 
          $linha['sobrenome'] . ' ) ' . '</h5>' . "\n";
    echo "</div>";
    }
}
?>     
     
     <h2>Principal</h2>
     
     <?php
     echo status_usuario();
     ?>
    
     
     <div id="mural">
     <h3>Mensagens</h3>
     <?php
       exibe_mural();
     ?>
     </div>