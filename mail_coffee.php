<?php
/* Developed by: Alessandro Alan Alexandre <alesandroalan@gmail.com> */

/* 
 * Inserir os coleguinhas (Nome, email) que serao responsaveis por fazer os cafe diariamente,
 * um deles sera escolhido, se um coleguinha for escolhido em mais de uma vez consecutivamente, 
 * azar o dele, sorte do resto da equipe.
 *
 * */
$team = array(
    ['Name Worker1','worker1@company.com'],
    ['Name Worker2','worker2@company.com'],
    ['Name Worker3','worker3@company.com'],
    ['Name Worker4','worker4@company.com'],
    ['Name Worker5','worker5@company.com'],
    ['Name Worker6','worker6@company.com'],
    ['Name Worker7','worker7@company.com'],
    ['Name Worker8','worker8@company.com'],
    ['Name Worker9','worker9@company.com'],
    ['Name Worker10','worker10@company.com']
);

$size_team = count($team); //verifica quantas pessoas tem na equipe
$chosen = rand(0, $size_team-1); //escolhe um coleguinha

$receiver_name = $team[$chosen][0];//Pega o nome
$receiver_mail = $team[$chosen][1];//Pega o email

/* Informacoes da conta que ira enviar os e-mails - autenticacao */
$name_from_user_authenticated = 'Máquina de café';
$mail_from_user_authenticated = 'email_autenticado@company.com';
$password_mail_from_user_authenticated = 'password';

/* Variaveis do corpo do e-mail */
$name_mail_from  = 'Máquina de café';
$mail_from = 'maquinadecafe@company.com.br';
$subject  = 'Café';
$message = file_get_contents("/var/www/coffee_time/mail_template.html");
$message = str_replace("%VARNAME%", $receiver_name, $message);

require_once('PHPMailer-master/PHPMailerAutoload.php');
$mail = new PHPMailer();

$mail->IsSMTP();
$mail->SMTPAuth  = true;
$mail->Charset   = 'utf8_decode()';
$mail->Host  = 'smtp.servidor.com.br';
//$mail->Ssl  = false;
$mail->Port  = '25';//587,26
$mail->Username  = $mail_from_user_authenticated;
$mail->Password  = $password_mail_from_user_authenticated;
$mail->From  = "maquinadecafe@company.com.br";//Pode ser um e-mail falso, mas alguns servidores de e-mail bloqueiam, entao nesse caso informe o email correto
$mail->FromName  = utf8_decode($name_from_user_authenticated);
$mail->addReplyTo('noreply@company.com.br', utf8_decode('Máquina de café'));//Ao responder, para quem vai o e-mail
$mail->IsHTML(true);
$mail->Subject  = utf8_decode($subject);
$mail->Body  = utf8_decode($message);

$mail->AddAddress($receiver_mail,utf8_decode($receiver_name));

if(!$mail->Send()){
    $mensagemRetorno = 'Erro ao enviar e-mail: '. print($mail->ErrorInfo);
}else{
    $mensagemRetorno = 'E-mail enviado com sucesso para '.$receiver_mail;
}

print_r($mensagemRetorno);//Esta linha pode ser comentada, apenas para debug

?>
