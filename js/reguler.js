function reg_check(){
	var str = $("#target").val();
	var r = $("#reg").val();
	
	if (r == "") {
		alert("正規表現を入力してください。");
		return;
	}

	if (str == "") {
		alert("対象文字列を入力してください。");
		return;
	}

	var reg = new RegExp(r);
	console.log(reg);
	var ret = str.match(reg);
	if(!ret) {
		$("#print_data").html("一致しません。");	
	}
	else {
		$("#print_data").html('一致しました。<br />' + '<span class="small">' + ret.join(',') + '</span>');
	}
}