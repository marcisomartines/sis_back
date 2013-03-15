<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
##cabeçalho padrão
require_once"header.php";
include_once "db.php";
if(!isset($_POST['form_login'])){
    if(!isset($_SESSION['nome'])){
    #    $_SESSION['errors']="Você não esta logado!";
        header("Location: /sis_back/form_login.php");
    }
}else{
    $nome=$_POST['nome'];
    $password=$_POST['password'];
    
    #$cnx=mysql_connect('localhost','root')or
    #        die("Erro ao conectar com o banco dados.");
    #mysql_select_db('sistema',$cnx) or
    #        die("Erro ao selecionar o banco de dados");
    $query="SELECT nome FROM users WHERE nome='$nome' and password=MD5('$password') and st='a'";
    $result=mysql_query($query) or
        die("Erro na query: $query".mysql_error());
    if(mysql_num_rows($result)==1){//logado com sucesso
        $reg=mysql_fetch_assoc($result);
        $_SESSION['nome']=$reg['nome'];
        //print_r($_SESSION);
        header("Location: /sis_back/tarefa.php");
    }else{//falha no login
        $_SESSION['errors']="Login/senha invalidos";
        header("Location:/sis_back/form_login.php");
    }
}
?>
