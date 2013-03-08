<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
##cabeçalho padrao
require_once "header.php";

$_SESSION=array();
setcookie(session_name(),'',time()-3600);
session_destroy();

header("Location: /sis_back/login.php");
?>
