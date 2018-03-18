<?php
require_once("../lib/Log.php");

$log = new Log();
$dns_domain = trim($_GET["dns_domain"]);
$ret = dns_get_record("_dmarc.".$dns_domain, DNS_TXT);
if ($ret)$log->debug("domain:$dns_domain, record:".$ret[0]['txt']);
else $log->debug("domain:$dns_domain, record:Not found");
header('Content-Type: application/json');
echo json_encode($ret);
exit;
?>