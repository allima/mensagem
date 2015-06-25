<?php
     $nome      =  isset($_POST['nome']);
     $sobrenome =  isset($_POST['sobrenome']);
     $login     =  isset($_POST['login']);
     $email     =  isset($_POST['email']);
     $senha     =  isset($_POST['senha']);
     $confsenha =  isset($_POST['confsenha']);
     
    
      function exibe_form () {      
      echo '<form method="post" action="' . $_SERVER['PHP_SELF'] . '?pagina=cadastro' . '">' . "\n";;
      echo ' <p>Nome: <br /> <input type="text" name="nome" /></p>' . "\n";
      echo ' <p>Sobrenome: <br /> <input type="text" name="sobrenome" /></p>' . "\n";
      echo ' <p>Login (apelido): <br /> <input type="text" name="login" /></p>' . "\n";
      echo ' <p>E-mail: <br /> <input type="text" name="email" /></p>' . "\n";
      echo ' <p>Senha: <br /> <input type="password" name="senha" /></p>' . "\n";
      echo ' <p>Confirmação de Senha: <br /> <input type="password" name="confsenha" /></p>' . "\n";
      echo ' <p><input type="hidden" name="verifica_envio" value="1" /></p>' . "\n";
      echo ' <p><input type="reset" value="Recomeçar" />  <br />  <input type="submit" value="Cadastrar" />' . "\n";
      echo '</form>' . "\n";
      }
      
      
      
      // Função que faz o cadastro do usuário no banco de dados
      function cadastra_usuario($nome,$sobrenome,$login,$email,$senha) {
        // Usaremos a variável de conexão com o MySQL, criada no header.inc.php
        global $conexao;
        
       // Por segurança, guardamos o hash da senha
        $senha = md5($senha);
        $sql = "INSERT INTO 
                  usuario 
                SET 
                  nome      ='$nome', 
                  sobrenome ='$sobrenome', 
                  email     ='$email',
                  login     ='$login',
                  senha     ='$senha',
                  data      = NOW()";
        
        if ($resultado = mysqli_query($conexao,$sql)) {
          echo "Usuúrio cadastrado com sucesso! Você pode logar-se agora.\n";
          }
        else {
          echo "Erro no cadastro, por favor tente de novo\n";
          }

      }

      // Função que verifica se tudo está preenchido corretamente
      function processa_cadastro($nome,$sobrenome,$login,$email,$senha,$confsenha) {      
        if ( (empty($nome)) or (empty($sobrenome)) or (empty($login)) or 
             (empty($email)) or (empty($senha)) or (empty($confsenha)) or 
             ($senha != $confsenha) ) 
          echo "Por favor, preencha todos os campos do formulário\n";   
        else
          cadastra_usuario($nome,$sobrenome,$login,$email,$senha);

      }
     
     ?>    
     
     <h2>Cadastro de novo usuário</h2>
     
     
     <?php     
     if (!array_key_exists('verifica_envio', $_POST)) 
        exibe_form();
     else
        processa_cadastro($nome,$sobrenome,$login,$email,$senha,$confsenha);
     ?>