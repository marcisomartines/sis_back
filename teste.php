<html>

<head>
<title>DHTML Test</title>

    
</head>
<label> 
          <select name="nivel" id="nivel">        
  	<? if ($_SESSION['nivel_ocorrencia'] == 'ABERTOS') {
$x = "<option selected=\"selected\"  value=\"ABERTOS\">ABERTOS</option>
<option value=\"CONCLUIDOS\">CONCLUÍDOS</option>

"; }	
		if ($_SESSION['nivel_ocorrencia'] == 'CONCLUÍDOS') { $x = "
		<option selected=\"selected\"  value=\"CONCLUIDOS\">CONCLUÍDOS</option>
<option value=\"ABERTOS\">ABERTOS</option>
        "; }
		echo($x);
      ?>
            </select>
            
               </label>

</html>