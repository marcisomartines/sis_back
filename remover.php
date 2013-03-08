<?php
##cabeçalho padrao
require_once "header.php";

##pagina protegida
require_once "login.php";

include_once "db.php";

if(isset($_GET['id']) && !empty($_GET['id'])){
    $id=$_GET['id'];
    #conecta com o banco de dados
    #$cnx=mysql_connect('localhost','root','') or
    #        die("Não foi possivel conecta com o banco de dados");
    #mysql_select_db('sistema',$cnx);
} else{
    die("ID não encontrada");
}

if(isset($_POST['certeza']) && $_POST['certeza']=="sim"){
    $query="DELETE FROM users WHERE id=$id";
    $result=mysql_query($query,$cnx) or
            die("Erro na query: $query" . mysql_error());
    
    if($result){
        $_SESSION['info']="Cliente removido com sucesso";
    }else{
        $_SESSION['errors']="Erro ao remover cliente";
    }
    header("Location: /sis_back/listar.php");
}else{
    $query="SELECT id,nome,password,email FROM users WHERE id=$id";
    $result=mysql_query($query,$cnx) or
            die("Erro na query: $query" . mysql_error());
    
    $user=mysql_fetch_assoc($result);
    $login=$user['login'];
    $password=$user['password'];
    $email=$user['email'];
    
    ##titulo
    echo "<h3>Remover Usuario</h3>";
##formulario de edicao
?>
<form method="post" action="remover.php?id=<?=$id?>">
    <input type="hidden" name="id" id="id" value="<?=$id?>">
    
    <input type="hidden" name="certeza" value="sim">
    
    <label for="login">Login: </label>
    <input type="text" name="login" id="login" value="<?=$login?>">
    
    <label for="password">Password: </label>
    <input type="password" name="password" id="password" value="<?=$password?>">
    
    <label for="email">email: </label>
    <input type="text" name="email" id="email" value="<?=$email?>">
    
    <input type="submit" value="remover">
</form>
<?php
}
##rodape padrão
require_once "footer.php";
?>