<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] DMARCレコード作成</title>
<meta name="description" contents="最新仕様のDMARCレコードをweb上で項目を選択するだけで作成出来ます。作成したものをDNSにコピペするだけなので入力ミスで周りに迷惑をかけずに済みます。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/create_record.js"></script>
<body onload="init();">
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			DMARCレコードを作成できます。<br />
			作成されたレコードをDNSに登録しましょう。
			<form class="form-horizontal" action="" method="post" role="form">
				<fieldset>
				<legend>フォーム</legend>
				<div class="form-group">
					<label class="col-sm-2 control-label">ドメイン</label>
					<span class="col-sm-5"><input type="text" class="domain form-control input-sm" id="domain" name="domain" max="512" required></span><br />
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">version</label>
					<span class="col-sm-2">
						<select class="form-control input-sm" name="version" id="version">
							<option selected="selected" value="dmarc1">DMARC1</options>
						</select>
					</span>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">policy</label>
					<span class="col-sm-3">
						<select class="form-control input-sm" name="policy" id="policy">
							<option selected="selected" value="quarantine">quarantine</option>
							<option value="none">none</option>
							<option value="reject">reject</option>
						</select>
					</span>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">sub policy</label>
					<span class="col-sm-3">
						<select class="form-control input-sm" name="sub_policy" id="sub_policy">
							<option selected="selected" value="">-</option>
							<option value="quarantine">quarantine</option>
							<option value="none">none</option>
							<option value="reject">reject</option>
						</select>
					</span>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">pct</label>
					<span class="col-sm-2">
						<select class="form-control input-sm" name="pct" id="pct">
							<option selected="selected" value="">-</option>
							<option value="100">100</option>
							<option value="90">90</option>
							<option value="80">80</option>
							<option value="70">70</option>
							<option value="60">60</option>
							<option value="50">50</option>
							<option value="40">40</option>
							<option value="30">30</option>
							<option value="20">20</option>
							<option value="10">10</option>
							<option value="0">0</option>
						</select>
					</span>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">rua</label>
					<span class="col-sm-7"><input type="text" class="form-control input-sm" id="rua" placeholder="mailto:" maxlength="512"/></span><br /><br />
					<div class="help col-sm-offset-2">※メールアドレスを複数指定する場合は,でつないでください。</div>
					<div class="help col-sm-offset-2">※レポートのサイズはsample@aaa.com!10Mといった形で指定できます。</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">ri</label>
					<span class="col-sm-2"><input type="text" class="form-control input-sm" id="ri" value="86400" maxlength="7"/></span>秒
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">rf</label>
					<div class="col-sm-10">
						<span class="radio-inline"><input type="radio" name="rf" id="rf1" value="rf1" checked="checked"/>afrf</span>
						<span class="radio-inline"><input type="radio" name="rf" id="rf2" value="rf2"/>iodef</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">ruf</label>
					<span class="col-sm-7"><input type="text" class="form-control input-sm" id="ruf" placeholder="mailto:" maxlength="512"/></span><br /><br />
					<div class="help col-sm-offset-2">※メールアドレスを複数指定する場合は,でつないでください。</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">fo</label>
					<span class="col-sm-2">
						<select class="form-control input-sm" name="fo" id="fo">
							<option selected="selected" value="">-</option>
							<option value="0">0</option>
							<option value="1">1</option>
							<option value="d">d</option>
							<option value="s">s</option>
						</select>
					</span><br /><br />
					<div class="help col-sm-offset-2">※0:両方fail, 1:どちらかfail, d:dkimがfail, s:spfがfail</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">aspf</label>
					<div class="col-sm-10">
						<span class=" radio-inline"><input type="radio" name="aspf" id="aspf1" value="aspf1" checked="checked"/>relax</span>
						<span class=" radio-inline"><input type="radio" name="aspf" id="aspf2" value="aspf2"/>strict</span>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">adkim</label>
					<div class="col-sm-10">
						<span class=" radio-inline"><input type="radio" name="adkim" id="adkim1" value="adkim1" checked="checked"/>relax</span>
						<span class=" radio-inline"><input type="radio" name="adkim" id="adkim2" value="adkim2"/>strict</span>
					</div>
				</div>
				<div class="form-group">
					<a href class="c_button btn btn-primary col-sm-offset-7 col-sm-1" id="create_record" onclick="javascript:submit();return false;">作成</a>
				</div>
				</fieldset>
			</form>
			<br />
			<textarea class="col-sm-offset-1 col-sm-8 d_textarea" id="dmarc_record" name="dmarc_record" readonly placeholder="_dmarc."></textarea>
			<br />
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>