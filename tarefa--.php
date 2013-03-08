<?php
##Cabeçalho padrão

require_once "header.php";
##Pagina Protegida

require_once "login.php";
include_once 'db.php';
##titulo
if($_SESSION['nome']=='denis'){
    echo "<div class='input-append'>";
    echo "  <form action='' method='post'>";
    echo "      <select name='listar' selected>";
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
    echo "  <form action='' method='post'>";
    echo "      <select name='listar' selected>";
    echo "          <option value=' '>Todos</option>";
    echo "          <option value='pendentes'>Pendentes</option>";
    echo "          <option value='finalizado'>Finalizado</option>";
    echo "       </select>";
    echo "       <button type='submit' class='btn btn-success'>Filtrar</button>";
    echo "  </form>";
    echo "</div>";
}
$listar=$_POST['listar'];
echo "<h3>Lista de clientes ".$listar."</h3>";

##consultar usuarios
if($_SESSION['nome']=='denis'){
    if($listar=='pendentes')
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Nao' OR backup=''";
    else if($listar=='finalizado')
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Sim'";
    else if($listar=='natribuidos')
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE tecnico=''";
    else
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes";
}else{
    if($listar=='pendentes')
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Nao' OR backup=''";
    else if($listar=='finalizado')
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes WHERE backup='Sim'";
    else
        $query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,observacao FROM clientes";
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
echo "<td></td>";
echo "</tr>";
//lista de usuario
do{
    if($_SESSION['nome']=='denis'){
        if($clientes['backup']!='Sim')
        {
            echo "<tr bgcolor='#FF9999'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $id=$clientes['id'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?id=$id'><i class='icon-edit'></i></a>";
            #echo "<a class='btn' href='remover.php?id=$id'><i class='icon-remove'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $id=$clientes['id'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?id=$id'><i class='icon-edit'></i></a>";
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
            $id=$clientes['id'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?id=$id'><i class='icon-edit'></i></a>";
            echo "</td>";
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            $id=$clientes['id'];
            echo "<td>";
            echo "<a class='btn' href='editar.php?id=$id'><i class='icon-edit'></i></a>";
            echo "</td>";
            echo "</tr>";   
        }
    }
}while($clientes=  mysql_fetch_assoc($result));
echo "</table>";
##rodapé padrão
require_once "footer.php";
?>