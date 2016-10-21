<?php
require_once("../lib/Log.php");
require_once("../lib/Validate.php");
require_once("../lib/SendMail.php");

$log = new Log();

$from = trim($_POST["from"]);
$to = trim($_POST["to"]);
$subject = trim($_POST["subject"]);
$body = $_POST["body"];

function alert($msg) {
	echo '<script type="text/javascript">';
	echo 'alert("'.$msg.'");';
	echo '</script>';
	echo '<meta http-equiv="refresh" content="0;URL=http://utility.crowded-city.com/view/smtp_client.php">';
}

$validate = new Validate();
if (!$validate->email($from) || strlen($from) > 256) {
	alert($validate->getMsg());
	exit;
}

if (!$validate->email($to) || strlen($to) > 256) {
	alert($validate->getMsg());
	exit;
}

if (strlen($subject) > 256) {
	alert("件名の文字数は256文字以下にしてください。");
	exit;
}

if (strlen($body) > 10000) {
	alert("本文の文字数は10000文字以下にしてください。");
	exit;
}

$sendmail = new SendMail();

try {
	$sendmail->mail_sender($from, $to, $subject, $body);
}
catch(Exception $e) {
    alert($e->getMessage());
	exit;
}
echo '<meta http-equiv="refresh" content="0;URL=http://utility.crowded-city.com/view/smtp_client_finish.php">';
?>