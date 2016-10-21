<!DOCTYPE html>
<html>
<head>
<title>Tech Crow[テッククロウ] SPFレコード　作成</title>
<meta name="description" contents="SPFレコードをweb上で自動生成します。複雑なルールを知らなくても項目を選択するだけで簡単にSPFレコードを作成出来ます。" />
<?php include_once("../base/header.html");?>
</head>
<script type="text/javascript" src="../js/spf.js"></script>
<body onload="init();">
<?php include_once("../base/top.html");?>
<div id="page_content" class="container">
	<div class="row">
		<div class="col-sm-3">
			<?php include_once("../base/navbar.html");?>
		</div>
		<div class="col-sm-9">
			<form class="form-horizontal" action="" method="get" role="form">
				<fieldset>
					<legend>SPFレコード作成</legend>
					<p class="info">SPFレコードを作成出来ます。送信元のドメインを最初のテキストボックスに、<br />
					条件のテーブルで接続条件を設定できます。<br />
					比較対象にIPを選んだら値にはIPをそれ以外を選んだらドメインを入れて下さい。
					</p>
					<div class="form-group">
						<label class="col-sm-2 control-label">ドメイン</label>
						<span class="col-sm-5"><input type="text" class="form-control input-sm" id="domain" name="domain" maxlength="256" required></span><br />
					</div>
					<div class="form-group">
						<table class="table">
							<caption>条件</caption>
								<tr>
									<td class="col-sm-3"><strong>比較対象</strong></td>
									<td class="col-sm-4"><strong>値</strong><span class="help">※比較対象にIP以外を選んだらドメインを入力。</span></td>
									<td class="col-sm-3"><strong>メールの扱い</strong></td>
								</tr>
								<tr>
									<td><select class="form-control input-sm" name="mechanism1" id="mechanism1">
											<option selected="selected" value=""></option>
											<option value="ip4:">IP</option>
											<option value="a:">ドメインから得たIP</option>
											<option value="mx:">MXから得たIP</option>
											<option value="ptr:">逆引きで得たドメイン</option>
											<option value="all">すべてのホスト</option>
											<option value="include:">他のSPFレコードを参照</option></td>
										</select>
									<td><input type="text" class="form-control input-sm" value="" id="value1" name="value"></td>
									<td><select class="form-control input-sm" name="qualifier1" id="qualifier1">
											<option selected="selected" value="+">(+)正常メール</option>
											<option value="-">(-)不当なメール（拒否）</option>
											<option value="~">(~)不当なメール（配信）</option>
											<option value="?">(?)SPF指定なし</option>
										</select></td>
								</tr>
								<tr>
									<td><select class="form-control input-sm" name="mechanism2" id="mechanism2">
											<option selected="selected" value=""></option>
											<option value="ip4:">IP</option>
											<option value="a:">ドメインから得たIP</option>
											<option value="mx:">MXから得たIP</option>
											<option value="ptr:">逆引きで得たドメイン</option>
											<option value="all">すべてのホスト</option>
											<option value=":include">他のSPFレコードを参照</option></td>
										</select>
									<td><input type="text" class="form-control input-sm" value="" id="value2" name="value"></td>
									<td><select class="form-control input-sm" name="qualifier2" id="qualifier2">
											<option selected="selected" value="+">(+)正常メール</option>
											<option value="-">(-)不当なメール（拒否）</option>
											<option value="~">(~)不当なメール（配信）</option>
											<option value="?">(?)SPF指定なし</option>
										</select></td>
								</tr>
								<tr>
									<td><select class="form-control input-sm" name="mechanism3" id="mechanism3">
											<option selected="selected" value=""></option>
											<option value="ip4:">IP</option>
											<option value="a:">ドメインから得たIP</option>
											<option value="mx:">MXから得たIP</option>
											<option value="ptr:">逆引きで得たドメイン</option>
											<option value="all">すべてのホスト</option>
											<option value="include:">他のSPFレコードを参照</option></td>
										</select>
									<td><input type="text" class="form-control input-sm" value="" id="value3" name="value"></td>
									<td><select class="form-control input-sm" name="qualifier3" id="qualifier3">
											<option selected="selected" value="+">(+)正常メール</option>
											<option value="-">(-)不当なメール（拒否）</option>
											<option value="~">(~)不当なメール（配信）</option>
											<option value="?">(?)SPF指定なし</option>
										</select></td>
								</tr>
								<tr>
									<td><select class="form-control input-sm" name="mechanism4" id="mechanism4">
											<option selected="selected" value=""></option>
											<option value="ip4:">IP</option>
											<option value="a:">ドメインから得たIP</option>
											<option value="mx:">MXから得たIP</option>
											<option value="ptr:">逆引きで得たドメイン</option>
											<option value="all">すべてのホスト</option>
											<option value="include:">他のSPFレコードを参照</option></td>
										</select>
									<td><input type="text" class="form-control input-sm" value="" id="value4" name="value"></td>
									<td><select class="form-control input-sm" name="qualifier4" id="qualifier4">
											<option selected="selected" value="+">(+)正常メール</option>
											<option value="-">(-)不当なメール（拒否）</option>
											<option value="~">(~)不当なメール（配信）</option>
											<option value="?">(?)SPF指定なし</option>
										</select></td>
								</tr>
								<tr>
									<td><select class="form-control input-sm" name="mechanism5" id="mechanism5">
											<option selected="selected" value=""></option>
											<option value="ip4:">IP</option>
											<option value="a:">ドメインから得たIP</option>
											<option value="mx:">MXから得たIP</option>
											<option value="ptr:">逆引きで得たドメイン</option>
											<option value="all">すべてのホスト</option>
											<option value="include:">他のSPFレコードを参照</option></td>
										</select>
									<td><input type="text" class="form-control input-sm" value="" id="value5" name="value"></td>
									<td><select class="form-control input-sm" name="qualifier5" id="qualifier5">
											<option selected="selected" value="+">(+)正常メール</option>
											<option value="-">(-)不当なメール（拒否）</option>
											<option value="~">(~)不当なメール（配信）</option>
											<option value="?">(?)SPF指定なし</option>
										</select></td>
								</tr>
								<tr>
									<td>他のドメインに処理を移譲</td>
									<td><input type="text" class="form-control input-sm" value="" id="redirect" name="redirect"></td>
									<td><select class="form-control input-sm" name="redirect2" id="redirect2">
											<option selected="selected" value="+">(+)正常メール</option>
											<option value="-">(-)不当なメール（拒否）</option>
											<option value="~">(~)不当なメール（配信）</option>
											<option value="?">(?)SPF指定なし</option>
										</select></td>
								</tr>
						</table>
					</div>

					<div class="form-group">
						<a href="#" class="btn btn-primary col-sm-offset-9 col-sm-2" id="submit" onclick="submit();return false;">作成</a>
					</div>
				</fieldset>
			</form>
			<p id="print_spf" style="font-size:large"></p>
			<div class="help">
				※IPはIPv4のみ対応です。<br />
				※比較対象にIPを選んだ場合はIPを、それ以外はドメインを入力してください。(すべてのホストを選んだ場合は値は入力できません。)<br />
				※上の項目ほど優先順位が高くなります。<br />
				※他のドメインに処理を移譲(redirect)に値を入力した場合、すべてのホスト(all)が無意味になりますので注意ください。
			</div>
		</div>
	</div>
</div>
<?php include_once("../base/footer.html");?>
</body>
</html>