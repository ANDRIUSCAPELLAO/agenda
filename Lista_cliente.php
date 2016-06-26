<html>
  <head>
   
  
  <input class="login" type="button" value="Sair" onclick="javascript: location.href='index.php';" />
   
  <title>CLIENTES</title>
  
 <!--Folha de estilo CSS -->
 <link href="style.css" rel="stylesheet" type="text/css">

 <!--Icone exibido no navegador --> 
 <link rel="shortcut icon" href="./images/antena2.ico" type="image/x-icon">
 <link rel="icon" href="./images/antena2.ico" type="image/x-icon"> 
  <!--botao voltar e logout -->

 <form id="clienteform" method="" > 
  
<?php
 require_once "classes/conexao.php";
   // include('conexao.php');
    $connect = new conexao();
 
    $connect->set('bd','rz2');
    $connect->set('host','localhost');
    $connect->set('usuario','root');
    $connect->set('senha','');
    $connect->set('sql','SELECT * FROM cliente ORDER BY nome ASC');
    $connect->conectar();
    $connect->selecionarDB();
 
	$result = ($connect->executar());
	
	
	while($row = mysql_fetch_array($result)){ 
	foreach($row AS $key => $value) { $row[$key] = stripslashes($value); } 
	
	echo "<table border=1>"; 
	echo "<tr>"; 
	echo "<td><b>Id</b></td>"; 
	echo "<td><b>Nome</b></td>"; 
	echo "<td><b>Telefone</b></td>"; 
	echo "<td><b>Email</b></td>"; 
	echo "</tr>"; 
	
	echo "<tr>";  
	echo "<td valign='top'>" . nl2br( $row['id']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['nome']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['telefone']) . "</td>";  
	echo "<td valign='top'>" . nl2br( $row['email']) . "</td>";  
	echo "</tr>"; 
} 
	echo "</table>"; 
	
	?>
	
	
	
  </form>
 </body>
 </head>
 </html>