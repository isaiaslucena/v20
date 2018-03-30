
console.log('testworker loaded!');

var num = 0;

msgtest();

function msgtest() {
	num = num + 1;
	postMessage(num);
	setTimeout("msgtest()", 2000);
}