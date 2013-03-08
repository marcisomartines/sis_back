<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/*Formulario para alterar a senha e email do usuario		   */
/***************************************************************/
##cabeçalho padrão
require_once "header.php";
##pagina protegida
require_once "login.php";
#conexao com banco de dados
@include_once "dp.php";
##titulo
echo "<h3>Alterar Senha</h3>";
$nome=$_SESSION['nome'];//recupera o nome da pessoa que esta logada

$query="SELECT id, nome, email, password FROM users WHERE nome='$nome'";

$result=mysql_query($query,$cnx) or
        die("Erro na query: $query".myssql_error());

$usuario=mysql_fetch_assoc($result);

$id=$usuario['id'];
$email=$usuario['email'];
##Formulario de cadastro
?>
<form method="post" action="altera_senha.php">
	<inpu type='hidden' name="nome" value="$nome">
	<label for="email">E-mail</label>
	<input type='text' name='email' id='email' value="<?=$email?>">
    <label for="password">Senha</label>
    <input type="password" name="password" id="password">
    <div class="control-group">
    	<div class="controls">
    		<button type="submit" class="btn btn-success">Alterar</button>
    	</div>
    </div>
</form>
<?php
##rodape padrão
require_once 'footer.php';
?>
