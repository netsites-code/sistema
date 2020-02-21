<?php
	/* Conexão com o banco de dados */
	ob_start();
	session_start();
	date_default_timezone_set('America/Sao_Paulo');
	error_reporting(E_ALL & ~E_NOTICE & ~E_WARNING);

	try {
		$bdd = new PDO('mysql:host=mysql.hostinger.com.br;dbname=u770690224_wj;charset=utf8', 'u770690224_wj', '@woo#jobs18');
		$bdd -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $error) {
		echo 'Error: ' . $error -> getMessage();
	}
	/**/

	/* Insert */
	$cadinsert = "INSERT into wj_users (nome) VALUES (:nome)";
	try {
		$cadresult = $bdd->prepare($cadinsert);
		$cadresult->bindParam(':nome' , $_POST['nome'], PDO::PARAM_STR);
		$cadresult->execute();
		$cadcontar = $cadresult->rowCount();
		if($cadcontar > 0) {
			echo "Sucesso!";
		}
	}
	catch(PDOException $e) {
		echo $e;
	}
	/**/

	/* Envio de e-mail com o PHPMailer */
	$mail = new PHPMailer(true);
	$mail->IsSMTP();
	try {
		$mail->CharSet = 'utf-8';
		$mail->Host = 'mx1.hostinger.com.br';
		$mail->SMTPAuth = true;
		$mail->Port = 587;
		$mail->Username = 'contato@woojobs.com.br';
		$mail->Password = '@woo#jobs18';
		$mail->SetFrom('contato@woojobs.com.br', 'Woo Jobs');
		$mail->AddReplyTo('contato@woojobs.com.br', 'Woo Jobs');
		$mail->Subject = 'Seu código para confirmar o e-mail - Woo Jobs';
		$mail->AddAddress($_POST['email'], $_POST['nome']); 
		$mail->MsgHTML('conteudo em html');
		$mail->Send();
	}
	catch(phpmailerException $e) {
		echo $e->errorMessage();
	}
	/**/

	/* Informações do usuário especifico */
	$entselect = "SELECT * from wj_users WHERE email=:email";
	try {
		$entresult = $bdd->prepare($entselect);
		$entresult->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
		$entresult->execute();
		$entcontar = $entresult->rowCount();
		if($entcontar > 0) {
			$entloop = $entresult->fetchAll();
			foreach($entloop as $entexb) {
				$entsenha = $entexb['senha'];
			}
		}
	}
	catch(PDOException $e) {
		echo $e;
	}
	/**/

	/* Sair da conta */
	if(isset($_REQUEST['sair'])) {
		session_destroy();
		session_unset(['email']);
		session_unset(['senha']);
		header("Location: /entrar");
	}
	/**/

	/* Atualização de dados */
	$atlifsedit = $bdd->prepare("UPDATE wj_users set nome = ? WHERE email = ? AND senha = ?");
	$atlifsedit->execute(array($_POST['nome'], $_SESSION['email'], $_SESSION['senha']));
	/**/

	/* Tempo decorrido */
	function time_ago($time) {
    	$diff = time() - $time;
        $seconds = $diff;
        $minutes = round($diff / 60);
        $hours = round($diff / 3600);
        $days = round($diff / 86400);
        $weeks = round($diff / 604800);
        $months = round($diff / 2419200);
        $years = round($diff / 29030400);
        if ($seconds < 60) echo"há $seconds segundos atrás";
       	else if ($minutes <= 60) echo $minutes==1 ?'há 1 minuto atrás':"há ".$minutes.' minutos atrás';
        else if ($hours <= 24) echo $hours==1 ?'há 1 hora atrás':"há ".$hours.' horas atrás';
        else if ($days <= 7) echo $days==1 ?'há 1 dia atrás':"há ".$days.' dias atrás';
        else if ($weeks <= 4) echo $weeks==1 ?'há 1 semana atrás':"há ".$weeks.' semanas atrás';
       	else if ($months <= 12) echo $months == 1 ?'há 1 mes atrás':"há ".$months.' meses atrás';
        else echo $years == 1 ? 'há 1 ano atrás':"há ".$years.' anos atrás';
    }
    /**/

    /* Informações de todos os usuários */
    $omsselect = "SELECT * from wj_usuarios ORDER BY id DESC";
	try {
		$omsresult = $bdd->prepare($omsselect);
		$omsresult->execute();
		$omscontar = $omsresult->rowCount();
		if($omscontar>0) {
			while($omsmost = $omsresult->FETCH(PDO::FETCH_OBJ)) {
				$omsnome = $omsmost->nome;
			}
		}
	}
	catch(PDOException $e) {
		echo $e;
	}
	/**/

	/* Upload de imagem */
	$arquivo = $_FILES['fotolink'];
	$nome = $arquivo['name'];
	$tmp = $arquivo['tmp_name'];
	$extensao = explode('.', $nome);
	$ext = end($extensao);
	$novonome = md5($nome).'.'.$ext;
	if(empty($arquivo)) {
		echo "Selecione um arquivo!";
	}
	elseif(move_uploaded_file($tmp, 'wp-content/themes/news-base/aniversariantes/'.$novonome)) {
		echo "Enviado!";
	}
	$dstimg = '/wp-content/themes/news-base/aniversariantes/'.$novonome;
	/**/

	/* Deletar foto */
	unlink('/wp-content/themes/news-base/aniversariantes/'.$novonome);
	/**/

	/* Deletar dados do banco */
	$vercodeeas = $bdd->prepare('DELETE FROM wj_eas WHERE tempo < :tempo');
	$vercodeeas->bindParam(':tempo', date("Y-m-d H:i:s"));
	$vercodeeas->execute();
	/**/
?>	