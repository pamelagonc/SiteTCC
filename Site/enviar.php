<?php
// Passando os dados obtidos pelo formulário para as variáveis abaixo
$nome = $_POST['nome'];
$email = trim($_POST['email']);
$emaildestinatario = 'dionatansangaletti@gmail.com';// Digite seu e-mail aqui, lembrando que o e-mail deve estar em seu servidor web
$telefone = $_POST['telefone'];
$servico = $_POST['servico'];
$mensagem = $_POST['mensagem'];
 
/* Montando a mensagem a ser enviada no corpo do e-mail. */
$mensagemHTML = '
<strong>Formulário de Contato</strong> 
<p><b>Nome:</b> '.$nome.' <p>
<b>E-Mail:</b> '.$email.' <p>
<b>Telefone:</b> '.$telefone.' <p>
<b>Serviço:</b> '.$servico.' <p>
<b>Mensagem:</b> '.$mensagem.'</p>
<hr>';
 
// O remetente deve ser um e-mail do seu domínio conforme determina a RFC 822.
// O return-path deve ser ser o mesmo e-mail do remetente.
$headers = "MIME-Version: 1.1\r\n";
$headers .= "Content-type: text/html; charset=utf-8\r\n";
$headers .= "From: $emailremetente\r\n";
// remetente
$headers .= "Return-Path: $emaildestinatario \r\n";
// return-path
$envio = mail($emaildestinatario, $assunto, $mensagemHTML, $headers);
if($envio)
header('Location: contato.php');
?>