 <?php
$bdhost      = 'localhost';
$bdusuario   = 'root';
$bdsenha     = '';
$basededados = 'basededados';

if (!$conexao = mysqli_connect($bdhost,$bdusuario,$bdsenha,$basededados)) 
     echo 'Erro ao conectar-se ao MySQL'; 
//elseif (!mysql_select_db($basededados,$conexao)) 
//     echo 'Erro ao selecionar a base de dados';
else 
     return $conexao;
?> 