<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
##Cabeçalho padrão

require_once "header.php";
##Pagina Protegida

require_once "login.php";
include_once 'db.php';

##recebendo id do usuário
$id = $_GET['id'];

##Fazendo o select na tabela para pegar os dados para edição.
$sql = "select * from users where id = $id";
$query = mysql_query($sql,$cnx) or die (mysql_error());
             while ($dado = mysql_fetch_array($query)) {
             $id = $dado ['id'];
             $nome = $dado ['nome'];
             $email = $dado ['email'];
             $tipo = $dado ['tipo'];

}
?>
<html>
<head>
<title> Editar Usuário </title>
</head>
<body>
<div align="center">
<form name="form_usuario" method="POST" action="usuario_update.php">
<table  class="table">
	<input type='hidden' name='id' value='<?php echo $id ?>'>
	<tr>
	<th>Nome Usu&aacuterio </th>
	<td><input type="text" name="nome" value='<?php echo $nome ?>'></td>
	</tr>
	
	<tr>
	<th>E-mail </th>
	<td><input type="text" name="email" value='<?php echo $email ?>'> </td>
	</tr>
	
	<tr>
	<th>Nivel de Acesso </th>
	<td><select name="tipo">
		<option value="<?=$tipo?>" > <?php echo $tipo ?> </option>
		<option value="c" > -Usuário comum - </option>
		<option value="a" > - Administrador - </option>
		</select>
	</tr>

	<tr>
	<td></td>
	<td> <button class="btn btn-success" type="submit"> Gravar </button>  <button class="btn" type="reset"> Limpar </button> </td>
	</tr>
	
</table>

</form>
</div>
</body>	
</html>
<?php
##rodapé padrão
require_once "footer.php";
?>