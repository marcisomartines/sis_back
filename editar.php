<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/*Formulario para a edição das informações do clientes e       */
/*atribui-lo, quando gerente, a um determinado tecnico         */
/***************************************************************/
//recebendo dados dod Lista
$listar = $_GET['listar']; //recebendo variavel listar que esta vindo da pagina tarefa.php adionado: Danilo 27/02/13

##cabeçlho padrao
require_once "header.php";
#pagina protegida
require_once "login.php";
#conexao com o banco de dados
include_once "db.php";
//verifica se foi passado um codigo para o clientes
if(isset($_GET['codigo']) and !empty($_GET['codigo'])){
    $id=$_GET['codigo'];
#query com informações do clientes    
$query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,finalizado,observacao FROM clientes WHERE codigo='$id'";
$usuario=$_SESSION['nome'];//recebe o nome de que esta logado
$query2="SELECT tipo FROM users WHERE nome='$usuario'";//determina se o usuario é administrador ou comum
#resultado com informações do cliente
$result=  mysql_query($query,$cnx) or
        die("Erro na query: $query".myssql_error());
#resultado com informação do usuario
$result2= mysql_query($query2,$cnx) or
        die("Erro na query: $query2".myssql_error());

$clientes=mysql_fetch_assoc($result);
$users=mysql_fetch_assoc($result2);
$tipo=$users['tipo'];//recebe 'a' se administrado ou 'c' caso seja usuario comum
#informações do cliente
$id=$clientes['id'];
$codigo=$clientes['codigo'];
$nome=$clientes['nome'];
$tecnico=$clientes['tecnico'];
$senha=$clientes['senha'];
$backup=$clientes['backup'];
$prazo=$clientes['prazo'];
$finalizado=$clientes['finalizado'];
$observacao=$clientes['observacao'];
}
else{
    die("CODIGO não econtrada");
}
if(isset($finalizado))
    $finalizado='sim';
else
    $finalizado='nao';

##titulo
echo "<h3>Editar Cliente</h3>";

