<?php
##Cabeçalho padrão

require_once "header.php";
##Pagina Protegida

require_once "login.php";
include_once 'db.php';
##titulo
echo "<h3>Lista de Clientes</h3>";

##conectar no banco de dados
#$cnx=mysql_connect("localhost","root",'')or
#        die("Erro ao conectar com o banco de dados");
#mysql_select_db("sistema",$cnx);
##consultar usuarios
$query="SELECT id,codigo,nome,tecnico,senha,backup,prazo,finalizado,observacao FROM clientes";
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
echo "</tr>";
//lista de usuario
do{
        if($clientes['backup']!='Sim')
        {
            echo "<tr bgcolor='#FF9999'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";
            foreach($clientes as $column){
                echo "<td>$column</td>";
            }
            echo "</tr>";   
        }
}while($clientes=  mysql_fetch_assoc($result));
echo "</table>";
##rodapé padrão
require_once "footer.php";
?>