// dns check
function get_dns_record() {
    var dns_domain = $("#dns_domain").val();
    
    var ajax = $.load_json("../ajax/GetDnsRecord.php",{dns_domain:dns_domain});
    ajax.done(function(data){
        if (data[0] && data[0].txt) $("#dns_dmarc").val(data[0].txt);
        else $("#dns_dmarc").val("Not found");
    });
}

function init() {
    $("#nav_list").each(function() {
        var li = $("li", this);
        li.removeClass("active");
    });
    $("#n_dns").addClass("active");
    
    $("#dns_domain").val("");
    $("#dns_dmarc").val("");
}
