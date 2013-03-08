<?php
##cabeçlho padrao
require_once "header.php";
#pagina protegida
require_once "login.php";
#conexao com o banco de dados
include_once "db.php";

import_request_variables("P","form_");
//fazendo a verificação da senha se uma for diferente da outra retorna para página anterior
if($form_senha <> $form_Csenha){
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.alert("As senhas informadas são diferentes uma da outra!");';  
		echo 'window.history.go(-1);';
		echo '</script>'; 
		exit();
		
} //Fim da verificação.

$form_senha = md5($form_senha);

$query = "insert into users (nome,email,password,tipo,st) values ('$form_nome','$form_email','$form_senha','$form_tipo','a')";

if(mysql_query($query,$cnx) or die (mysql_error() )){ // INICIO IF

		echo '<script language="javascript" type="text/javascript">';
		echo 'window.alert("Usuário Cadastrado com Sucesso!");';  
		echo 'window.location.href="admin.php";';
		echo '</script>'; 

} //FIM DO IF

else{
	
		echo '<script language="javascript" type="text/javascript">';
		echo 'window.alert("Erro no Cadastro!");';  
		echo 'window.history.go(-1);';
		echo '</script>'; 
		
	
	}



?>