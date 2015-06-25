
<?php require_once 'header.inc.php'; ?>
<?php require_once 'menu.inc.php'; ?>

<div id="principal">
<?php

  switch ($pagina)  {
   case 'home' :
     include 'home.inc.php';
     break;
   case 'cadastro' :
     include 'cadastro.inc.php';
     break;
   case 'login' : 
     include 'login.inc.php';
     break;
   case 'nova' :
     include 'nova.inc.php';
     break;
  }
    
?>
</div>
   

<?php require_once 'footer.inc.php'; ?>