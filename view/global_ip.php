<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] 自宅のグローバルIPを調べる</title>
<meta name="description" contents="このページにアクセスしてきたグローバルIPを表示します。自宅にサーバを立てている場合、プロキシ(proxy)の設定の確認に使用して下さい。" />
<?php include_once("../base/header.html");?>
</head>
<body>
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			<legend>グローバルIPチェック</legend>
			<p class="info">自宅のグローバルIPを見ることが出来ます。</p>
			あなたのグローバルIPは...<br /><br />
			<div><input type="text" class="l-borderless col-sm-offset-1" value=<?php echo $_SERVER["REMOTE_ADDR"];?> readonly></div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>