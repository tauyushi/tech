function submit() {
	var domain = $("#domain").val();

	var mec1 = $("#mechanism1").val();
	var mec2 = $("#mechanism2").val();
	var mec3 = $("#mechanism3").val();
	var mec4 = $("#mechanism4").val();
	var mec5 = $("#mechanism5").val();

	var val1 = $("#value1").val();
	var val2 = $("#value2").val();
	var val3 = $("#value3").val();
	var val4 = $("#value4").val();
	var val5 = $("#value5").val();
	var redirect = $("#redirect").val();

	var qua1 = $("#qualifier1").val();
	var qua2 = $("#qualifier2").val();
	var qua3 = $("#qualifier3").val();
	var qua4 = $("#qualifier4").val();
	var qua5 = $("#qualifier5").val();
	var redirect2 = $("#redirect2").val();

	if (!domain || domain == "") {
		alert("ドメインを入力してくさい。");
		return;
	}

	var reg = new RegExp(/([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}/g);
	if (domain && domain != "" && !domain.match(reg)) {
		alert("ドメインの形式が違います。");
		return;
	}

	if (!mec1 || mec1 == "") {
		alert("最低1つは値を入力してください。(1番上から入れてください。)");
		return;
	}

	if ((!val1 || val1 == "") && (mec1 != "all")) {
		alert("最低1つは値を入力してください。(1番上から入れてください。)");
		return;
	}

	reg = new RegExp(/(\d{1,3})\.(\d{1,3})\.(\d{1,3})\.(\d{1,3})/g);
	if (mec1 && mec1 == "ip4:" && !val1.match(reg)
		|| mec2 && mec2 == "ip4:" && !val2.match(reg)
		|| mec3 && mec3 == "ip4:" && !val3.match(reg)
		|| mec4 && mec4 == "ip4:" && !val4.match(reg)
		|| mec5 && mec5 == "ip4:" && !val5.match(reg)
	) {
		alert("IPの形式が違います。");
		return;
	}

	reg = new RegExp(/([a-zA-Z0-9_-]+\.)+[a-zA-Z]{2,4}/g);
	if ((mec1 && (mec1 == "a:" || mec1 == "mx:" || mec1 == "ptr:") && !val1.match(reg))
		|| (mec2 && (mec2 == "a:" || mec2 == "mx:" || mec2 == "ptr:") && !val2.match(reg))
		|| (mec3 && (mec3 == "a:" || mec3 == "mx:" || mec3 == "ptr:") && !val3.match(reg))
		|| (mec4 && (mec4 == "a:" || mec4 == "mx:" || mec4 == "ptr:") && !val4.match(reg))
		|| (mec5 && (mec5 == "a:" || mec5 == "mx:" || mec5 == "ptr:") && !val5.match(reg))
		|| (redirect != "" && !redirect.match(reg))
	) {
		alert("ドメインの形式が違います。");
		return;
	}

	var record = "-レコード-<br />" + domain + ".\tIN\tTXT\t" + '"v=spf1';
	record = record + ' ' + qua1 + mec1 + val1;
	if ((val2 && val2 != "") || (mec2 == "all")) record = record + ' ' + qua2 + mec2 + val2;
	if ((val3 && val3 != "") || (mec3 == "all")) record = record + ' ' + qua3 + mec3 + val3;
	if ((val4 && val4 != "") || (mec4 == "all")) record = record + ' ' + qua4 + mec4 + val4;
	if ((val5 && val5 != "") || (mec5 == "all")) record = record + ' ' + qua5 + mec5 + val5;
	if (redirect && redirect != "") record = record + ' ' + redirect2 + "redirect=" + redirect;
	record = record + '"';
	
	$("#print_spf").html(record);
}

$(function($) {
	$("#mechanism1, #mechanism2, #mechanism3, #mechanism4, #mechanism5").change(function(){
		var mec = $(this).val();
		if (mec == "all") {
			var val = $(this).parents("tr").find("input[name=value]");
			val.val("");
			val.hide();
		}
		else {
			var val = $(this).parents("tr").find("input[name=value]");
			val.show();
		}
	});
});

function init() {
	$("#domain").val("");
	$("#mechanism1").val("");
	$("#mechanism2").val("");
	$("#mechanism3").val("");
	$("#mechanism4").val("");
	$("#mechanism5").val("");
	$("#value1").val("");
	$("#value2").val("");
	$("#value3").val("");
	$("#value4").val("");
	$("#value5").val("");
	$("#qualifier1").val("+");
	$("#qualifier2").val("+");
	$("#qualifier3").val("+");
	$("#qualifier4").val("+");
	$("#qualifier5").val("+");
	$("#redirect").val("");
}