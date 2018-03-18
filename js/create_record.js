function submit(){
    var domain = $("#domain").val();
    if (domain.length == 0) {
        alert("ドメインを入力してください。");
        return false;
    }
    var p = $("#policy").val();  
    var sp = $("#sub_policy").val();
    var pct = $("#pct").val();
    var rua = $("#rua").val();
    var ri = $("#ri").val();
    var rf = $("#rf1").prop("checked"); // true:rf1, false:rf2
    var ruf = $("#ruf").val();
    var fo = $("#fo").val();
    var aspf = $("#aspf1").prop("checked"); // true:aspf1, false:aspf2
    var adkim = $("#adkim1").prop("checked"); // true:adkim1, false:adkim2
    
    var record = "_dmarc." + domain + "\tIN\tA\t" +
                 "\"v=DMARC1;p=" + p + ";";
    if (sp != "") record = record + "sp=" + sp + ";";
    if (pct != "") record = record + "pct=" + pct + ";";
    if (rua != "") {
        record = record + "rua=";
        rua_list = rua.split(",");
        record = record + "mailto:" + rua_list.join(",mailto:") + ";";
    }
    if (ri != "") record = record + "ri=" + ri + ";";
    if (rf) record = record + "rf=afrf;";
    else record = record + "rf=iodef;";
    if (ruf != "") {
        record = record + "ruf=";
        ruf_list = ruf.split(",");
        record = record + "mailto:" + ruf_list.join(",mailto:") + ";";
    }
    if (fo) record = record + "fo=" + fo + ";";
    if (aspf) record = record + "aspf=r;";
    else record = record + "aspf=s;";
    if (adkim) record = record + "adkim=r;";
    else record = record + "adkim=s;";
    record = record + "\"";
    $("#dmarc_record").val(record);
}

function init() {
    $("#nav_list").each(function() {
        var li = $("li", this);
        li.removeClass("active");
    });
    $("#n_record").addClass("active");

    $("#domain").val("");
    $("#policy").val("quarantine");
    $("#sub_policy").val("");
    $("#pct").val("");
    $("#rua").val("");
    $("#ri").val(86400);
    $("input[name=rf]").val(["rf1"]); // true:rf1, false:rf2
    $("#ruf").val("");
    $("#fo").val("");
    $("input[name=aspf]").val(["aspf1"]); // true:aspf1, false:aspf2
    $("input[name=adkim]").val(["adkim1"]); // true:adkim1, false:adkim2
    $("#dmarc_record").val("");
}