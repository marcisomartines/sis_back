<?php

/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/

require_once "login.php";
include_once 'db.php';
?>
<html>
<head>
<title> Cadastrar Usuários </title>
</head>

<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal"><i class='icon-user' title="Novo usuário"></i></a>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Cadastro de usuários</h3>
  </div>
  <div class="modal-body">
 
 <body>
<div align="center">
<form method="POST" action="usuario_salva.php">
<table  class="table">
	<tr>
	<th>Login </th>
	<!--Inserido parametro required nos input por Marciso 07/03/2013-->
	<td><input type="text" name="nome" size="30" required> </td>
	</tr>
	
	<tr>
	<th>E-mail </th>
	<td><input type="text" name="email" size="30" required> </td>
	</tr>
	
	<tr>
	<th>Senha </th>
	<td><input type="password" name="senha" size="30" required> </td>
	</tr>

	<tr>
	<th>Confirmar Senha </th>
	<td><input type="password" name="Csenha" size="30" required> </td>
	</tr>
	
	<tr>
	<th>Nivel de Acesso </th>
	<td><select name="tipo">
		<option value="" > - Selecione um acesso - </option>
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



  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>

</html>
