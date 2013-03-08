<?php
##pagina Protegida
require_once "login.php";
include_once "db.php";

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
    	$query="UPDATE clientes SET tecnico='$tecnico',senha='$senha',backup='$backup',prazo='$prazo',observacao='$observacao' WHERE id=$id";
    else if($teste=='nao' and (isset($senha)) and $backup=='Sim' and $finalizado='nao')
    	$query="UPDATE clientes SET senha='$senha', backup='$backup',finalizado='$hoje',observacao='$observacao' WHERE id=$id";
    else if($teste=='nao' and (isset($senha)) and $backup=='Nao')
        $query="UPDATE clientes SET senha='$senha', backup='$backup',observacao='$observacao' WHERE id=$id";
    else if($teste=='nao' and $finalizado=='sim')
    	$query="UPDATE clientes SET senha='$senha', backup='$backup',observacao='$observacao' WHERE id=$id";
} else {
    die("ID não encontrada");
}

#$cnx=mysql_connect("localhost","root",'')or
#        die("Erro ao conectar com o banco de dados");

#mysql_select_db("sistema",$cnx);

$result=mysql_query($query,$cnx) or
        die("Erro na query: $query<br>".mysql_error());

if($result){
    $_SESSION['info']="Cliente atualizado com sucesso!";
}else {
    $_SESSIO['errors']="Erro ao atualizar usuário!";
}

header("Location: /sis_back/tarefa.php");
?>
