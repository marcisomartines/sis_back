<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
require_once "header.php";

if(!isset($_SESSION['login']) || empty($_SESSION['login'])){
?>
<form class="form-horizontal" action="login.php" method="post">
    <input type='hidden' name="form_login" value="true">
    <div class="control-group">
        <label class="control-label" for="inputNome">Nome</label>
        <div class="controls">
            <input type="text" name="nome" id="inputNome" placeholder="Nome" required>
        </div>
    </div>
    <div class="control-group">
        <label class="control-label" for="inputPassword">Password</label>
        <div class="controls">
            <input type="password" name="password" id="inputPassword" placeholder="Password" required>
        </div>
    </div>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Entrar</button>
        </div>
    </div>
</form>
<?php
//require_once "footer.php";
}else{
    $_SESSION['info']="Você ja esta logado.";
    header("Location: /sis_back/tarefa.php");
}
?>