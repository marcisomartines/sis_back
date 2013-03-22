<?php
/***************************************************************/
/*Sistema de auxilio ao backup - Suporte Gerencial Informatica */
/*Autor: Marciso Gonzalez Martines                             */
/*e-mail: marciso.gonzalez@gmail.com                           */
/***************************************************************/
include_once 'header.php';
include_once 'db.php';

$sql=mysql_query("SELECT * FROM clientes WHERE st='a'");
$tudo=mysql_num_rows($sql);
$sql=mysql_query("SELECT * FROM clientes WHERE backup='Sim' and st='a'");
$sim=mysql_num_rows($sql);
$sql=mysql_query("SELECT * FROM clientes WHERE (backup='Nao' or backup='') and tecnico!='' and st='a'");
$nao=mysql_num_rows($sql);
$sql=mysql_query("SELECT * FROM clientes WHERE tecnico='' and backup='' and st='a'");
$falta=mysql_num_rows($sql);

function geraGrafico($largura, $altura, $valores, $referencias, $tipo = "p3"){
           $valores = implode(',', $valores);
           $referencias = implode('|', $referencias);
 
           return "http://chart.apis.google.com/chart?cht=p3&chs=".$largura."x".$altura."&chd=t:".$valores."&chl=".$referencias."&chco=33cc33,990000,ffcc66";
     }
?>

<html>
  <head>
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript"></script>
  </head>
  <body>
    <div class="row-fluid">
      <b class="text-success">Concluidos: <?=$sim;?></b><br />
      <b class="text-error">Pendentes: <?=$nao;?></b><br />
      <b class="text-warning">N&atilde;o Atribuidos: <?=$falta;?></b><br />
      <b class="text-info">Total: <?=$tudo;?></b><br />
    </div>
    <?php $grafico = geraGrafico(900, 300, array($sim,$nao,$falta), array("Completo", "Pendentes","Nao Atribuidos")) ?>
    <img src="<?php echo $grafico ?>" title="Grafico gerado pelo Google Chart" />
  </body>
  </body>
</html>