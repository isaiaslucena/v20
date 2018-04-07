//calc worker

console.log('calcworker loaded!');

self.onmessage = function(e) {
	// console.log(e);

	val = e.data.dados;

	marcarh = parseInt(val.MarcarH);
	marcarw = parseInt(val.MarcarW);
	valored = parseInt(val.ValorEditoria);
	imgw = e.data.imagew;
	val.imgw = e.data.imagew;
	imgh = e.data.imageh;
	val.imgh = e.data.imageh;
	edformato = val.Formato;
	switch (edformato) {
		case 1:
			//Jornal
			larguracm = 29.7;
			alturacm = 52;
			break;
		case 2:
			// Tabloide
			larguracm = 20;
			alturacm = 26.5;
			break;
		case 3:
			// Revista
			larguracm = 26;
			alturacm = 29.7;
			break;
		default:
			larguracm = 29.7;
			alturacm = 52;
			break;
	}

	larguracmimagem = (larguracm * marcarw) / imgw;
	if (larguracmimagem < 6.5) {
		coluna = 1;
	} else {
		coluna = larguracmimagem / 5;
	}
	alturacmimagem = (alturacm * marcarh) / imgh;

	equivalencia = (coluna * alturacmimagem * valored).toString();
	equivalenciaarr = equivalencia.split('.');
	val.equivalencia = equivalenciaarr[0];

	// console.log(val);
	//insert_db_info(val.IdImagem, val.IdNoticia, imgw, imgw, parseInt(equivalenciaarr[0]));
	// console.log("IdNoticia "+val.IdNoticia+" e IdImagem "+val.IdImagem+". Equivalencia: "+parseInt(val.equivalencia));

	http_req('POST', '/api/set_imgs_values', val, function(resp){
		postMessage({'dados': val, 'response': resp.responseText});
	});
}

function http_req(method, url, params, callback) {
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

	xhr.open(method, url, true);

	// console.log('Dados:');
	// console.log(params);
	paramsv = typeof params;
	// console.log('Params verify:')
	// console.log(paramsv);
	if (paramsv == 'object') {
		sparams =	'IdImagem='+params.IdImagem+
							'&IdNoticia='+params.IdNoticia+
							'&imgwidth='+params.imgw+
							'&imgheight='+params.imgw+
							'&equivalencia='+params.equivalencia;
		// console.log(sparams);
		xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded")
		xhr.send(sparams);
	} else {
		xhr.send(null);
	}
}