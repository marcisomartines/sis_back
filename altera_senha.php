<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/*Script responsavel por alterar senha e email 				  */
/***************************************************************/
##pagina Protegida
require_once "login.php";
include_once "db.php";

$nome=$_SESSION['nome'];
$password=$_POST['password'];
$email=$_POST['email'];
if(empty($password))//se campo senha estiver vazio
	$query="UPDATE users SET email='$email' WHERE nome='$nome'";
else//caso tenha alterado a senha entra aqui
$query="UPDATE users SET password=MD5('$password'),email='$email' WHERE nome='$nome'";

$result=mysql_query($query,$cnx) or
        die("Erro na query: $query<br>".mysql_error());

if($result){
    $_SESSION['info']="Senha/email alterado com sucesso!";
}else {
    $_SESSIO['errors']="Erro ao alterar a senha/email!";
}

header("Location: /sis_back/tarefa.php");
?>
