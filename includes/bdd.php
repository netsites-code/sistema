<?php
  //conexão ao banco de dados
  ob_start();
  session_start();
  date_default_timezone_set('America/Sao_Paulo');
  error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);
  try {
    $bdd = new PDO('mysql:host=localhost;dbname=u831509106_gnr;charset=utf8', 'u831509106_gnr', 'gerenciador2020');
    $bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }
  catch(PDOException $error) {
    echo 'Error: ' . $error -> getMessage();
  }
  //-----------------------------------------------------------------------------------

  //configurações do site
  $gerenciador_nome = 'Gerenciador';
  $gerenciador_site = '//olhoimobiliario.com.br';
  //-----------------------------------------------------------------------------------

  //sistema de login
  if(isset($_POST['entrar'])) {
    $entselect = "SELECT * from staff WHERE email=:email AND senha=:senha";
    try {
      $entresult = $bdd->prepare($entselect);
      $entresult->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
      $entresult->bindParam(':senha', $_POST['senha'], PDO::PARAM_STR);
      $entresult->execute();
      $entcontar = $entresult->rowCount();
      if($entcontar > 0) {
        $_SESSION['email'] = $_POST['email'];
        $_SESSION['senha'] = $_POST['senha'];
        header("Location: /");
      }
    }
    catch(PDOException $error) {
      echo $error;
    }
  }
  //-----------------------------------------------------------------------------------

  //sistema de logout
  if(isset($_REQUEST['sair'])) {
    session_destroy();
    session_unset(['email']);
    session_unset(['senha']);
    header("Location: /entrar");
  }
  //-----------------------------------------------------------------------------------

  //puxar informações do usuário logado
  $entselect = "SELECT * from staff WHERE email=:email AND senha=:senha";
  try {
    $entresult = $bdd->prepare($entselect);
    $entresult->bindParam(':email', $_SESSION['email'], PDO::PARAM_STR);
    $entresult->bindParam(':senha', $_SESSION['senha'], PDO::PARAM_STR);
    $entresult->execute();
    $entcontar = $entresult->rowCount();
    if($entcontar > 0) {
      $entloop = $entresult->fetchAll();
      foreach($entloop as $entexb) {
        $lgnnome = $entexb['nome'];
        $lgnsobrenome = $entexb['sobrenome'];
        $lgnemail = $entexb['email'];
        $lgnavatar = $entexb['avatar'];
        $lgnimobiliaria_creci = $entexb['imobiliaria_creci'];
      }
    }
  }
  catch(PDOException $e) {
    echo $e;
  }
  //-----------------------------------------------------------------------------------

  //cadastrar funcionário
  if(isset($_POST['cadastrar-funcionario'])) {
    $arquivo = $_FILES['avatar'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'imgs/staff/'.$novonome)) {
    }
    $dstimg = '/imgs/staff/'.$novonome;
    $cadinsert = "INSERT into staff (nome, sobrenome, email, senha, telefone, avatar, cargo, imobiliaria_creci) VALUES (:nome, :sobrenome, :email, :senha, :telefone, :avatar, :cargo, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':nome' , $_POST['nome'], PDO::PARAM_STR);
      $cadresult->bindParam(':sobrenome' , $_POST['sobrenome'], PDO::PARAM_STR);
      $cadresult->bindParam(':email' , $_POST['email'], PDO::PARAM_STR);
      $cadresult->bindParam(':senha' , $_POST['senha'], PDO::PARAM_STR);
      $cadresult->bindParam(':telefone' , $_POST['telefone'], PDO::PARAM_STR);
      $cadresult->bindParam(':avatar' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':cargo' , $_POST['cargo'], PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro de contrato
  if(isset($_POST['cadastrar-contrato'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'modelos_contratos/'.$novonome)) {
    }
    $dstimg = '/modelos_contratos/'.$novonome;
    $cadinsert = "INSERT into modelos_contratos (tipo, file, imobiliaria_creci) VALUES (:tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':tipo' , $_POST['tipo'], PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da auto de vistoria
  if(isset($_POST['cadastrar-auto-de-vistoria'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '2';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da auto de vistoria
  if(isset($_POST['cadastrar-contrato-de-administracao'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '5';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da auto de vistoria
  if(isset($_POST['cadastrar-copia-do-documento-do-imovel'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '3';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------

  //Cadastro da auto de vistoria
  if(isset($_POST['cadastrar-copia-do-documento-do-proprietario'])) {
    $arquivo = $_FILES['file'];
    $nome = $arquivo['name'];
    $tmp = $arquivo['tmp_name'];
    $extensao = explode('.', $nome);
    $ext = end($extensao);
    $novonome = md5($nome).'.'.$ext;
    if(empty($arquivo)) {
    }
    elseif(move_uploaded_file($tmp, 'files/'.$novonome)) {
    }
    $dstimg = '/files/'.$novonome;
    $tipo = '4';
    $cadinsert = "INSERT into files (iddoimovel, tipo, file, imobiliaria_creci) VALUES (:iddoimovel, :tipo, :file, :imobiliaria_creci)";
    try {
      $cadresult = $bdd->prepare($cadinsert);
      $cadresult->bindParam(':iddoimovel' , $_POST['iddoimovel'], PDO::PARAM_STR);
      $cadresult->bindParam(':tipo' , $tipo, PDO::PARAM_STR);
      $cadresult->bindParam(':file' , $dstimg, PDO::PARAM_STR);
      $cadresult->bindParam(':imobiliaria_creci' , $lgnimobiliaria_creci, PDO::PARAM_STR);
      $cadresult->execute();
      $cadcontar = $cadresult->rowCount();
      if($cadcontar > 0) {
        echo "Sucesso!";
      }
    }
    catch(PDOException $e) {
      echo $e;
    }
  }
  //-----------------------------------------------------------------------------------
?>