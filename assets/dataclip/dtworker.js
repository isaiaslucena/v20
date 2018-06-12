//dtworker

// console.log('dtworker loaded!');

self.onmessage = function(e) {
	vfunction = e.data.vfunction;
	vmethod = e.data.method;
	vurl = e.data.url;
	vclientid = e.data.clientid;
	if (typeof e.data.trid !== 'undefined') {
		vtrid = e.data.trid;
	} else {
		vtrid = null;
	}
	vstartdate = e.data.startdate;
	venddate = e.data.enddate;
	vptype = e.data.ptype;
	if (typeof e.data.keywordid !== 'undefined') {
		vkeywordid = e.data.keywordid;
	} else {
		vkeywordid = 0;
	}

	http_req(vmethod, vurl, function(resp){
		postMessage({
			'vfunction': vfunction,
			'trid': vtrid,
			'clientid': vclientid,
			'keywordid': vkeywordid,
			'startdate': vstartdate,
			'enddate': venddate,
			'ptype': vptype,
			'response': resp.responseText});
	});
}

function http_req(method, url, callback) {
	var xhr;

	if (typeof XMLHttpRequest !== 'undefined') {
		xhr = new XMLHttpRequest();
	} else {
		var versions = [
			"MSXML2.XmlHttp.5.0",
			"MSXML2.XmlHttp.4.0",
			"MSXML2.XmlHttp.3.0",
			"MSXML2.XmlHttp.2.0",
			"Microsoft.XmlHttp"
		]

		for(var i = 0, len = versions.length; i < len; i++) {
			try {
				xhr = new ActiveXObject(versions[i]);
				break;
			}
			catch(e){}
		}
	}

	xhr.onreadystatechange = ensureReadiness;

	function ensureReadiness() {
		if(xhr.readyState < 4) {
			return;
		}

		if(xhr.status !== 200) {
			return;
		}

		if(xhr.readyState === 4) {
			callback(xhr);
		}
	}

	xhr.open(method, url, false);
	xhr.send(null);
}