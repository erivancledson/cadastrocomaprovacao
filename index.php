<?php
if(isset($_POST['nome']) && !empty($_POST['nome'])) {
	$nome = addslashes($_POST['nome']);
	$email = addslashes($_POST['email']);

	require 'config.php';
         
	$pdo->query("INSERT INTO usuarios SET nome = '$nome', email = '$email'");
        //pega o id do usuario que foi inserido
	$id = $pdo->lastInsertId();
        //codigo que vai junto com o email no link, gera um md5 do id do usuario
	$md5 = md5($id);
        //no servidor cria uma pasta cadastroconfirma e joga os arquivos dentro
	$link = 'http://www.zembrax.com/cadastroconfirma/confirmar.php?h='.$md5;

	$assunto = "Confirme seu cadastro";
	$msg = "Clique no link abaixo para confirmar seu cadastro:\n\n".$link;
	$headers = "From: suporte@b7web.com.br"."\r\n".
				"X-Mailer: PHP/".phpversion();

	mail($email, $assunto, $msg, $headers);

	echo "<h2>OK! Confirme seu cadastro agora!</h2>";
	exit;
}
?>

<!-- formulario do cadastro!-->
<form method="POST">
	Nome:<br/>
	<input type="text" name="nome" /><br/><br/>

	E-mail:<br/>
	<input type="email" name="email" /><br/><br/>

	<input type="submit" value="Cadastrar" />
</form>