<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/

##Cabeçalho padrão
require_once ("header.php");

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
if($tipo<>'a'){
  echo    "<div class='alert alert-error'>";
  echo " Desculpe área reservada somente para o administrador do sistema";
  exit();
  echo    "</div>";


}
?>
<html>
<head>
<title> Painel Administrativo </title>
</head>
<div class="tabbable"> <!-- Only required for left/right tabs -->
  <ul class="nav nav-tabs">
    <li class="active"><a href="#tab1" data-toggle="tab"> Usuários </a></li>
    <li><a href="#tab2" data-toggle="tab"> Esquema </a></li>
  </ul>
  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <?php 
      
      if($tipo=='a'){
//INICIO DO BOTÃO NOVO USUÁRIO-->
      require_once ("usuario.php");
//FIM DOS BOTÃO-->


      echo "<table class='table table-bordered'>";
      echo "<tr>";
      echo "<th> Cód. </th>"; 
      echo "<th> Nome </th>";
      echo "<th> E-mail </th>";
      echo "<th> Tipo </th>";
      echo "<th> Editar </th>";
            $sql = "select * from users";
            $query = mysql_query($sql,$cnx) or die (mysql_error());
             while ($dado = mysql_fetch_array($query)) {
             $id =    $dado ['id'];
             $nome =  $dado ['nome'];
             $email = $dado ['email'];
             $tipo =  $dado ['tipo'];
             $st =    $dado ['st'];

      echo "<tr>";
      echo "<td>$id </td>";
      echo "<td>$nome </td>";
      echo "<td>$email </td>";
      echo "<td>$tipo </td>";
      echo "<td><div align ='center'>";
      echo "<a class='btn' href='usuario_editar.php?id=$id'><i class='icon-edit'></i></a>";
            //fazendo a comparação do ST do usuário
            if($st=='a'){
            //se for st = 'a' então imprime a linha abaixo
            echo "<a class='btn' href='usuario_desativar.php?id=$id'><i class='icon-minus-sign'></i></a>";  

            }
            else{
             //senão for ='a' então imprime a linha abaixo 
             echo "<a class='btn' href='usuario_ativar.php?id=$id'><i class='icon-ok-sign'></i></a>";

            }
            //fim da comparação. Verificar se não vai dar nenhum erro.

      echo "</div>";
      echo "</td>";
      echo "</tr>";
    }

}

echo "</table>";
      ?>
    </div>
    <div class="tab-pane" id="tab2">     
<?php           
            $sql = "select * from users where st='a' ";
            $query = mysql_query($sql,$cnx) or die (mysql_error());
            while ($dado = mysql_fetch_array($query)) {
            $id =    $dado ['id'];
            $nome =  $dado ['nome'];
            $email = $dado ['email'];
            $tipo =  $dado ['tipo'];
            $st =    $dado ['st'];
  echo '<div class="accordion" id="accordion2">';
  echo '<div class="accordion-group">';
  echo '<div class="accordion-heading">';
  echo '<a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#'.$nome.'">';
  echo $nome;
  echo '</a>';
  echo '</div>';
  echo '<div id="'.$nome.'" class="accordion-body collapse">';
  echo '<div class="accordion-inner">';
  echo   '<select name="id_serie">';
  echo   '<option value="">    - Selecione uma S&eacuterie -    </option>';
  echo    $query = 'select * from clientes';
          $resultado = mysql_query($query,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               $id_serie = $dados['id_serie'];
               $serie = $dados['serie'];
            
  echo '<option value='$id_serie'>$serie</option>';
  echo '</select>';
          
          }
          ;
  echo '</div>';
  echo '</div>';
  echo '</div>'; 
  echo '</div>';
}
?>
    </div>
  </div>
</div>

<?php
##rodape padrão
require_once "footer.php";
?>
</html>