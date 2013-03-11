<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
##Cabeçalho padrão

require_once "header.php";
##Pagina Protegida

require_once "login.php";
include_once 'db.php';

$usuario2=$_SESSION['nome'];
$query2="SELECT tipo FROM users WHERE nome='$usuario2'";
$result2= mysql_query($query2,$cnx) or
        die("Erro na query: $query2".myssql_error());
$users=mysql_fetch_assoc($result2);
$tipo=$users['tipo'];
##titulo
if($tipo=='a'){
    echo "<div class='input-append'>";
    echo "  <form action='' method='GET'>";
    echo "      <select name='listar' selected onchange='this.form.submit();'>";
    echo "          <option value='todos'>Todos</option>";
    echo "          <option value='pendentes'>Pendentes</option>";
    echo "          <option value='finalizado'>Finalizado</option>";
    echo "          <option value='natribuidos'>N&atilde;o Atribuido</option>";
    echo "      </select>";
    echo "      <button type='submit' class='btn btn-success'>Filtrar</button>";
    echo "  </form>";
    echo "</div>";
}else{
    echo "<div class='input-append'>";
    echo "  <form action='' method='GET'>";
    echo "      <select name='listar' selected onchange='this.form.submit();'>";
    echo "          <option value=''>Todos</option>";
    echo "          <option value='pendentes'>Pendentes</option>";
    echo "          <option value='finalizado'>Finalizado</option>";
    echo "       </select>";
    echo "       <button type='submit' class='btn btn-success'>Filtrar</button>";
    echo "  </form>";
    echo "</div>";
}

@$listar=$_GET['listar']; //Alterado de POST para GET para carregar variavel listar para outra página: editar.php Adicionado: Danilo 27/02/13 

echo "<h3>Lista de clientes ".$listar."</h3>";

##consultar usuarios
if($tipo=='a'){
    if($listar=='pendentes')
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Nao' OR backup='' and st='a'";
    else if($listar=='finalizado')
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Sim' and st='a'";
    else if($listar=='natribuidos')
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE tecnico='' and st='a'";
    else
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE st='a'";
}else{
    if($listar=='pendentes')
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup<> 'Sim' and st='a' ";
    else if($listar=='finalizado')
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Sim' and st='a'";
    else
        $query="SELECT codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE st='a' ";
}
$result=mysql_query($query,$cnx) or
        die("Erro na query: $query<br>".mysql_error());

#listar usuario
echo "<table class='table table-bordered'>";
//primeira linha(nome das colunas)
$clientes=mysql_fetch_assoc($result);
$keys=array_keys($clientes);
echo "<tr>";
foreach($keys as $column){
    echo "<th>$column</th>";
}
echo "<th>editar</th>";
echo "</tr>";
//lista de usuario
do{
    if($tipo=='a'){
        if($clientes['backup']!='Sim')
        {
            echo "<tr bgcolor='#FF9999'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $codigo=$clientes['codigo'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?codigo=$codigo&listar=$listar'><i class='icon-edit'></i></a>"; //Adicionado listar=$listar parametro para passar p/ editar.php adicionado: Danilo 27/02/13
            #echo "<a class='btn' href='remover.php?id=$id'><i class='icon-remove'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $codigo=$clientes['codigo'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?codigo=$codigo&listar=$listar'><i class='icon-edit'></i></a>";//Adicionado listar=$listar parametro para passar p/ editar.php adicionado: Danilo 27/02/13
            #echo "<a class='btn' href='remover.php?id=$id'><i class='icon-remove'></i></a>";
            echo "</td>";
            echo "</tr>";   
        }
    }
    else if($_SESSION['nome']==strtolower($clientes['tecnico'])){
        if($clientes['backup']!='Sim')
        {
            echo "<tr bgcolor='#FF9999'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $codigo=$clientes['codigo'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?codigo=$codigo&listar=$listar'><i class='icon-edit'></i></a>";//Adicionado listar=$listar parametro para passar p/ editar.php adicionado: Danilo 27/02/13
            echo "</td>";
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $codigo=$clientes['codigo'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?codigo=$codigo&listar=$listar'><i class='icon-edit'></i></a>";//Adicionado listar=$listar parametro para passar p/ editar.php adicionado: Danilo 27/02/13
            echo "</td>";
            echo "</tr>";   
        }
    }
}while($clientes=  mysql_fetch_assoc($result));
echo "</table>";
##rodapé padrão
require_once "footer.php";
?>