function convert_radix(){
	var val1 = $("#value1").val()
	var val2 = $("#value2").val()
	var radix2 = $("#radix2").prop("checked");
	var radix10 = $("#radix10").prop("checked");
	var radix16 = $("#radix16").prop("checked");
	
	var radix = 10;

	if (radix2) {
		radix = 2;
	}
	else if (radix10) {
		radix = 10;
	}
	else if (radix16) {
		radix = 16;
	}

    val1 = parseInt(val1, radix);
    val2 = parseInt(val2, radix);

	return {
		val1:val1,
		val2:val2,
		radix:radix
	}
}

function bit_and(){
	var obj = convert_radix();
	$("#value3").val((obj.val1 & obj.val2).toString(obj.radix));
}

function bit_or(){
	var obj = convert_radix();
	$("#value3").val((obj.val1 | obj.val2).toString(obj.radix));
}

function bit_xor(){
	var obj = convert_radix();
	$("#value3").val((obj.val1 ^ obj.val2).toString(obj.radix));
}

function bit_reverse(){
	var obj = convert_radix();
	$("#value3").val(~(obj.val1).toString(obj.radix));
}

function bit_leftshit(){
	var obj = convert_radix();
	var val2 = parseInt($("#value2").val(), 10);
	$("#value3").val((obj.val1 << val2).toString(obj.radix));
}

function bit_rightshit(){
	var obj = convert_radix();
	var val2 = parseInt($("#value2").val(), 10);
	$("#value3").val((obj.val1 >> val2).toString(obj.radix));
}