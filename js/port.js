function submit() {
    var host = $("#host").val();
    var port = $("#port").val();
    
    var ajax = $.load_json("../ajax/Port.php",{host:host, port:port});
	$("#pinged").val("接続しています....");
    ajax.done(function(data){
		$("#pinged").val("接続 OK");
    }).fail(function(data){
		$("#pinged").val("接続 NG");
	});
}