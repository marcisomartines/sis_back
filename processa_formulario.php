<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
##pagina Protegida

require_once "login.php";
include_once "db.php";

//recebendo dados dod Lista
$listar = $_POST['listar']; //recebedo variavel listar que esta vindo da pagina editar.php adicionado: Danilo 27/02/13

$tecnico=$_POST['tecnico'];
$senha=$_POST['senha'];
$backup=$_POST['backup'];
$prazo=$_POST['prazo'];
$finalizado=$_POST['finalizado'];
$hoje=date("Y-m-j");
$prazo=implode("-",array_reverse(explode("-",$prazo)));
$observacao=$_POST['observacao'];
$teste=$_POST['teste'];

if(isset($_POST['id']) and !empty($_POST['id'])){
    $id=$_POST['id'];
    #echo $prazo;
    if($teste=='sim')
    	$query="UPDATE clientes SET tecnico='$tecnico',senha='$senha',backup='$backup',prazo='$prazo',observacao='$observacao' WHERE codigo=$id ";
    else if($teste=='nao' and (isset($senha)) and $backup=='Sim' and $finalizado='nao')
    	$query="UPDATE clientes SET senha='$senha', backup='$backup',finalizado='$hoje',observacao='$observacao' WHERE codigo=$id";
    else if($teste=='nao' and (isset($senha)) and $backup=='Nao')
        $query="UPDATE clientes SET senha='$senha', backup='$backup',observacao='$observacao' WHERE codigo=$id";
    else if($teste=='nao' and $finalizado=='sim')
    	$query="UPDATE clientes SET senha='$senha', backup='$backup',observacao='$observacao' WHERE codigo=$id";
} else {
    echo $id;
    die("ID não encontrada");
}

$result=mysql_query($query,$cnx) or
        die("Erro na query: $query<br>".mysql_error());

if($result){
    $_SESSION['info']="Cliente atualizado com sucesso!";
}else {
    $_SESSIO['errors']="Erro ao atualizar usuário!";
}

echo '<script language="javascript" type="text/javascript">'; //adicionado Danilo(27/02/13). Volta para pagina tarefa.php com o ultimo filtro solicitado.
echo 'window.location="tarefa.php?listar='.$listar.' " '; 
echo '</script>';
?>
