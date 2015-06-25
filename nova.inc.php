<h2>Nova mensagem</h2>
     
     <?php

     function exibe_form() {     
     echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '?pagina=nova">' . "\n";
     echo '  <p>Título: <br /> <input type="text" name="titulo" /> </p>' . "\n";
     echo '  <p>Mensagem: <br /> <textarea name="mensagem" cols="40" rows="8"></textarea>' . "\n";
     echo '  <p><input type="hidden" name="verifica_envio" value="1" />' . "\n";
     echo '     <input type="reset" value="Recomeçar" />' . "\n";
     echo '     <input type="submit" value="Enviar" />' . "\n";
     echo '  </p>' . "\n";
     echo '</form>' . "\n";     
     }
     
     function insere_bd($titulo, $mensagem) {
       global $conexao;
       $login = $_SESSION['login'];
       
       // Seleciona o código do usuário, de acordo com 
       // a variável $login, que está na sessão
       $sql    = "SELECT cod FROM usuario WHERE login='$login'";
       $resultado   = mysqli_query($conexao,$sql);
       
       // Como o select retornará apenas um usuário, 
       // não existe a necessidade de fazer um while
       $cod_usuario = mysqli_fetch_array($resultado);
       $cod_usuario = $cod_usuario[0];
       
       $insertsql = "INSERT INTO 
                       mensagem 
                     SET
                       cod_usuario='$cod_usuario',
                       titulo='$titulo',
                       texto='$mensagem',
                       data=NOW()";

       if (!$resultado = mysqli_query($conexao,$insertsql)) {
         echo 'Erro ao criar nova mensagem';
         }
       else {
         echo 'Mensagem criada com sucesso!';
         }
     }
     
     ?>
     
     <?php
     
     require_once 'pagina_fechada.inc.php';

     if (!confirma_login()) {
        echo "Você precisa estar logado para acessar esssa página";
        }
     else {
           
        if ( !array_key_exists('verifica_envio',$_POST) ) {
           exibe_form();
           }
        else  {
           $titulo = $_POST['titulo'];
           $mensagem = $_POST['mensagem'];
           if ( (!empty($titulo)) and (!empty($mensagem)) and (confirma_login()) )
             insere_bd($titulo,$mensagem);
           else
             echo 'Você não preencheu todos os campos';
           }
     }
     
     
     ?>