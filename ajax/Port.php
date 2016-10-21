<?php
require_once("../lib/Common.php");

$host = $_GET["host"];
$port = $_GET["port"];
$up = [];
if (ping($host, $port) === true) {
	$up["ping"] = "ok";
}
else {
	$up["ping"] = "no";
}

header('Content-Type: application/json');
echo json_encode($up);
exit;