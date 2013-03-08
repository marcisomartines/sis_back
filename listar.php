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
##titulo
echo "<h3>Lista de Clientes</h3>";

##conectar no banco de dados
#$cnx=mysql_connect("localhost","root",'')or
#        die("Erro ao conectar com o banco de dados");
#mysql_select_db("sistema",$cnx);
##consultar usuarios
$query="SELECT codigo,nome,tecnico,senha,backup,prazo,finalizado,observacao FROM clientes WHERE st='a'";
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
            $count=0;
            echo "<tr bgcolor='#FF9999'>";//linhas em verde
            foreach($clientes as $column){
                if($count==7){
                $count=0;
                    $codigo=$clientes['codigo'];
                    echo "<td>";
                    include ('observacao.php');
                    echo "</td>";
                    }else{
                        echo "<td>$column</td>";
                        $count++;
                }
            }
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";//linhas em vermelho
            foreach($clientes as $column){
                if($count==7){
                    $count=0;
                    $codigo=$clientes['codigo'];
                    echo "<td>";
                    include ('observacao.php');
                    echo "</td>";
                    }else{
                        echo "<td>$column</td>";
                        $count++;
                }
            }
            echo "</tr>";   
        }
}while($clientes=  mysql_fetch_assoc($result));
echo "</table>";
##rodapé padrão
require_once "footer.php";
?>