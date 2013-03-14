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
    <li><a href="#tab1" data-toggle="tab"> Esquema </a></li>
  </ul>
  <div class="tab-content">
  <div class="tab-pane" id="tab1">     
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
  echo   '<select name="id">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$nome.'</option>';
  //echo '</select>';
          
          }
  echo '</select>';

  echo   '<select name="id">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$nome.'</option>';
  //echo '</select>';
          
          }
  echo '</select>';

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