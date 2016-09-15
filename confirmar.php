<?php
require 'config.php';
//pega a variavel h que esta sendoenviada no cadastro
$h = $_GET['h'];

if(!empty($h)) {
    //atualiza o status para 1
	$pdo->query("UPDATE usuarios SET status = '1' WHERE MD5(id) = '$h'");
	echo '<h2>Cadastro confirmado com sucesso!';
}
?>