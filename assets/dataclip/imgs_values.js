//JS

var btnsendbs, regsloaddata, ntl;
var nimage = [], nimageerr = [];
var getworker, setworker, calcworker;

if (window.Worker) {
	// getworker = new Worker('/assets/dataclip/getworker.js');
	// setworker = new Worker('/assets/dataclip/setworker.js');
	// limgsworker = new Worker('/assets/dataclip/limgsworker.js');
	calcworker = new Worker('/assets/dataclip/calcworker.js');
} else {
	console.log('Workers not avaialable!');
}

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
	btnsendbs = $(this).button('loading');
	$('#ullist').html(null);
	startdate = $('#startdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	enddate = $('#enddate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	$.ajax({
		url: '/api/get_imgs_values/'+startdate+'/'+enddate,
		type: 'GET',
		dataType: 'json'
	})
	.done(function(data) {
		datasize = data.length;
		if (datasize == 0) {
			swal('Não há registros no período selecionado!');
			btnsendbs.button('reset');
			$('#startdate').focus();
		} else if (datasize >= 1) {
			swal({
				title: 'Deseja continar?',
				text: "O período selecionado contém "+datasize+" registro(s)",
				type: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Sim',
				cancelButtonText: 'Não'
			}).then((result) => {
				if (result.value) {
					load_regs(data);
				} else {
					swal('Cancelado!');
				}
				btnsendbs.button('reset');
			})
		}
	})
	.fail(function(data) {
		swal({
			title: 'Erro!',
			text: 'Algo deu errado, por favor tente novamente.',
			type: 'error',
			confirmButtonText: 'Cool'
		})
	})
	.always(function(data) {
		// console.log("complete");
		// console.log(data);
	});
});

function load_regs(dataarray) {
	$('#msgcval').fadeIn('fast');
	// $('#msgcimg').fadeIn('fast');
	nimage = [];
	nimageerr = [];
	dataarray.map(function(val, index) {
		nimage[index] = new Image();
		imgurl = "https://s3-sa-east-1.amazonaws.com/multclipp/arquivos/noticias/"+val.Data.replace(/-/g,'\/')+"/"+val.IdNoticia+"/"+val.Imagem;
		nimage[index].src = imgurl;

		nimage[index].onerror = function(){
			nimageerr[index] = new Image();
			imgurl = "https://s3-sa-east-1.amazonaws.com/multclipp/backnoticias/"+val.Data.replace(/-/g,'\/')+"/"+val.IdNoticia+"/"+val.Imagem;
			nimageerr[index].src = imgurl;

			findel = $('#ullisterror').find('#ulerrimg-'+val.IdImagem).attr('id');
			// console.log(findel);
			if (findel == null) {
				html = '<a id="ulerrimg-'+val.IdImagem+'" style="display: none" href="'+imgurl+'" target="_blank" class="list-group-item">'+
								'IdImagem: '+val.IdImagem+' | IdNoticia: '+val.IdNoticia+'</a>';
				$('#ullisterror').append(html);
				$('#ullisterror').children().last().fadeIn('fast');
			}

			nimageerr[index].onerror = function(){
				findel = $('#ullisterrorbk').find('#ulerrimgbk-'+val.IdImagem).attr('id');
				// console.log(findel);
				if (findel == null) {
					html = '<a id="ulerrimgbk-'+val.IdImagem+'" style="display: none" href="'+imgurl+'" target="_blank" class="list-group-item">'+
									'IdImagem: '+val.IdImagem+' | IdNoticia: '+val.IdNoticia+'</a>';
					$('#ullisterrorbk').append(html);
					$('#ullisterrorbk').children().last().fadeIn('fast');
				}
			}

			nimageerr[index].onload = function() {
				imgw = this.width;
				imgh = this.height;
				calcworker.postMessage({'dados': val, 'imagew': imgw, 'imageh': imgh});
			}
		}

		nimage[index].onload = function() {
			imgw = this.width;
			imgh = this.height;
			calcworker.postMessage({'dados': val, 'imagew': imgw, 'imageh': imgh});
		}
	});

	calcworker.onmessage = function(event) {
		// console.log('calcworker message:');
		// console.log(event);
		html =	'<li style="display: none" class="list-group-item">'+
						'IdImagem: '+event.data.dados.IdImagem+' | IdNoticia: '+event.data.dados.IdNoticia+' | Valor: '+event.data.dados.equivalencia+'</list>';
		$('#ullist').append(html);
		$('#ullist').children().last().fadeIn('fast');
	};
}

function loadImagesInSequence(images) {
	if (!images.length) {
		return;
	}

	var img = new Image(), url = images.shift();

	img.onload = function(){ loadImagesInSequence(images) };
	img.src = url;
}

function insert_db_info(idimagem, idnoticia, imgwidth, imgheight, imgvalor) {
	html = '<li style="display: none" class="list-group-item">IdImagem: '+idimagem+' | IdNoticia: '+idnoticia+' | Valor: '+imgvalor+'</list>'
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