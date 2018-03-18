<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] DMARCレコードのDNSチェック</title>
<meta name="description" contents="DMARCレコードのDNSチェックが出来ます。自身のDNSサーバにDMARCレコードを登録したら実際にDMARCレコードが引けるかここでチェックすることが出来ます。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/check_dmarc_dns.js"></script>
<body onload="init();">
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			ドメインを入力して「レコード取得」ボタンを押して下さい。<br />
			DMARCレコードが表示されます。DNSに登録されているかチェックできます。<br /><br >
			<div class="row form-group">
				<label class="col-sm-1 col-xs-3">_dmarc.</label>
				<div class="col-sm-4 col-xs-7">
					<input type="text" class="form-control" id="dns_domain" name="dns_domain" value="" placeholder="ドメイン" maxlength="512"/>
				</div>
			</div>
            <div class="row" style="margin-top:10%">
				<div class="col-sm-offset-5 col-sm-3">
					<input type="button" class="form-control btn btn-primary" value="レコード取得" onclick="get_dns_record();return false;"/>
				</div>
            </div>
			<div class="row" style="margin-top:1%">
				<div class="col-sm-10 example">
					例)_dmarc.crowded-city.com -> v=DMARC1;p=reject;rua=mailto:tech01@crowded-city.com;ri=86400
				</div>
			</div>
			<br />
			<div><input type="text" class="dns_dmarc col-sm-offset-1" value="" id="dns_dmarc" name="dns_dmarc" readonly></div>
            <br /><br />
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>
