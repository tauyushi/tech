<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] nslookup DNSレコード取得</title>
<meta name="description" contents="nslookupコマンドと同等の処理をwebで行い、DNSレコードを全てまたはタイプ(type)別に取得して一覧を表示します。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/check_dns.js"></script>
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
					<legend>DNSチェック</legend>
					<p class="info">ドメインを基にDNSレコードを取得します。<br />
									タイプを選ばない場合は全て取得します。
					</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">ドメイン</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="domain" name="domain" maxlength="256" required></span><br />
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">タイプ</label>
						<span class="col-sm-3">
							<select class="form-control input-sm" name="type" id="type">
								<option selected="selected" value="">-</option>
								<option value="a">A</option>
								<option value="cname">CNAME</option>
								<option value="mx">MX</option>
								<option value="txt">TXT</option>
								<option value="aaaa">AAAA</option>
							</select>
						</span>
					</div>

					<div class="form-group">
						<a href="#" class="btn btn-primary col-sm-offset-6 col-sm-2" id="submit" onclick="submit();return false;">チェック</a>
					</div>
				</fieldset>
			</form>
			<div id="print_dns"></div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>