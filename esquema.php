<html>
<head>
<!--chamade de script para o calendario para definir a data-->
<link type="text/css" rel="stylesheet" href="calendar/calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="calendar/calendar.js?random=20060118"></script>
<!--Fim da chamada de script responsavel pelo calendario-->
</head>
<?php

/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/

require_once("header.php");
require_once "login.php";
include_once 'db.php';



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
  echo '<form action="esquema_salvar.php" method="post">';
  echo  '<input type="hidden" name="tecnico" value="'.$nome.'">';
 /*
    INICIO 1º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM DO 1º SELECT 

   /*
    INICIO 2º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 2º SELECT

   /*
    INICIO 3º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 3º SELECT

   /*
    INICIO 4º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 4º SELECT

   /*
    INICIO 5º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 5º SELECT

   /*
    INICIO 6º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 6º SELECT

   /*
    INICIO 7º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 7º SELECT

   /*
    INICIO 8º SELECT.
 */
  echo   '<select name="id[]">';
  echo   '<option value="">    - Selecione um Cliente -    </option>';
  echo    $sql2 = "select*from clientes where clientes.backup <> 'Sim' and clientes.backup <> 'Nao' and tecnico = '' and st='a'";
          $resultado = mysql_query($sql2,$cnx);
           while($dados = mysql_fetch_assoc ($resultado)){
               
               $id =     $dados['id'];
               $codigo = $dados['codigo'];
               $nome =   $dados['nome'];

  echo '<option value="'.$id.'">'.$codigo.' '.$nome.'</option>';
          
          }
  echo '</select>';#FIM 8º SELECT

$form++; //diferenciar a quantidade do form no displayCalendar  
// usei $form-1 para iniciar no zero.

?>




<input type='text' name='prazo'>
<input type="button" value="Data" onclick="displayCalendar(document.forms['<?php echo $form-1 ?>'].prazo,'dd-mm-yyyy',this)">
<button type="submit" class="btn btn-success">Salvar</button> 
<button type="reset" class="btn">Limpar</button>

<?php

          ;
  echo '</form>';
  echo '</div>';
  echo '</div>';
  echo '</div>'; 
  echo '</div>';
  
}
?>
</html>
