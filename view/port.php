<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] ポート、ネットワーク 監視 チェック　ツール</title>
<meta name="description" contents="ホストまたはIPとポート番号を指定して、実際に接続出来るかチェックします。ポートが開放されているか調べるのに有効です。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/port.js"></script>
<body>
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			<form class="form-horizontal" action="" method="get" role="form">
				<fieldset>
					<legend>ポート監視</legend>
					<p class="info">ポートが開いているかどうか接続を試みてチェックすることができます。<br />
									接続先と調べたいポート番号を入力して下さい。
					</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">ホスト/IP</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="host" name="host" maxlength="256" required></span><br />
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">ポート</label>
						<span class="col-sm-2"><input type="text" class="form-control input-sm" id="port" name="port" value="80" maxlength="6" required></span><br />
					</div>
					<div class="form-group">
						<a href="#" class="btn btn-primary col-sm-offset-6 col-sm-1" id="submit" onclick="javascript:submit();return false;">送信</a>
					</div>
				</fieldset>
			</form>
			<div><input type="text" class="l-borderless col-sm-offset-2" id="pinged" name="pinged" value="" readonly></div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>