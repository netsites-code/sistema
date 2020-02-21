<?php include_once("includes/head.php"); 

//$con = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020'); 


$tipo =  $_POST['tipodeconta'];



$quem =  $_POST['quem'] ;
$descricao =  $_POST['descricao'] ;
echo "valor $valor";

$valor =  $_POST['valor'] ;

$tiraponto = array(".");
$trocarvirgula = array(",");

$valor = str_replace($tiraponto, "", "$valor");
$valor = str_replace($trocarvirgula, ".", "$valor");


echo "valor $valor";
$data = $_POST['data'] ;



echo "creci = $lgnimobiliaria_creci";



$inserir = "INSERT INTO financeiro_contas(tipo,valor,quem,imobiliaria_creci,data,status) VALUES(:tipo, :valor, :quem, :imobiliaria_creci, :data, :status)";


$status='Aberto';



 try {
 	
 	$acao = $bdd->prepare($inserir);
$acao->bindParam(':tipo',$tipo);
$acao->bindParam(':valor',$valor);

$acao->bindParam(':quem',$quem);
$acao->bindParam(':imobiliaria_creci',$lgnimobiliaria_creci);
$acao->bindParam(':data',$data);
$acao->bindParam(':status',$status);


$acao->execute();

$cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }


/*
$insert = "INSERT INTO financeiro_contas(tipo) VALUES(:tipo)";



 try {
 $acao = $bdd->prepare($insert);
$acao->bindParam(':tipo' , $tipo , PDO::PARAM_STR);
$acao->execute();
 $cadcontar = $acao->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }

*/

?>