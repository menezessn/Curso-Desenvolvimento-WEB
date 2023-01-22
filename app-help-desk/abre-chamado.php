<?php
session_start();
$titulo = $_POST['title'];
$categoria = $_POST['category'];
$descricao = $_POST['description'];

$chamado = [
$_SESSION['id'],
str_replace('#', '-', $titulo),
str_replace('#', '-', $categoria),
str_replace('#', '-', $descricao)];

$texto = implode('#',$chamado) ;

$arquivo = fopen('arquivo.hd','a');
fwrite($arquivo, ($texto . PHP_EOL));
fclose($arquivo);
header('Location:abertura-chamado.php');
?>