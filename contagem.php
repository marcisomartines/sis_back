<html>
<head>
<!--chamade de script para o calendario para definir a data-->
<link type="text/css" rel="stylesheet" href="calendar/calendar.css?random=20051112" media="screen"></LINK>
<SCRIPT type="text/javascript" src="calendar/calendar.js?random=20060118"></script>
<!--Fim da chamada de script responsavel pelo calendario-->
</head>
<form method='post' class="form-search">
<?php

/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/

require_once("header.php");
require_once "login.php";
include_once 'db.php';


  echo   '<select name="nome">';
  echo   '<option value="">    - Selecione um usuário -    </option>';

          $sql = "select * from users where st='a' ";
          $resultado = mysql_query($sql,$cnx);
           while($dado = mysql_fetch_assoc ($resultado)){
                $id =    $dado ['id'];
                $nome =  $dado ['nome'];
                $st =    $dado ['st'];

  echo '<option value="'.$nome.'">'.$nome.'</option>';
          
          }
?>
    <input type="text" class="span2 search-query" name='inicio' value="<?php echo $inicio = $_POST['inicio'] ?>" readonly>
    <button type="button" class="btn" value="Data" onclick="displayCalendar(document.forms['0'].inicio,'dd-mm-yyyy',this)">Inicio</button>
    <input class="span2 search-query" type='text' name='final' value="<?php echo $final = $_POST['final'] ?>" readonly>
    <button type="button" class="btn" value="Data" onclick="displayCalendar(document.forms['0'].final,'dd-mm-yyyy',this)">Final</button>
    <button type="submit" name="carregar" value='carregar' class="btn btn-success" data-loading-text="Loading...">Carregar</button>

<?php
$nome = $_POST['nome'];
$inicio = $_POST['inicio'];
$final = $_POST['final'];
$inicio=implode("-",array_reverse(explode("-",$inicio))); //usei o mesmo que esta em processa_formulario.php
$final=implode("-",array_reverse(explode("-",$final))); //usei o mesmo que esta em processa_formulario.php
$pesquisa = $_POST['carregar'];
if($pesquisa=='carregar'){
        echo "<table class='table table-bordered'>";
        echo "<tr>";
        echo "<th> Qtd. </th>"; 
        echo "<th> Cód. </th>"; 
        echo "<th> Nome </th>";
        echo "<th> Tecnico </th>";
        echo "<th> Backup </th>";
        echo "<th> Prazo </th>";
        echo "<th> Finalizado </th>";

  $sql = "SELECT * FROM clientes WHERE tecnico = '$nome' AND FINALIZADO BETWEEN '$inicio' AND '$final' 
          order by finalizado";
            $query = mysql_query($sql,$cnx) or die (mysql_error());
            while ($dado = mysql_fetch_array($query)) {
            $codigo =    $dado ['codigo'];
            $nome =  $dado ['nome'];
            $tecnico = $dado ['tecnico'];
            $backup=  $dado ['backup'];
            $prazo =    $dado ['prazo'];
            $finalizado = $dado ['finalizado'];
            $cont++;
      
     /* //fazendo a comparação do ST do usuário para imprimir cor
            if($st=='a'){
            //se for st = 'a' adiciona a cor abaixo
            $cor='#BFFFCF';  

            }
            else{
             //senão for ='a' adiciona a cor abaixo 
             $cor='#FF9999';

            }*/
      //echo "<tr bgcolor='".$cor."'>";
      echo "<tr>";   
      echo "<td>$cont </td>";   
      echo "<td>$codigo </td>";
      echo "<td>$nome </td>";
      echo "<td>$tecnico </td>";
      echo "<td>$backup </td>";
      echo "<td>$prazo </td>";
      echo "<td>$finalizado</td>";
      echo "</tr>";       
}
echo '</div>';
}
?>
</form>
</html>
