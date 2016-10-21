<?php
class Validate {

	private $__msg = "";

	public function getMsg() {
		return $this->__msg;
	}

	public function email($email) {
		$pattern = '/^[^0-9][a-zA-Z0-9_]+([.][a-zA-Z0-9_]+)*@\[?([\d\w\.-]+)]?$/';
		$ret = preg_match($pattern, $email, $matches);
		if (!$ret) {
			$this->__msg = "メールアドレスの形式が間違っています。";
			return false;
		}
		else {
			$this->__msg = "";
			return  true;
		}
	}
}