<?php
##cabeçlho padrao
require_once "header.php";
#pagina protegida
require_once "login.php";
#conexao com o banco de dados
include_once "db.php";
#recebendo variaves da pagina usuario.php
$form_nome = $_POST['nome'];
$form_email =$_POST['email'];
$form_senha = md5($_POST['senha']);
$form_tipo= $_POST['tipo'];

#fimrecebimento das variaveis


//fazendo a verificação da senha se uma for diferente da outra retorna para página anterior
/*if($form_senha <> $form_Csenha){
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.alert("As senhas informadas são diferentes uma da outra!");';  
		echo 'window.history.go(-1);';
		echo '</script>'; 
		exit();
		
} //Fim da verificação.
*/

$query = "insert into users (nome,email,password,tipo,st) values ('$form_nome','$form_email','$form_senha','$form_tipo','a')";

if(mysql_query($query,$cnx) or die (mysql_error() )){ // INICIO IF
		$_SESSION['info']="Usuário Cadastrado com Sucesso!";
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.location.href="admin.php";';
		echo '</script>'; 

} //FIM DO IF

else{
		$_SESSION['errors']="Erro no Cadastro!";
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.location.href="admin.php";';
		echo '</script>'; 
		
	
	}
?>