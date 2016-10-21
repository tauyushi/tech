function check() {
	var ip = $("#ip").val();
	var range = $("#range").val();
	var l_addr = ip.split(".");
	var ip1 = parseInt(l_addr[0], 10);
	var ip2 = parseInt(l_addr[1], 10);
	var ip3 = parseInt(l_addr[2], 10);
	var ip4 = parseInt(l_addr[3], 10);

	$("#ip1").html(ip1);
	$("#ip2").html(ip2);
	$("#ip3").html(ip3);
	$("#ip4").html(ip4);

	var ip_str1 = ("00000000" + ip1.toString(2)).slice(-8);
	var ip_str2 = ("00000000" + ip2.toString(2)).slice(-8);
	var ip_str3 = ("00000000" + ip3.toString(2)).slice(-8);
	var ip_str4 = ("00000000" + ip4.toString(2)).slice(-8);

	var ip_str = ip_str1 + ip_str2 + ip_str3 + ip_str4;

	for (var i = 0; i < ip_str.length; i++) {
		if (i < range) $("#p" + (i+1)).addClass('netword_addr');
		else $("#p" + (i+1)).addClass('host_addr');
		$("#p" + (i+1)).html(ip_str.charAt(i));
	}

	var network = (ip_str.substr(0, range)+ "00000000000000000000000000000000").substr(0, 32);
	var net = parseInt(network.substr(0,8),2).toString(10) + "."
			+	parseInt(network.substr(8,8),2).toString(10) + "."
			+	parseInt(network.substr(16,8),2).toString(10) + "."
			+	parseInt(network.substr(24,8),2).toString(10);
	$("#net").val(net);
	
	var subnet = "";
	for (var i = 0; i < 32; i++) {
		if (i < range) {
			subnet = subnet + "1";
			$("#s" + (i+1)).html("1");
			$("#s" + (i+1)).addClass('netword_addr');
		}
		else {
			subnet = subnet + "0";
			$("#s" + (i+1)).html("0");
			$("#s" + (i+1)).addClass('host_addr');
		}
	}

	var sub1 = parseInt(subnet.substr(0,8),2).toString(10);
	var sub2 = parseInt(subnet.substr(8,8),2).toString(10);
	var sub3 = parseInt(subnet.substr(16,8),2).toString(10);
	var sub4 = parseInt(subnet.substr(24,8),2).toString(10);

	$("#sub1").html(sub1);
	$("#sub2").html(sub2);
	$("#sub3").html(sub3);
	$("#sub4").html(sub4);

	var broad = (ip_str.substr(0, range)+ "11111111111111111111111111111111").substr(0, 32);
	var broad1 = parseInt(broad.substr(0,8),2).toString(10);
	var broad2 = parseInt(broad.substr(8,8),2).toString(10);
	var broad3 = parseInt(broad.substr(16,8),2).toString(10);
	var broad4 = parseInt(broad.substr(24,8),2).toString(10);

	$("#broad1").html(broad1);
	$("#broad2").html(broad2);
	$("#broad3").html(broad3);
	$("#broad4").html(broad4);

	for (var i = 0; i < 32; i++) {
		if (i < range) $("#b" + (i+1)).addClass('netword_addr');
		else $("#b" + (i+1)).addClass('host_addr');
		$("#b" + (i+1)).html(broad.charAt(i));
	}
}