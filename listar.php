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
$obs=0;
do{
        if($clientes['backup']!='Sim')
        {
            $count=0;
            echo "<tr bgcolor='#FF9999'>";//linhas em verde
            foreach($clientes as $column){
                if($count==7){
                $count=0;
                echo "<td>";?>
                <!-- Botão que inicia o modal -->
                <a href="#myModal<?=$obs?>" role="button" class="btn" data-toggle="modal"><i class='icon-share' title="Observa&ccedil;&atilde;o"></i></a>
                <!-- Modal -->
                <div id="myModal<?=$obs?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                        <h3 id="myModalLabel">Observa&ccedil;&atilde;o</h3>
                    </div>
                    <div class="modal-body">
                        <body>
                            <div align="center">
                                <table  class="table">
                                    <tr>
                                        <td><?=$column?></td>
                                    </tr>
                                </table>
                            </div>
                        </body>
                    </div>
                    <div class="modal-footer">
                        <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                    </div>
                </div><?php
                echo "</td>";
                $obs++;
                }else{
                    echo "<td>$column</td>";
                    $count++;
                    $obs++;
                }
            }
            echo "</tr>";
        }
        else{
            echo "<tr bgcolor='#BFFFCF'>";//linhas em vermelho
            foreach($clientes as $column){
                //se for a coluna da observação ele entra no if para imprimir o botaão e o modal
                if($count==7){
                    $count=0;
                    echo "<td>";?>
                    <!-- Botão que inicia o modal -->
                    <a href="#myModal<?=$obs?>" role="button" class="btn" data-toggle="modal"><i class='icon-share' title="Observa&ccedil;&atilde;o"></i></a>

                    <!-- Modal -->
                    <div id="myModal<?=$obs?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                            <h3 id="myModalLabel">Observa&ccedil;&atilde;o</h3>
                        </div>
                        <div class="modal-body">
                            <body>
                                <div align="center">
                                    <table  class="table">
                                        <tr>
                                            <td><?=$column?></td>
                                        </tr>
                                    </table>
                                </div>
                            </body>
                        </div>
                        <div class="modal-footer">
                            <button class="btn" data-dismiss="modal" aria-hidden="true">Fechar</button>
                        </div>
                    </div><?php
                    echo "</td>";
                    $obs++;
                    }else{
                        echo "<td>$column</td>";
                        $count++;
                        $obs++;
                    }
                }
                echo "</tr>";   
            }
}while($clientes=  mysql_fetch_assoc($result));
echo "</table>";
##rodapé padrão
require_once "footer.php";
?>