##formulario de edição
if($tipo=='a'){//se for o gerente mostra essa parte
?>
<!--chamade de script para o calendario para definir a data-->
<link type="text/css" rel="stylesheet" href="calendar/calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="calendar/calendar.js?random=20060118"></script>
<!--Fim da chamada de script responsavel pelo calendario-->
<form method="post" action="processa_formulario.php">
	<input type="hidden" name="listar"  value="<?php echo $listar ?>"> <!--adicionado variavel listar para passa para pagina processa_formulario.php adicionado: Danilo 27/02/13-->
    <input type="hidden" name="teste" id="teste" value="sim">
    <input type="hidden" name="id" id="id" value="<?=$codigo?>">
    
    <label for="codigo"> C&oacute;digo</label>
    <input type="text" value="<?php echo $codigo?>" readonly>

    <label for="nome">Empresa</label>
    <input type="text" value="<?php echo $nome?>" readonly>

    <label for="tecnico">Tecnico: </label>
    <?php
    $oreia="SELECT nome FROM users WHERE st='a'";
    $select=mysql_query($oreia,$cnx) or
        die("Erro na query: $query<br>".mysql_error());

    #listar usuarip
    echo "<select name='tecnico'>";
    echo "<option value=''></option>";
    while($chave = mysql_fetch_assoc ($select)){
        $nome =  $chave['nome'];
        if(strtolower($tecnico)== $nome)
            echo '<option value="'.$nome.'" selected>'.ucfirst($nome).'</option>';    
        else
            echo '<option value="'.$nome.'">'.ucfirst($nome).'</option>';
    }
    echo "</select>";
    ?>
    
    <label for="senha">Senha banco de dados: </label>
    <input type="text" name="senha" id="senha" value="<?php echo $senha?>">
    
    <label for="backup">Backup configurado: </label>
    <?php
        echo "<select name='backup'>";
        echo "<option value=''> </option>";//opção colocada para caso queira limpar o conteudo ou não tenha nenhum tecnico atribuido
        if(strtolower($backup)=='sim')//se o backup esta como sim, ele traz como padrão o sim ja selecionado
            echo "<option value='Sim' selected>Sim</option>";
        else
            echo "<option value='Sim'>Sim</option>";
        if($backup=='Nao')//se o backup esta como Nao, ele traz como padrão o Nao ja selecionado
            echo "<option value='Nao' selected>N&atilde;o</option>";
        else
            echo "<option value='Nao'>N&atilde;o</option>";
        echo "</select>";
    ?>
    <!--Mostra a sistuação do cliente, a=ativo e c=inativo-->
    <label for="status">Situa&ccedil;&atilde;o do cliente: </label>
    <?php
        echo "<select name='status'>";
        if(strtolower($backup)=='a')//se o esta ativo traz o sim 
            echo "<option value='a' selected>Ativo</option>";
        else
            echo "<option value='a'>Ativo</option>";
        if($backup=='Nao')//se o backup esta como Nao, ele traz como padrão o Nao ja selecionado
            echo "<option value='c' selected>Inativo</option>";
        else
            echo "<option value='c'>Inativo</option>";
        echo "</select>";
    ?>
    
    <label for="prazo">Prazo para finalizar: </label>
    <input type="text" value="<?php echo $prazo?>" readonly name="prazo">
    <input type="button" value="Data" onclick="displayCalendar(document.forms[0].prazo,'dd-mm-yyyy',this)">
    <!--<input type="text" name="prazo" id="prazo" value="<?php echo $prazo?>">dd/mm/aaaa-->
    
    <label for="observacao">Observações: </label>
    <!--<input type="text" name="observacao" id="observacao" value="<?php echo $observacao?>">-->
    <textarea rows="3" name="observacao" id="observacao" value="<?php echo $observacao?>"><?php echo $observacao?></textarea>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success" data-loading-text="Salvando...">Salvar</button>
        </div>
    </div>
</form>
<?php
}else{//se for usuario comum mostra essa parte do codigo
?>
<form method="post" action="processa_formulario.php">
	<input type="hidden" name="listar"  value="<?php echo $listar ?>"><!--adicionado variavel listar para passar para pagina processa_formulario.php adicionado: Danilo 27/02/13-->
    <input type="hidden" name="teste" id="teste" value="nao">
    <input type="hidden" name="id" id="id" value="<?php echo $codigo?>">
    <input type="hidden" name="finalizado" value="<?php echo $finalizado?>">

    <label for="codigo"> C&oacute;digo</label>
    <input type="text" class="input-small" value="<?php echo $codigo?>" readonly>

    <label for="nome">Empresa</label>
    <input type="text" value="<?php echo $nome?>" readonly>
    
    <label for="senha">Senha banco de dados: </label>
    <input type="text" name="senha" id="senha" value="<?php echo $senha?>">
    
    <label for="backup">Backup configurado: </label>
    <select name="backup">
        <option value="<?php echo $backup?>"><?php echo $backup?></option>
        <option value="Nao">Não</option>
        <option value="Sim">Sim</option>
    </select>
    <!--Mostra a sistuação do cliente, a=ativo e c=inativo-->
    <label for="status">Situa&ccedil;&atilde;o do cliente: </label>
    <?php
        echo "<select name='status'>";
        if(strtolower($backup)=='a')//se o esta ativo traz o sim 
            echo "<option value='a' selected>Ativo</option>";
        else
            echo "<option value='a'>Ativo</option>";
        if($backup=='Nao')//se o backup esta como Nao, ele traz como padrão o Nao ja selecionado
            echo "<option value='c' selected>Inativo</option>";
        else
            echo "<option value='c'>Inativo</option>";
        echo "</select>";
    ?>
    
    <label for="observacao">Observações: </label>
    <textarea rows="3" name="observacao" id="observacao" value="<?php echo $observacao?>"><?php echo $observacao?></textarea>
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form>
<?php
}//fecha o else que executa o formulario para usuario comum
?>
<?php
##rodape padrão
require_once "footer.php";
?>