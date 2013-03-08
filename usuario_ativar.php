<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/

##Cabeçalho padrão
require_once ("header.php");
require_once ("admin.php");

##Pagina Protegida
require_once "login.php";
include_once 'db.php';

//recebendo a variavel da pagina admin
$id = $_GET['id'];


$sql = "UPDATE users SET st='a' WHERE id='$id' ";
echo $sql;
if(mysql_query($sql,$cnx) or die (mysql_error() )){ // INICIO IF

		#echo '<script language="javascript" type="text/javascript">';
		#echo 'window.alert("Usuário ativado com Sucesso!");';  
		#echo 'window.location.href="admin.php";';
		#echo '</script>'; 
	$_SESSION['info']="Usuario ativado com sucesso!";

} //FIM DO IF

else{
	#echo '<script language="javascript" type="text/javascript">';
	#echo 'window.alert("Erro na atualização!");';  
	#echo 'window.location.href="admin.php";';
	#echo '</script>'; 
	$_SESSIO['errors']="Erro ao ativar o usuario!";
}


?>