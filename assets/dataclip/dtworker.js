//dtworker

self.importScripts("https://code.jquery.com/jquery-3.3.1.min.js","/assets/dataclip/dtfunctions.js");

console.log('dtworker loaded!');

onmessage = function(e) {
	// console.log(e);

	vfunction = e.data.vfunction;
	clientid = e.data.clientid;
	console.log(vfunction);
	console.log(clientid);

	switch (vfunction) {
		case 'get_client_info':
			get_client_info(clientid, true);
			break;
		default:
			// statements_def
			break;
	}

	// console.log('Message received from main script');
	// var workerResult = 'Result: ' + (e.data[0] * e.data[1]);
	// console.log('Posting message back to main script');
	// postMessage(workerResult);
}