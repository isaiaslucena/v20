
console.log('dtworker loaded!');

var num = 0;

messagetest();

function messagetest() {
	num = num + 1;
	postMessage(num);
	setTimeout("messagetest()", 1000);
}