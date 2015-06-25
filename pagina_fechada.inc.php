<?php

function confirma_login () {
   if ( (!isset($_SESSION['login'])) or (!isset($_SESSION['senha'])) ) 
      return false;
   else
      return true;    
}

?>