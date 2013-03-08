<?php
##cabeçlho padrao
require_once "header.php";
#pagina protegida
require_once "login.php";
#conexao com o banco de dados
include_once "db.php";
##Recebendo as variaveis que estão vindo da página usuário_editar.php
$id = $_POST['id'];
$nome = $_POST['nome'];
$email = $_POST['email'];
$tipo = $_POST['tipo'];

$query="UPDATE users SET nome='$nome', email='$email',tipo='$tipo' WHERE id= '$id' ";

//echo $query;
if(mysql_query($query,$cnx) or die (mysql_error() )){ // INICIO IF

		echo '<script language="javascript" type="text/javascript">';
		echo 'window.alert("Usuário autalizado com Sucesso!");';  
		echo 'window.history.go(-2);';
		echo '</script>'; 

} //FIM DO IF

else{
	
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.alert("Erro na atualização!");';  
		echo 'window.history.go(-2);';
		echo '</script>'; 
		
	
}



?>