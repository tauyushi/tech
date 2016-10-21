<?php
require_once("../extern/Mail/Mail.php");

class SendMail
{
	public function mail_sender($mail_from, $to, $subject, $body)
	{
		$domain = explode("@", $to);
		if (count($domain) != 2) return false;

		$mxhosts = [];
		$ret = getmxrr($domain[1], $mxhosts);
		if (!$ret) return false;

		$SMTP = $mxhosts[0];

		$org = mb_internal_encoding();
		mb_internal_encoding("ISO-2022-JP");
		$subject = mb_encode_mimeheader(mb_convert_encoding($subject, "ISO-2022-JP", "UTF-8"),"ISO-2022-JP","B","¥r¥n");
		mb_internal_encoding($org);

		$body = mb_convert_encoding($body, "ISO-2022-JP", "UTF-8");

		$params = array(
			"host" => $SMTP,
			"port" => "25",
			"auth" => false,
			"username" => "",
			"password" => "",
			"sendmail_args" => "f"
		);

		$mailObject = Mail::factory("smtp", $params);

		$headers = array(
			"To" => $to,
			"From" => $mail_from,
			"Subject" => $subject,
			"Return-Path" => $mail_from
		);

		$mailObject->send($to, $headers, $body);
	}
}