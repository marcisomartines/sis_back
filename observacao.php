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
<title> Obserções dos clientes</title>
</head>

<!-- Button to trigger modal -->
<a href="#myModal" role="button" class="btn" data-toggle="modal"><i class='icon-share' title="Observacao"></i></a>

<!-- Modal -->
<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
    <h3 id="myModalLabel">Observacao</h3>
  </div>
  <div class="modal-body">
 	<body>
		<div align="center">
			<table  class="table">
				<tr>
					<td>Testando essa bagaça!!!!</td>
				</tr>
			</table>
		</div>
	</body>
  </div>
  <div class="modal-footer">
    <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
  </div>
</div>
</html>