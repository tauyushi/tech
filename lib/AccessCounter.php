<?php
require_once("Log.php");
$param = isset($_GET["cache"]) ? $_GET["cache"]: "off";
$_access_log = new Log();
if (!$_access_log->same_self_ip($param)) {
    $ip_addr = $_SERVER["REMOTE_ADDR"];
    $request_uri = $_SERVER["REQUEST_URI"];
    $user_agent = $_SERVER["HTTP_USER_AGENT"];
    $is_bot = "";
    if (preg_match("/bot|spider/ui", $user_agent)) $is_bot = "[BOT] ";
    $referer = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "";
    $_access_log->info(">> ".$is_bot."Client IP:".$ip_addr.", Request:".$request_uri.", UserAgent:".$user_agent.", Referer:".$referer);
}