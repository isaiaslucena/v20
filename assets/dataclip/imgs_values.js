//JS

var nimage = [];

$('#datepickerrange').datepicker({
	format: "dd/mm/yyyy",
	language: 'pt-BR',
	todayBtn: true,
	todayHighlight: true,
	autoclose: true
	}).on('change', function(){
		$('#enddate').focus();
});

$('#btnsend').click(function(event) {
	$('#ullist').html(null);
	startdate = $('#startdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	enddate = $('#enddate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	$.ajax({
		url: '/api/get_imgs_values/'+startdate+'/'+enddate,
		type: 'GET',
		dataType: 'json'
	})
	.done(function(data) {
		$('#msgcval').fadeIn('fast');
		// console.log("success");
		// console.log(data);
		nn = 0;
		ni = 0;
		nt = data.length - 1;
		data.map(function(val, index) {
			// console.log(val);
			// console.log(index);
			nimage[index] = new Image();
			imgurl = "https://s3-sa-east-1.amazonaws.com/multclipp/arquivos/noticias/"+val.Data.replace(/-/g,'\/')+"/"+val.IdNoticia+"/"+val.Imagem;
			nimage[index].src = imgurl;

			nimage[index].onload = function() {

				marcarh = parseInt(val.MarcarH);
				marcarw = parseInt(val.MarcarW);
				valored = parseInt(val.ValorEditoria);
				imgw = this.width;
				imgh = this.height;
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
				// equivalencia = equivalencia.slice(-1, 12);
				equivalenciaarr = equivalencia.split('.');

				insert_db_info(val.IdImagem, val.IdNoticia, imgw, imgh, parseInt(equivalenciaarr[0]));
				console.log("IdNoticia "+val.IdNoticia+" e IdImagem "+val.IdImagem+". Equivalencia: "+parseInt(equivalenciaarr[0]));
				ni++;

				if (ni == nt) {
				$('#msgcval').fadeOut('fast', function() {
					$('#msgdone').fadeIn('fast');
				});
				}
			}

			nn++;

			if (nn == nt) {
				$('#msglimg').fadeOut('fast', function() {
					$('#msgcval').fadeIn('fast');
				});
			}
		})
	})
	.fail(function(data) {
		// console.log("error");
	})
	.always(function(data) {
		// console.log("complete");
	});
});

function insert_db_info(idimagem, idnoticia, imgwidth, imgheight, imgvalor) {
	html = '<li style="display: none" class="list-group-item">IdImagem: '+idimagem+'; IdNoticia: '+idnoticia+'; Valor: '+imgvalor+'</list>'
	$('#ullist').append(html);
	$('#ullist').children().last().fadeIn('fast');

	$.ajax({
		url: '/api/set_imgs_values',
		type: 'POST',
		dataType: 'json',
		data: {
			'IdImagem': idimagem,
			'IdNoticia': idnoticia,
			'imgwidth': imgwidth,
			'imgheight': imgheight,
			'equivalencia': imgvalor
		},
	})
	.done(function(data) {
		console.log("success");
		console.log(data);

	})
	.fail(function() {
		console.log("error");
	})
	.always(function() {
		console.log("complete");
	});
}