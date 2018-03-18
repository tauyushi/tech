function init() {
    $("#nav_list").each(function() {
        var li = $("li", this);
        li.removeClass("active");
    });
    $("#n_report").addClass("active");
}

$(document).on('click','#upload',function(){
  var fd = new FormData();
  if ($("input[name='report']").val()!== '') {
    fd.append( "file", $("input[name='report']").prop("files")[0] );
  }
  var postData = {
    type : "POST",
    dataType : "json",
    data : fd,
    processData : false,
    contentType : false
  };
  $.ajax(
    "../ajax/analysis_report.php", postData
  ).done(function( json ){
    //console.log(json);
    html_data = "";
    if (json.report_metadata) {
        html_data = html_data + '<hr />' +
            '<table class="table table-striped" id="report_metadata">' + 
            '<caption>report_metadata</caption>' +
            '<tr>' + 
                '<td class="col-sm-3"><strong>org_name</strong></td>' + 
                '<td class="col-sm-3">' + json.report_metadata.org_name + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>email</strong></td>' + 
                '<td>' + json.report_metadata.email + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>extra_contact_info</strong></td>' + 
                '<td>' + json.report_metadata.extra_contact_info + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>report_id</strong></td>' + 
                '<td>' + json.report_metadata.report_id + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>date_range begin</strong></td>' + 
                '<td>' + json.report_metadata.date_range.begin + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>date_range end</strong></td>' + 
                '<td>' + json.report_metadata.date_range.end + '</td>' +
            '</tr>' +
            '</table>';
    }

    if (json.policy_published) {
        html_data = html_data +
            '<table class="table table-striped" id="policy_published">' + 
            '<caption>policy_published</caption>' +
            '<tr>' + 
                '<td class="col-sm-3"><strong>domain</strong></td>' + 
                '<td class="col-sm-3">' + json.policy_published.domain + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>adkim</strong></td>' + 
                '<td>' + json.policy_published.adkim + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>aspf</strong></td>' + 
                '<td>' + json.policy_published.aspf + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>p</strong></td>' + 
                '<td>' + json.policy_published.p + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>sp</strong></td>' + 
                '<td>' + json.policy_published.sp + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>pct</strong></td>' + 
                '<td>' + json.policy_published.pct + '</td>' +
            '</tr>' +
            '</table>';
    }
    
	var dmarc = new Object();
	dmarc["dkim"] = new Object();
	dmarc["spf"] = new Object();
	dmarc["dkim"]["pass"] = 0;
	dmarc["dkim"]["fail"] = 0;
	dmarc["spf"]["pass"] = 0;
	dmarc["spf"]["fail"] = 0;

	var dkim = new Object();
	dkim["pass"] = 0;
	dkim["fail"] = 0;
	dkim["none"] = 0;
	var spf = new Object();
	spf["pass"] = 0;
	spf["fail"] = 0;
	spf["none"] = 0;
    if (json.records && json.records.length > 0) {
        $.each(json.records, function(key,val) {
            html_data = html_data +
            '<table class="table table-striped d_record">' +
            '<caption>record' + (key+1) + '</caption>' +
            '<tr>' +
                '<td><strong>source_ip</strong></td>' +
                '<td colspan="2">' + val.row.source_ip + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>count</strong></td>' +
                '<td colspan="2">' + val.row.count + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td rowspan="3"><strong>policy_evaluated</strong></td>' +
                '<td><strong>disposition</strong></td>' +
                '<td>' + val.row.policy_evaluated.disposition + '</td>' +
            '</tr>' +
            '<tr>' + 
                '<td><strong>dkim</strong></td>' +
                '<td>' + val.row.policy_evaluated.dkim + '</td>' +
            '</tr>' +
            '<tr>' + 
                '<td><strong>spf</strong></td>' +
                '<td>' + val.row.policy_evaluated.spf + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>header_from</strong></td>' +
                '<td colspan="2">' + val.identifiers.header_from +'</td>' +
            '</tr>';
            if (val.row.policy_evaluated.dkim == "pass") dmarc["dkim"]["pass"]++;
			if (val.row.policy_evaluated.dkim == "fail") dmarc["dkim"]["fail"]++;
			if (val.row.policy_evaluated.spf == "pass") dmarc["spf"]["pass"]++;
			if (val.row.policy_evaluated.spf == "fail") dmarc["spf"]["fail"]++;
			
			if (val.auth_results.dkim.length > 1 ) {
				$.each(val.auth_results.dkim, function(k, v) {
					html_data = html_data +
					'<tr>' +
						'<td rowspan="3"><strong>dkim' + (k+1) + '</strong></td>' +
						'<td><strong>domain</strong></td>' +
						'<td>' + v.domain + '</td>' +
					'</tr>' +
					'<tr>' +
						'<td><strong>result</strong></td>' +
						'<td>' + v.result + '</td>' + 
					'</tr>' +
					'<tr>' +
						'<td><strong>human_result</strong></td>' +
						'<td></td>' + 
					'</tr>';
					if (v.result == "pass") dkim["pass"]++;
					if (v.result == "fail") dkim["fail"]++;
					if (v.result == "none") dkim["none"]++;
				});
			}
			else {
				html_data = html_data +
				'<tr>' +
					'<td rowspan="3"><strong>dkim</strong></td>' +
					'<td><strong>domain</strong></td>' +
					'<td>' + val.auth_results.dkim.domain + '</td>' +
				'</tr>' +
				'<tr>' +
					'<td><strong>result</strong></td>' +
					'<td>' + val.auth_results.dkim.result + '</td>' + 
				'</tr>' +
				'<tr>' +
					'<td><strong>human_result</strong></td>' +
					'<td></td>' + 
				'</tr>';
				if (val.auth_results.dkim.result == "pass") dkim["pass"]++;
				if (val.auth_results.dkim.result == "fail") dkim["fail"]++;
				if (val.auth_results.dkim.result == "none") dkim["none"]++;
			}

            html_data = html_data +
            '<tr>' +
                '<td rowspan="2"><strong>spf</strong></td>' +
                '<td><strong>domain</strong></td>' +
                '<td>' + val.auth_results.spf.domain + '</td>' +
            '</tr>' +
            '<tr>' +
                '<td><strong>result</strong></td>' +
                '<td>' + val.auth_results.spf.result + '</td>' + 
            '</tr>' +
            '</table>';
			if (val.auth_results.spf.result == "pass") spf["pass"]++;
			if (val.auth_results.spf.result == "fail") spf["fail"]++;
			if (val.auth_results.spf.result == "none") spf["none"]++;
        });
    }

	if (json.error) {
		html_data = json.error;
	}
	else {
		// drow chart
		/*
		Morris.Donut({
			element: 'donut_dmarc',
			data: [
				{label: "DKIM Pass", value: dmarc["dkim"]["pass"]},
				{label: "DKIM Fail", value: dmarc["dkim"]["fail"]},
				{label: "SPF Pass", value: dmarc["spf"]["pass"]},
				{label: "SPF Fail", value: dmarc["spf"]["fail"]}
			]
		});
		
		Morris.Donut({
			element: 'donut_dkim',
			data: [
				{label: "Pass", value: dkim["pass"]},
				{label: "Fail", value: dkim["fail"]},
				{label: "None", value: dkim["none"]}
			]
		});

		Morris.Donut({
			element: 'donut_spf',
			data: [
				{label: "Pass", value: spf["pass"]},
				{label: "Fail", value: spf["fail"]},
				{label: "None", value: spf["none"]}
			]
		});
		*/
	}
    
    $("#parsed").html(html_data);
  });
});