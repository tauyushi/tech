<?php

class Log {

    private $__fp = null;

    public function __construct() {
        $this->__init();
    }

    public function __destruct() {
        if (!is_null($this->__fp)) {
            fclose($this->__fp);
        }
    }

    private function __init() {
        date_default_timezone_set("Asia/Tokyo");
        //$dir = $_SERVER["DOCUMENT_ROOT"]."/var/logs";
        $dir = "/var/tech/logs";
        if (!file_exists($dir)) {
            mkdir($dir,0755,true);
        }

        $log_file = $dir."/web-".date("Ymd").".log";
        $this->__fp = fopen($log_file, "a");
    }

    public function debug($str) {
        if (!is_null($this->__fp)) {
            fwrite($this->__fp, $this->__format("DEBUG", $str));
        }
    }

    public function info($str) {
        if (!is_null($this->__fp)) {
            fwrite($this->__fp, $this->__format("INFO", $str));
        }
    }

    public function error($str) {
        if (!is_null($this->__fp)) {
            fwrite($this->__fp, $this->__format("ERROR", $str));
        }
    }

    private function __format($level, $str) {
        return date("H:i:s")."[".$level."]".$str."\n";
    }

	public function same_self_ip($param="off") {
		//$ip_path = $_SERVER["DOCUMENT_ROOT"]."/var/cache/ip";
		$dir = "/var/tech/cache";
		if (!file_exists($dir)) {
            mkdir($dir,0755,true);
		}
		$ip_path = $dir."/ip";
		if (file_exists($ip_path)) {
			// 更新間隔が12時間未満のときはcacheを利用する
			if ((time() - filemtime($ip_path)) < (12 * 60 * 60)) {
				$ip = "";
				$f = fopen($ip_path, "r");
				if ($f) {
					$ip = fgets($f);
					fclose($f);
				}
				// cacheされている(自分のIPである)
				if ($_SERVER["REMOTE_ADDR"] == trim($ip)) {
					return true;
				}
				else {
					// cacheされていない(自分のIPではない)
					return false;
				}
			} 
		}

		// ipファイルが存在しない or ipファイルが更新されてから12時間以上たっている
		// ipファイルを更新する
		if ($param == "on") {
			$f = fopen($ip_path, "w");
			if ($f) {
				fwrite($f, $_SERVER["REMOTE_ADDR"]);
			}
			fclose($f);
		}
		return false;
	}
}
?>
