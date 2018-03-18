<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] DMARCレポートをアップロード(upload)して解析します</title>
<meta name="description" contents="アップロードされたDMARCレポートの解析し、テーブルで表示します。zipのままアップロードしても大丈夫です。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/report_parser.js"></script>
<body onload="init();">
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
    <div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			集計レポートをアップロードするとテーブルに変換して表示します。<br /><br />
			<form class="form-horizontal" action="" method="post" role="form">
				<div class="form-group">
					<div class="col-sm-4">
						<input type="file" id="report" name="report"/>
					</div>
				</div>
				<div class="form-group" style="margin-top:10%">
					<div class="col-sm-offset-5 col-sm-3">
						<input type="button" id="upload" name="upload" value="アップロード" class="form-control btn btn-primary"/>
					</div>
				</div>
			</form>
			<div class="form-inline">
				<div id="donut_dmarc" class="m_donut"></div>
				<div id="donut_dkim" class="m_donut"></div>
				<div id="donut_spf" class="m_donut"></div>
			</div>
			<div id="parsed" name="parsed"></div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>
