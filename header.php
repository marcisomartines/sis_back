<?php
error_reporting(0);
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
session_start();
if(isset($_SESSION['nome'])){
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Suporte - Gerencial Informatica</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <script src="bootstrap/jquery-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <div class="container">
            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <a class="brand" href="#">Suporte</a>
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                        
                        <?php
                        /*verificando se é administrador
                          Se Sim Então mostrar menu administrador  
                          Se não Então não mostrar este menu.  
                        */
                        require_once "header.php";
                        ##Pagina Protegida

                        require_once "login.php";
                        include_once 'db.php';
                        $usuario2=$_SESSION['nome'];
                        $query2="SELECT tipo FROM users WHERE nome='$usuario2'";
                        $result2= mysql_query($query2,$cnx) or  die("Erro na query: $query2".myssql_error());
                        $users=mysql_fetch_assoc($result2);
                        $tipo=$users['tipo'];
                        ##menu
                        if($tipo=='a'){
                        echo "<li><a href='admin.php'>Administrador</a></li>";

                        }
                        //fim da verificação do menu.    
                        ?>


                        
                        <li><a href="tarefa.php">Tarefa</a></li>
                        <li><a href="listar.php">Listar</a></li>
                        <li><a href="grafico.php">Grafico</a></li>
                        <li><a href="altera.php">Alterar Senha</a></li>
                        <li><a href="logoff.php">Logoff</a></li>
                    </ul>
                    <?php
                    if(isset($_SESSION['nome']) and !empty ($_SESSION['nome'])){
                        $login=$_SESSION['nome'];
                        echo "<div class='pull-right'>Bem vindo $login</div>";
                    }
                    ?>
                </div>
            </div>
            <?php
            if(isset($_SESSION['errors']) and !empty($_SESSION['errors'])){
                $errors=$_SESSION['errors'];
                unset($_SESSION['errors']);
            ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4>Erro!</h4>
                <?=$errors;?>
            </div>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION['info']) and !empty($_SESSION['info'])){
                $info=$_SESSION['info'];
                $_SESSION['info']=array();
            ?>
            <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4>Info!</h4>
                <?=$info;?>
            </div>
            <?php
            }
            ?>
    </body>
</html>
<?php
}else{
?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Suporte - Gerencial Informatica</title>
        <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
    </head>
    <body>
        <script src="bootstrap/jquery-latest.js"></script>
        <script src="bootstrap/js/bootstrap.min.js"></script>
        <div class="container">
            <div class="navbar">
                <div class="navbar-inner">
                    <a class="brand" href="#">Suporte</a>
                    <ul class="nav">
                        <li><a href="index.php">Home</a></li>
                    </ul>
                    <?php
                    if(isset($_SESSION['login']) and !empty ($_SESSION['login'])){
                        $login=$_SESSION['login'];
                        echo "<div class='pull-right'>Bem vindo $login</div>";
                    }
                    ?>
                </div>
            </div>
            <?php
            if(isset($_SESSION['errors']) and !empty($_SESSION['errors'])){
                $errors=$_SESSION['errors'];
                unset($_SESSION['errors']);
            ?>
            <div class="alert alert-error">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4>Erro!</h4>
                <?=$errors;?>
            </div>
            <?php
            }
            ?>
            <?php
            if(isset($_SESSION['info']) and !empty($_SESSION['info'])){
                $info=$_SESSION['info'];
                $_SESSION['info']=array();
            ?>
            <div class="alert alert-info">
                <button type="button" class="close" data-dismiss="alert">x</button>
                <h4>Info!</h4>
                <?=$info;?>
            </div>
            <?php
            }
            ?>
    </body>
</html>
<?php
}
?>
