<?php
require_once("../lib/Log.php");
require_once("../lib/FileUpload.php");
require_once("../extern/php-dmarc-parser-master/src/AggregateReportParser.php");
require_once("../extern/php-dmarc-parser-master/src/Exception.php");

$log = new Log();
$log->debug("load report parser ...");

$dir = "/var/tech/up_report";
if (!file_exists($dir)) {
    mkdir($dir,0755,true);
}

$saved_file_path = FileUpload::setFile($dir);
try {
    $report_data = Teon\Dmarc\Parser\AggregateReportParser::parseFile($saved_file_path, false);
    unlink($saved_file_path);
    header('Content-Type: application/json');
    echo json_encode($report_data);
}
catch(Exception $e) {
    unlink($saved_file_path);
	$error = [];
	$error["error"] = $e->getMessage();
	header('Content-Type: application/json');
	echo json_encode($error);
}
exit;
?>
