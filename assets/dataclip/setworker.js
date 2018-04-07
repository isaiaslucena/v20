//set worker

console.log('setworker loaded!');

importScripts('/assets/dataclip/dtworkerfunctions.js');

self.onmessage = function(e) {
	vfunction = e.data.vfunction;
	vmethod = e.data.method;
	vurl = e.data.url;

	http_req(vmethod, vurl, function(resp){
		postMessage({'vfunction': vfunction, 'response': resp.responseText});
	});
}