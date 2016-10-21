<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] 送信専用メーラー</title>
<meta name="description" contents="送信に特化したシンプルなメーラーです。メール送受信をテストしたい場合や、自分の送信アドレスを知られたくない場合に利用出来ます。" />
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
			<form class="form-horizontal" action="../ajax/SmtpClient.php" method="post" role="form">
				<fieldset>
					<legend>送信専用メーラー</legend>
					<p class="info">メールを送信できます。DNSを引くので宛先は実際に存在する相手にしてください。</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">送信者</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="from" name="from" maxlength="256" required></span><br />
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">宛先</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="to" name="to" maxlength="256" required></span><br />
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">件名</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="subject" name="subject" maxlength="256"></span><br />
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">本文</label>
						<span class="col-sm-5"><textarea class="form-control" style="height:200px" id="body" name="body" maxlength="10000"></textarea></span><br />
					</div>

					<div class="form-group">
						<input type="submit" class="btn btn-primary col-sm-offset-6 col-sm-1" id="submit" value="送信">
					</div>
				</fieldset>
			</form>
			<div class="help">※添付ファイルには対応していません。</div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>