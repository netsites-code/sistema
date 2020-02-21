<?php include_once("includes/head.php"); 



function listarcontas(){
	
  

//---------------------------System by Lauro Daniel NETSITES 2020 (45)99933 5708 --------------------------------------------------------


 // função listar contas a pagar e a receber
 
 $tipo=$_GET['tipo'];
  if (is_numeric($tipo)) {
    
  $selecionar = "SELECT * FROM financeiro_contas WHERE tipo='$tipo'";
  try {
  	 global $bdd;
    $resultado = $bdd->prepare($selecionar);
    
    $resultado->execute();
    $entcontados = $resultado->rowCount();
    
   
    
    if($entcontados > 0) {
      $loop = $resultado->fetchAll();
      foreach($loop as $linha) {
        $data = $linha['data'];
        $valor = $linha['valor'];
        $quem = $linha['quem'];
        $tipo = $linha['tipo'];
        
        
        
        echo "<tr>
      <th scope='row'>$data</th>
      <td>$valor</td>
      <td>$quem</td>
      <td>$tipo</td>
      <td>Concluir</td>
    </tr>";
        
       
      }
    }
  }
  catch(PDOException $e) {
    echo $e;
  }

	} // fim de verificar se o parameto passado é um número

}

 


?>