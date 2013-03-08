<?php
##cabeçlho padrao
require_once "header.php";
##pagina protegida
require_once "login.php";
include_once "db.php";

if(isset($_GET['id']) and !empty($_GET['id'])){
    $id=$_GET['id'];
    
##conectar com banco de dados
#$cnx = mysql_connect('localhost','root','')or
#        die("Erro ao conectar ao banco de dados");

#mysql_select_db('sistema',$cnx);

$query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,finalizado,observacao FROM clientes WHERE id=$id";

$result=  mysql_query($query,$cnx) or
        die("Erro na query: $query".myssql_error());

$clientes=mysql_fetch_assoc($result);

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
    die("ID não econtrada");
}
if(isset($finalizado))
    $finalizado='sim';
else
    $finalizado='nao';

##titulo
echo "<h3>Editar Cliente</h3>";

##formulario de edição
if($_SESSION['nome']=='denis'){//se for o gerente mostra essa parte
?>
<!--chamade de script para o calendario para definir a data-->
<link type="text/css" rel="stylesheet" href="calendar/calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="calendar/calendar.js?random=20060118"></script>
<!--Fim da chamada de script responsavel pelo calendario-->
<form method="post" action="processa_formulario.php">
    <input type="hidden" name="teste" id="teste" value="sim">
    <input type="hidden" name="id" id="id" value="<?=$id?>">
    
    <label for="codigo"> C&oacute;digo</label>
    <input type="text" value="<?=$codigo?>" readonly>

    <label for="nome">Empresa</label>
    <input type="text" value="<?=$nome?>" readonly>
    
    <label for="tecnico">Tecnico: </label>
    <select name="tecnico">
        <option value="<?=$tecnico?>"><?=$tecnico?></option>
        <option value=""> </option>
        <option value="Cabrera">Cabrera</option>
        <option value="Danilo">Danilo</option>
        <option value="Fernando">Fernando</option>
        <option value="Joaquim">Joaquim</option>
        <option value="Leandro">Leandro</option>
        <option value="Luis">Luis</option>
        <option value="Macedo">Macedo</option>
        <option value="Marcelo">Marcelo</option>
        <option value="Marciso">Marciso</option>
    </select>
    
    <label for="senha">Senha banco de dados: </label>
    <input type="text" name="senha" id="senha" value="<?=$senha?>">
    
    <label for="backup">Backup configurado: </label>
    <select name="backup">
        <option value="<?=$backup?>"><?=$backup?></option>
        <option value="Nao">Não</option>
        <option value="Sim">Sim</option>
    </select>
    
    <label for="prazo">Prazo para finalizar: </label>
    <input type="text" value="<?=$prazo?>" readonly name="prazo">
    <input type="button" value="Data" onclick="displayCalendar(document.forms[0].prazo,'dd-mm-yyyy',this)">
    <!--<input type="text" name="prazo" id="prazo" value="<?=$prazo?>">dd/mm/aaaa-->
    
    <label for="observacao">Observações: </label>
    <input type="text" name="observacao" id="observacao" value="<?=$observacao?>">
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form>
<?php
}else{//se for usuario comum mostra essa parte do codigo
?>
<form method="post" action="processa_formulario.php">
    <input type="hidden" name="teste" id="teste" value="nao">
    <input type="hidden" name="id" id="id" value="<?=$id?>">
    <input type="hidden" name="finalizado" value="<?=$finalizado?>">

    <label for="codigo"> C&oacute;digo</label>
    <input type="text" class="input-small" value="<?=$codigo?>" readonly>

    <label for="nome">Empresa</label>
    <input type="text" value="<?=$nome?>" readonly>
    
    <label for="senha">Senha banco de dados: </label>
    <input type="text" name="senha" id="senha" value="<?=$senha?>">
    
    <label for="backup">Backup configurado: </label>
    <select name="backup">
        <option value="<?=$backup?>"><?=$backup?></option>
        <option value="Nao">Não</option>
        <option value="Sim">Sim</option>
    </select>
    
    <!--<label for="prazo">Prazo para finalizar: </label>
    <input type="text" name="prazo" id="prazo" value="<?=$prazo?>">dd/mm/aaaa-->
    
    <label for="observacao">Observações: </label>
    <input type="text" name="observacao" id="observacao" value="<?=$observacao?>">
    <div class="control-group">
        <div class="controls">
            <button type="submit" class="btn btn-success">Salvar</button>
        </div>
    </div>
</form>
<?php
}
?>
<?php
##rodape padrão
require_once "footer.php";
?>