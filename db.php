<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/*Script responsavel pela conexao com o servidor               */
/***************************************************************/
$host='localhost';
$user='root';
$senha='';
$db='sistema';


$cnx=mysql_connect($host,$user,$senha) or
	die("Erro ao conectar ao banco de dados.");

mysql_select_db($db,$cnx) or
	die("Erro ao selecionar o banco de dados.");