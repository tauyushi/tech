<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] ネットワークアドレス、ホストアドレス、サブネットアドレス、ブロードキャストアドレスの計算</title>
<meta name="description" contents="IPとレンジからネットワークアドレス、ホストアドレス、サブネットアドレス、ブロードキャストアドレスを計算して表示します。10進数での表示と2進数での両方で分かりやすく表示しています。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/network_addr.js"></script>
<body>
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			<form class="form-horizontal" action="" method="" role="form">
				<fieldset>
					<legend>ネットワークアドレス</legend>
					<p class="info">IPとレンジから各種ネットワークアドレスを計算して表示します。<br />
									各表の下の行は2進表記したものです。<br />
									また、ネットワーク部は青色、ホストアドレス部は赤色になります。
					</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">IP/レンジ</label>
						<div class="form-inline">
							<input type="text" class="form-control input-sm" style="width:200px" id="ip" name="ip" maxlength="15" required>/
							<input type="text" class="form-control input-sm" style="width:50px" id="range" name="range" maxlength="2" required>
							<a href="#" class="btn btn-primary col-sm-offset-1" onclick="check();return false;">チェック</a>
						</div>
					</div>
					<table class="table small table-condensed table-bordered" style="width:80%">
						<caption>IPアドレス</caption>
						<tr>
							<td colspan="8"><strong><span id="ip1">0</span></strong></td>
							<td colspan="8"><strong><span id="ip2">0</span></strong></td>
							<td colspan="8"><strong><span id="ip3">0</span></strong></td>
							<td colspan="8"><strong><span id="ip4">0</span></strong></td>
						</tr>
						<tr>
							<td><span id="p1">0</span></td>
							<td><span id="p2">0</span></td>
							<td><span id="p3">0</span></td>
							<td><span id="p4">0</span></td>
							<td><span id="p5">0</span></td>
							<td><span id="p6">0</span></td>
							<td><span id="p7">0</span></td>
							<td><span id="p8">0</span></td>
							<td><span id="p9">0</span></td>
							<td><span id="p10">0</span></td>
							<td><span id="p11">0</span></td>
							<td><span id="p12">0</span></td>
							<td><span id="p13">0</span></td>
							<td><span id="p14">0</span></td>
							<td><span id="p15">0</span></td>
							<td><span id="p16">0</span></td>
							<td><span id="p17">0</span></td>
							<td><span id="p18">0</span></td>
							<td><span id="p19">0</span></td>
							<td><span id="p20">0</span></td>
							<td><span id="p21">0</span></td>
							<td><span id="p22">0</span></td>
							<td><span id="p23">0</span></td>
							<td><span id="p24">0</span></td>
							<td><span id="p25">0</span></td>
							<td><span id="p26">0</span></td>
							<td><span id="p27">0</span></td>
							<td><span id="p28">0</span></td>
							<td><span id="p29">0</span></td>
							<td><span id="p30">0</span></td>
							<td><span id="p31">0</span></td>
							<td><span id="p32">0</span></td>
						</tr>
					</table>
					<div class="form-group">
						<label class="col-sm-3 control-label">ネットワーク部</label>
						<span class="col-sm-4">
							<input type="text" class="form-control input-sm" id="net" name="net" value="" readonly />
						</span>
					</div>
					<table class="table small table-condensed table-bordered" style="width:80%">
						<caption>サブネットアドレス</caption>
						<tr>
							<td colspan="8"><strong><span id="sub1">0</span></strong></td>
							<td colspan="8"><strong><span id="sub2">0</span></strong></td>
							<td colspan="8"><strong><span id="sub3">0</span></strong></td>
							<td colspan="8"><strong><span id="sub4">0</span></strong></td>
						</tr>
						<tr>
							<td><span id="s1">0</span></td>
							<td><span id="s2">0</span></td>
							<td><span id="s3">0</span></td>
							<td><span id="s4">0</span></td>
							<td><span id="s5">0</span></td>
							<td><span id="s6">0</span></td>
							<td><span id="s7">0</span></td>
							<td><span id="s8">0</span></td>
							<td><span id="s9">0</span></td>
							<td><span id="s10">0</span></td>
							<td><span id="s11">0</span></td>
							<td><span id="s12">0</span></td>
							<td><span id="s13">0</span></td>
							<td><span id="s14">0</span></td>
							<td><span id="s15">0</span></td>
							<td><span id="s16">0</span></td>
							<td><span id="s17">0</span></td>
							<td><span id="s18">0</span></td>
							<td><span id="s19">0</span></td>
							<td><span id="s20">0</span></td>
							<td><span id="s21">0</span></td>
							<td><span id="s22">0</span></td>
							<td><span id="s23">0</span></td>
							<td><span id="s24">0</span></td>
							<td><span id="s25">0</span></td>
							<td><span id="s26">0</span></td>
							<td><span id="s27">0</span></td>
							<td><span id="s28">0</span></td>
							<td><span id="s29">0</span></td>
							<td><span id="s30">0</span></td>
							<td><span id="s31">0</span></td>
							<td><span id="s32">0</span></td>
						</tr>
					</table>
					<table class="table small table-condensed table-bordered" style="width:80%">
						<caption>ブロードキャストアドレス</caption>
						<tr>
							<td colspan="8"><strong><span id="broad1">0</span></strong></td>
							<td colspan="8"><strong><span id="broad2">0</span></strong></td>
							<td colspan="8"><strong><span id="broad3">0</span></strong></td>
							<td colspan="8"><strong><span id="broad4">0</span></strong></td>
						</tr>
						<tr>
							<td><span id="b1">0</span></td>
							<td><span id="b2">0</span></td>
							<td><span id="b3">0</span></td>
							<td><span id="b4">0</span></td>
							<td><span id="b5">0</span></td>
							<td><span id="b6">0</span></td>
							<td><span id="b7">0</span></td>
							<td><span id="b8">0</span></td>
							<td><span id="b9">0</span></td>
							<td><span id="b10">0</span></td>
							<td><span id="b11">0</span></td>
							<td><span id="b12">0</span></td>
							<td><span id="b13">0</span></td>
							<td><span id="b14">0</span></td>
							<td><span id="b15">0</span></td>
							<td><span id="b16">0</span></td>
							<td><span id="b17">0</span></td>
							<td><span id="b18">0</span></td>
							<td><span id="b19">0</span></td>
							<td><span id="b20">0</span></td>
							<td><span id="b21">0</span></td>
							<td><span id="b22">0</span></td>
							<td><span id="b23">0</span></td>
							<td><span id="b24">0</span></td>
							<td><span id="b25">0</span></td>
							<td><span id="b26">0</span></td>
							<td><span id="b27">0</span></td>
							<td><span id="b28">0</span></td>
							<td><span id="b29">0</span></td>
							<td><span id="b30">0</span></td>
							<td><span id="b31">0</span></td>
							<td><span id="b32">0</span></td>
						</tr>
					</table>


				</fieldset>
			</form>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>