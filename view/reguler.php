<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] 正規表現　チェック　ツール</title>
<meta name="description" contents="Javascriptを使って文字列が正規表現に含まれるかどうかweb上で調べることが出来ます。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/reguler.js"></script>
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
					<legend>正規表現</legend>
					<p class="info">正規表現のチェックが出来ます。デリミタは要りません。チェックはJavascriptで行っています。</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">正規表現</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" style="width:350px" id="reg" name="reg" required></textarea></span>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">対象文字列</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" style="width:350px" id="target" name="target" required></textarea></span>
					</div>
					<div class="form-group">
						<a href="#" class="btn btn-primary col-sm-offset-6 col-sm-2" id="reg_check" onclick="reg_check();return false;">チェック</a>
					<div>
				</fieldset>
			</form>
			<br />
			<p id="print_data" class="l-borderless col-sm-offset-2"></p>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>