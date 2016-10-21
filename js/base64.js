function encode() {
	var str = $("#input").val();
	if (str == "") {
		alert("文字列を入力してください。");
		return false;
	}
	var encoded = window.btoa(str);
	$("#print_data").html(encoded);
}

function decode() {
	var str = $("#input").val();
	if (str == "") {
		alert("文字列を入力してください。");
		return false;
	}
	var decoded = window.atob(str);
	$("#print_data").html(decoded);
}

function form_clear() {
	$("#input").val("");
	$("#print_data").html("");
}
