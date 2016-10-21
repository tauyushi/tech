<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] ビット演算　ツール</title>
<meta name="description" contents="AND、OR、XOR、反転、ビットシフトなどのビット演算処理をweb上で行えます。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/bit_operation.js"></script>
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
					<legend>ビット演算</legend>
					<p class="info">2つの値をボタンにある各種演算子で計算出来ます。基数を選択し、値をそれぞれ入れて下さい。<br />
									選択した基数で計算結果を表示します。また、値2は演算子によって使い方が異なります。
					</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">基数</label>
						<div class="col-sm-10">
							<span class="radio-inline"><input type="radio" name="radix" id="radix2" value="radix2"/>2進数</span>
							<span class="radio-inline"><input type="radio" name="radix" id="radix10" value="radix10" checked="checked"/>10進数</span>
							<span class="radio-inline"><input type="radio" name="radix" id="radix16" value="radix16"/>16進数</span>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">値1</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="value1" name="value1" maxlength="100" required></span><br />
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">値2</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="value2" name="value2" maxlength="100" required></span><br />
						<br />
						<div class="help col-sm-offset-2">※値2は~では使用しません。</div>
						<div class="help col-sm-offset-2">※値2はシフト演算(&lt;&lt;,&gt;&gt;)では移動する桁数をいれてください。</div>
					</div>
					<div class="form-group">
						<a href="#" class="btn btn-primary col-sm-offset-2" onclick="bit_and();return false;">&amp;</a>
						<a href="#" class="btn btn-primary" onclick="bit_or();return false;">|</a>
						<a href="#" class="btn btn-primary" onclick="bit_xor();return false;">^</a>
						<a href="#" class="btn btn-primary" onclick="bit_reverse();return false;">~</a>
						<a href="#" class="btn btn-primary" onclick="bit_leftshit();return false;">&lt;&lt;</a>
						<a href="#" class="btn btn-primary" onclick="bit_rightshit();return false;">&gt;&gt;</a>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">計算結果</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="value3" name="value3" value="" readonly></span><br />
					</div>
					<table class="table small table-condensed table-bordered col-sm-offset-1" style="width:70%">
						<tr>
							<td class="col-sm-2 pattarn_midasi"><strong>ビット演算子</strong></td>
							<td class="col-sm-2 pattarn_midasi"><strong>意味</strong></td>
							<td class="col-sm-3 pattarn_midasi"><strong>説明</strong></td>
						</tr>
						<tr>
							<td>&amp;</td>
							<td>論理積(AND)</td>
							<td>両方のビットが1のとき1</td>
						</tr>
						<tr>
							<td>|</td>
							<td>論理和(OR)</td>
							<td>いずれかのビットが1のとき1</td>
						</tr>
						<tr>
							<td>^</td>
							<td>排他的論理和(XOR)</td>
							<td>両方のビットが異なるとき1</td>
						</tr>
						<tr>
							<td>~</td>
							<td>反転</td>
							<td>ビットの反転</td>
						</tr>
						<tr>
							<td>&lt;&lt;</td>
							<td>左シフト</td>
							<td>基数倍にします</td>
						</tr>
						<tr>
							<td>&gt;&gt;</td>
							<td>右シフト</td>
							<td>基数分の1にします</td>
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