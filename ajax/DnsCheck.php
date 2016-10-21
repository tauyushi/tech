<?php
require_once("../lib/Log.php");

$domain = trim($_GET["domain"]);
$type = $_GET["type"];

switch($type) {
	case "a":
		$p_type =  DNS_A;
		break;
	case "cname":
		$p_type =  DNS_CNAME;
		break;
	case "mx":
		$p_type =  DNS_MX;
		break;
	case "txt":
		$p_type =  DNS_TXT;
		break;
	case "aaaa":
		$p_type =  DNS_AAAA;
		break;
	default:
		$p_type = DNS_ALL;
}

$ret = dns_get_record($domain, $p_type);
header('Content-Type: application/json');
echo json_encode($ret);
exit;