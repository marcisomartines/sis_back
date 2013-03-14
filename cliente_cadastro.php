<?php
/****************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica  */
/*Autor: Marciso Gonzalez Martines                              */
/*e-mail: marciso.gonzalez@gmail.com 						    */
/*Script responsavel por processar o cadastro de um novo cliente*/
/****************************************************************/
require_once "login.php";

include_once "db.php";

$codigo=$_POST['codigo'];
if(!is_int($codigo)){//verifica se o codigo do cliente é um inteiro
	$_SESSION['errors']="O codigo do cliente deve ser um inteiro!";
    header("Location: admin.php");
}
$empresa=$_POST['empresa'];

$query="INSERT INTO clientes(codigo,nome,st) VALUES ($codigo,'$empresa','a')";

$result=mysql_query($query,$cnx) or
        die("Erro na query: $query<br>".mysql_error());

if($result){
    $_SESSION['info']="Cliente cadastrado com sucesso!";
    header("Location: admin.php");
}else {
    $_SESSION['errors']="Erro ao cadastrar usuário!";
    header("Location: admin.php");
}