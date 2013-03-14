<?php 

/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/

##Cabeçalho padrão
require_once ("header.php");
require_once ("esquema.php");

##Pagina Protegida
require_once "login.php";
include_once 'db.php';

##Recebendo Variaveis da Página esquema.php
$tecnico = $_POST['tecnico'];
$idi = $_POST['id'];
$prazo = $_POST['prazo'];
$prazo=implode("-",array_reverse(explode("-",$prazo))); //usei o mesmo que esta em processa_formulario.php
foreach($idi as $id){ // INICIO FOREACH

if($prazo==''){
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.alert("O campo data esta em branco!\nUsuário '.$tecnico.' ");'; 
        echo ' window.history.go(-1)';
        echo '</script>';
        exit();
}
$sql = "UPDATE clientes SET tecnico='$tecnico', prazo='$prazo' WHERE id='$id' ";
//echo $sql;
if(mysql_query($sql,$cnx) or die (mysql_error() )){ // INICIO IF
        $_SESSION['info']="Usuário vinculado com sucesso!";
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.location.href="esquema.php";';
        echo '</script>';
} //FIM DO IF
else{ //INICIO ELSE
        $_SESSION['errors']="Erro ao salvar!";
        echo '<script language="javascript" type="text/javascript">';
        echo 'window.location.href="esquema.php";';
        echo '</script>';
 }//FIM ELSE
}// FIM FOREACH
?>