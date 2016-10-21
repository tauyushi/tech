<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] Base64デコード エンコード</title>
<meta name="description" contents="Base64をデコードしたり、文字列をエンコードしてBase64に変換したり出来ます。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/base64.js"></script>
<body>
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			<form class="form-inline" action="" method="get" role="form">
				<fieldset>
					<legend>Base64デコード(エンコード)</legend>
					<p class="info">文字列をBase64にエンコード、またBase64を文字列にデコード出来ます。</p>
					<div class="row">
						<div class="form-group">
							<span class="col-sm-5">
								<textarea class="form-control" style="height:150px;width:400px" id="input" name="input" required></textarea>
							</span><br />
						</div>
					</div><br />
					<div clas="row">
						<div style="float:left">
							<div class="form-group">
								<a href="#" class="btn btn-primary col-sm-offset-1 col-sm-2 form-control" id="clear" onclick="form_clear();return false;">クリア</a>
							</div>
						</div>
						<div class="col-sm-offset-3">
							<div class="form-group">
								<a href="#" class="btn btn-primary col-sm-offset-1 col-sm-2 form-control" id="decode" onclick="decode();return false;">decode</a>
							</div>
							<div class="form-group">
								<a href="#" class="btn btn-primary col-sm-offset-1 col-sm-2 form-control" id="encode" onclick="encode();return false;">encode</a>
							</div>
						</div>
					</div>
				</fieldset>
			</form>
			<br />
			<p id="print_data" class="l-borderless"></p>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>