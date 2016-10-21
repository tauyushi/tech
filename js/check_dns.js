function submit() {
    var domain = $("#domain").val();
    var type = $("#type").val();
    
    var ajax = $.load_json("../ajax/DnsCheck.php",
		{domain:domain,
		 type:type
		});
	$("#print_dns").val("接続しています....");
    ajax.done(function(data){
		console.log(data);
		html_data = "";
		$.each(data, function(key, val) {
			html_data = html_data +
			'<table class="table table-striped d_record">' +
			'<caption>record' + (key+1) + '</caption>';
			$.each(val, function(k, v) {
				html_data = html_data +
				'<tr>' +
					'<td class="col-sm-2"><strong>' + k + '</strong></td>' +
					'<td class="col-sm-4">' + v + '</td>' +
				'</tr>';
			});
			html_data = html_data +
			'</table>';
		});
		$("#print_dns").html(html_data);
    }).fail(function(data){
		$("#print_dns").html("接続 NG");
	});
}