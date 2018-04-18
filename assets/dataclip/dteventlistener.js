//Event Listeners

$('#selclient').change(function(event) {
	subkeywordsarr = [];
	tvarr = [], varr = [], earr = [], pcarr = [];

	salertloading(isTouchDevice());

	cid = $(this).children(':selected').attr('data-clientid');
	cname = event.target.value;
	console.log('Client ID: '+cid);
	console.log('Client Name: '+cname);

	get_client_info(cid, false);
	count_vtype(cid, todaydate, todaydate);
	count_rating(cid, todaydate, todaydate);
	count_states(cid, todaydate, todaydate);
	count_client(cid, todaydate, todaydate);
	$('.actual_range').datepicker('update', new Date(todaydate+'T00:00:00-03:00'));
	get_subject_keywords(cid, todaydate, todaydate, true, function(keywid){
		add_keyword_news(keywid, cid, todaydate, todaydate, true, 'startpage');
	});
});

$('#bannerheader').on('load', function() {
	// console.log('Image loaded in DOM!');
	// bannerurl = $(this).attr('src');
	setcolors();
});

cdatebtn.click(function(event) {
	salertloading(isTouchDevice());
	cdatebtn.ladda('start');

	if (clientselid == 0) {
		cliid = cid;
	} else {
		cliid = clientselid;
	}

	fdpstartdate = $('#dpsdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	fdpenddate = $('#dpedate').data('datepicker').getFormattedDate('yyyy-mm-dd');

	count_vtype(cliid, fdpstartdate, fdpenddate);
	count_rating(cliid, fdpstartdate, fdpenddate);
	count_states(cliid, fdpstartdate, fdpenddate);
	count_client(cliid, fdpstartdate, fdpenddate);
	get_subject_keywords(cliid, fdpstartdate, fdpenddate, true, function(keywid){
		add_keyword_news(keywid, cliid, fdpstartdate, fdpenddate, true, 'selecteddate');
	});
});

cadsbtn.click(function(event) {
	cadsbtn.ladda('start');

	vstartdate = $('#adsstartdate').val();
	venddate = $('#adsenddate').val();

	if (vstartdate.length == 0) {
		$('#adsstartdate.tooltipinput').tooltip('show');
		return
	} else {
		$('#adsstartdate.tooltipinput').tooltip('hide');
	}

	if (venddate.length == 0) {
		$('#adsenddate.tooltipinput').tooltip('show');
		return
	} else {
		$('#adsenddate.tooltipinput').tooltip('hide');
	}


	if (clientselid == 0) {
		cliid = cid;
	} else {
		cliid = clientselid;
	}

	adsstartdate = $('#adsstartdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	adsenddate = $('#adsenddate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	adsstarttime = $('#adsstarttime').val();
	adsendtime = $('#adsendtime').val();

	$('#dpsdate').datepicker('update', new Date(adsstartdate+'T00:00:00'));
	$('#dpedate').datepicker('update', new Date(adsenddate+'T00:00:00'));

	adsveiculossites = $('#adsveiculosites').val();
	if (adsveiculossites.length > 0) {
		console.log('veiculo sites selecionado!');
	} else {
		console.log('nenhum veiculo sites selecionado!');
	}
	// console.log(adsveiculossites);

	adsveiculoarr = adsveiculoarr.concat(adsveiculossites);

	adstext = $('#adstext').val();

	var adssearchdata = {
		'idempresa': cliid,
		'startdate': adsstartdate,
		'enddate': adsenddate,
		'starttime': adsstarttime,
		'endtime': adsendtime,
		'subjectsid': adssubjectarr,
		'keywordsid': adskeywordarr,
		'tveiculosid': adstveiculoarr,
		'veiculosid': adsveiculoarr,
		'editoriasid': adseditoriaarr,
		'estadosid': adsstatesarr,
		'texto': adstext,
		'destaque': adsdestaque,
		'motivacao': adsmotivacaoarr,
		'avaliacao': adsavaliacaoarr
	};

	// tablenews.destroy();

	tablenews = $('#tablenews').DataTable({
		'destroy': true,
		'autoWidth': false,
		'order': [
			[0, 'desc'],
			[1, 'desc']
		],
		'columnDefs': [
			{'searchable': false, 'width': '5%', 'responsivePriority': 0, 'targets': 0},
			{'searchable': false, 'width': '5%', 'targets': 1},
			{'searchable': true, 'width': '15%', 'targets': 2},
			{'searchable': true, 'width': '5%', 'responsivePriority': 1, 'targets': 3},
			{'searchable': true, 'width': '5%', 'targets': 4},
			{'searchable': true, 'width': '15%', 'targets': 5},
			{'searchable': false, 'width': '40%', 'responsivePriority': 2, 'targets': 6},
			{'searchable': false, 'width': '10%', 'targets': 7},
			{'searchable': false, 'width': '10%', 'targets': 8}
		],
		'responsive': true,
		'scrollX': false,
		'processing': true,
		'server-side': true,
		'ajax': {
			'url': '/home/advsearch',
			'type': 'POST',
			'data': function(d) {return JSON.stringify(adssearchdata)}
		},
		"columns": [
			{'data': 'Data'},
			{'data': 'Hora'},
			{'data': 'TipoVeiculo'},
			{'data': 'Veiculo'},
			{'data': 'Editoria'},
			{'data': 'PalavraChave'},
			{'data': 'Titulo'},
			{'data': 'EdValor'},
			{'data': 'EdAudiencia'}
		],
		'rowId': 'Id',
		'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'},
		'initComplete': function(settings) {
			this.api().columns(2).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_2" class="filter selectpicker dropup" data-dropupAuto="false" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" data-container="body" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});

			this.api().columns(3).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_3" class="filter selectpicker dropup" data-dropupAuto="false" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" data-container="body" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});

			this.api().columns(4).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_4" class="filter selectpicker dropup" data-dropupAuto="false" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" data-container="body" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});

			this.api().columns(5).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_5" class="filter selectpicker dropup" data-dropupAuto="false" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" data-container="body" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});
			$('.filter.selectpicker').selectpicker('refresh');
		}
	});

	// postData('/home/advsearch', adssearchdata)
	// .then(
	// 	data => {
	// 		console.log(data);
	// 		cadsbtn.ladda('stop');
	// 		// setTimeout(cadsbtn.ladda('stop'), 4000);
	// 	}
	// ).catch(
	// 	error => {
	// 		console.error(error);
	// 		cadsbtn.ladda('stop');
	// 	}
	// );

	cadsbtn.ladda('stop');
	$('#advancedsearch').modal('hide');
	$('input').iCheck('uncheck');
});

$('input').on('ifChecked', function(event) {
	dtype = $(this).attr('data-type');
	dval = $(this).attr('data-val');

	switch (dtype) {
		case 'adsdestaque':
			adsdestaque = dval;
			break;
		case 'adsmotivacao':
			adsmotivacaoarr.push(dval);
			break;
		case 'adsavaliacao':
			adsavaliacaoarr.push(dval);
			break;
		default:
			console.log('option not recognized!');
			break;
	}
	// console.log('destaque:');
	// console.log(adsdestaque);

	// console.log('motivacao:');
	// console.log(adsmotivacaoarr);

	// console.log('avaliacao:');
	// console.log(adsavaliacaoarr);
});

$('input').on('ifUnchecked', function(event) {
	dtype = $(this).attr('data-type');
	dval = $(this).attr('data-val');

	switch (dtype) {
		case 'adsdestaque':
			//do nothing;
			break;
		case 'adsmotivacao':
			aindex = adsmotivacaoarr.indexOf(dval);
			adsmotivacaoarr.splice(aindex, 1);
			break;
		case 'adsavaliacao':
			aindex = adsavaliacaoarr.indexOf(dval);
			adsavaliacaoarr.splice(aindex, 1);
			break;
		default:
			console.log('option not recognized!');
			break;
	}
});

$('.modal').on('show.bs.modal', function(event) {
	$('html').css('overflow-y', 'hidden');
});

$('.modal').on('hide.bs.modal', function(event) {
	$('html').css('overflow-y', 'auto');
});

$('#advancedsearch').on('shown.bs.modal', function(event){
	adssubjectarr = [], adskeywordarr = [], adstveiculoarr = [], adsveiculoarr = [], adseditoriaarr = [], adsstatesarr = [];
});

$('#showsinglenews').on('hide.bs.modal', function(event) {
	$('#mediactni').css('display', 'none');
	$('#modalcsinglenewsi').css('display', 'none');
	$('#modalcsinglenewsv').css('display', 'none');
	$('#modaltitlerow').css('display', 'none');
	$('#btnsgroupsnews').css('display', 'none');
	if (isTouchDevice() == false) {
		$('#showsinglenews > .modal-dialog.modal-lg').css('width', '900px');
	}

	$('#mediactni').css('overflow-y', 'hidden');
	$('#modal-texti').slimScroll({
		height: '250px',
		railVisible: true,
		touchScrollStep: 800
	});


	if ($('#btnurl').hasClass('disabled') == false) {
		$('#btnurl').addClass('disabled');
		$('#btnurl').attr('disabled', true);
	}

	$('#mediaimgload').css('display', 'block');
	$('#modalwsinglenews').css('display', 'block');

	if (mediatype == 'video' || mediatype == 'audio') {
		var mmediadel = $('#mediaelvideo');
		if (mmediadel[0].paused) {
			// mmediadel[0].play();
		} else {
			mmediadel[0].pause();
		}
	}
});

$('#tablenews').on(
	'click',
	'tbody > tr > td:nth-child(2),'+
	'tbody > tr > td:nth-child(3),'+
	'tbody > tr > td:nth-child(4),'+
	'tbody > tr > td:nth-child(5),'+
	'tbody > tr > td:nth-child(6),'+
	'tbody > tr > td:nth-child(8),'+
	'tbody > tr > td:nth-child(9)',
	function (event) {
		// var trc = tablenews.row(this).node();
		$(this).parent().toggleClass('selected');
		trselclass = $(this).parent().hasClass('selected');
		trselid = $(this).parent().attr('id');
		if (trselclass) {
			trselected.push(trselid);
		} else {
			trselidx = trselected.indexOf(trselid);
			trselected.splice(trselidx, 1);
		}
		console.log(trselected);
	}
);

$(document).on('click', '.tooltipa', function(event) {
	var titlec = $(this);
	var titletrid = titlec.parent().parent().attr('id');
	var titlenid = titlec.attr('data-newsid');
	var titlekid = titlec.attr('data-keywordid');
	var titlecid = titlec.attr('data-clientid');

	$('#showsinglenews').modal('show');
	get_single_news(titlenid, titlecid, function(tndata) {
		snewsid = tndata.Id;
		snewsdate = tndata.Data;
		snewstime = tndata.Hora;

		sdata = snewsdate.trim();
		shora = snewstime.trim();
		if (shora == '' || shora == ' ' || shora == '0:0') {
			shora = '00:00';
		}
		saldataf = sdata+'T'+shora;
		sdatetime = new Date(saldataf);
		sday = sdatetime.getDate();
		sday = ('0'+sday).slice(-2);
		smonth = (sdatetime.getMonth() + 1);
		smonth = ('0'+smonth).slice(-2);
		snmonharr = sdatetime.toString().split(' ');
		snmonth = snmonharr[1];
		syear = sdatetime.getFullYear();
		shour = sdatetime.getHours();
		shour = ('0'+shour).slice(-2);
		sminutes = sdatetime.getMinutes();
		sminutes = ('0'+sminutes).slice(-2);

		dtnow = new Date();
		dtnday = dtnow.getDate();
		dtnday = ('0'+dtnday).slice(-2);
		dtnmonth = (dtnow.getMonth() + 1);
		dtnmonth = ('0'+dtnmonth).slice(-2);
		dtnnmonharr = dtnow.toString().split(' ');
		dtnnmonth = dtnnmonharr[1];
		dtnyear = dtnow.getFullYear();
		dtnhour = dtnow.getHours();
		dtnhour = ('0'+dtnhour).slice(-2);
		dtnminutes = dtnow.getMinutes();
		dtnminutes = ('0'+dtnminutes).slice(-2);

		if (sdatetime > dtnow) {
			snewsfdatetime = dtnday+'/'+dtnmonth+'/'+dtnyear+' '+dtnhour+':'+dtnminutes;
		} else {
			snewsfdatetime = sday+'/'+smonth+'/'+syear+' '+shour+':'+sminutes;
		}

		snewstitle = tndata.Titulo;
		snewssubtitle = tndata.Subtitulo;
		snewscontent = tndata.Noticia;
		snewsauthor = tndata.Autor;
		snewsurl = tndata.URL;
		snewstveid = parseInt(tndata.IdTipoVeiculo);
		snewstve = tndata.TipoVeiculo;
		snewsvid = parseInt(tndata.idVeiculo);
		snewsve = tndata.Veiculo;
		snewseid = parseInt(tndata.idEditoria);
		snewsed = tndata.Editoria;
		snewsimg = tndata.Imagem;
		snewsmw = parseInt(tndata.MarcarW);
		snewsmh = parseInt(tndata.MarcarH);
		snewsx1 = parseInt(tndata.MarcarX1);
		snewsx2 = parseInt(tndata.MarcarX2);
		snewsy1 = parseInt(tndata.MarcarY1);
		snewsy2 = parseInt(tndata.MarcarY2);

		var snewspchave = '';
		arrcount = tndata.PChaves.length;
		pcount = 1;
		$.each(tndata.PChaves, function(index, val) {
			if (pcount == arrcount){
				snewspchave += val.PChave;
			} else {
				snewspchave += val.PChave+' | ';
			}
			pcount += 1;
		});

		snewsidass = tndata.IdAssunto;
		snewsass = tndata.Assunto;

		snewsmot = tndata.Motivacao;
		var snewsmotstr;
		snewsava = tndata.Avaliacao;
		var snewsavastr;

		snewseqv = Number(tndata.Equivalencia).toLocaleString("pt-BR", {minimumFractionDigits: 2});
		snewseqv = 'R$ '+snewseqv;
		snewsaud = Number(tndata.Audiencia).toLocaleString("pt-BR");

		switch(snewsmot) {
			case '0':
				snewsmotstr = '<span class="text-warning">Espontânea</span>';
				break;
			case '1':
				snewsmotstr = '<span class="text-warning">Espontânea</span>';
				break;
			default:
				snewsmotstr = 'Não Definido';
		}

		switch(snewsava) {
			case '0':
				snewsavastr = '<span class="text-warning">Neutro</span>';
				break;
			case '1':
				snewsavastr = '<span class="text-danger">Negativo</span>';
				break;
			case '2':
				snewsavastr = '<span class="text-warning">Neutro</span>';
				break;
			case '3':
				snewsavastr = '<span class="text-success">Positivo</span>';
		}

		$('#modaltitleve').html('<strong>Veículo:</strong> '+snewsve);
		$('#modaltitleed').html('<strong>Editoria:</strong> '+snewsed);
		$('#modaltitlevm').html('<strong>Motivação:</strong> '+snewsmotstr);
		$('#modaltitleva').html('<strong>Avaliação:</strong> '+snewsavastr);
		$('#modaltitlevq').html('<strong>Audiência:</strong> '+snewsaud);
		$('#modaltitlevv').html('<strong>Equivalência:</strong> '+snewseqv);

		if ($('#'+titletrid).hasClass('selected')) {
			$('#btnselclo').attr('disabled', true);
			$('#btnselclo').addClass('disalbed');
			$('#btnselclo').removeAttr('data-trid', titletrid);
		} else {
			$('#btnselclo').attr('disabled', false);
			$('#btnselclo').removeClass('disalbed');
			$('#btnselclo').attr('data-trid', titletrid);
		}

		// multclipimgurl = 'http://www.multclipp.com.br/arquivos/noticias/'+snewsdate.replace(/-/g,'\/')+'/'+snewsid;
		multclipimgurl = 'https://s3-sa-east-1.amazonaws.com/multclipp/arquivos/noticias/'+snewsdate.replace(/-/g,'\/')+'/'+snewsid;
		rgxvideo = new RegExp('(.mp4)', 'ig');
		rgxaudio = new RegExp('(.mp3)', 'ig');
		rgximage = new RegExp('(.jpeg|.jpg|.png|.bmp)', 'ig');
		rgximageaws = new RegExp('s3.amazonaws.com', 'ig');
		if (rgxvideo.test(snewsimg)) {
			mediatype = 'video';
			$('#btndown').attr('data-downtype', 'video');
			$('#modaltitlevkv').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#mediactntv').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
			$('#datemediactnv').text(snewsfdatetime)
			$('#mediactnv').html('<video id="mediaelvideo" class="img-responsive center-block" src="'+multclipimgurl+'/'+snewsimg+'" autobuffer controls style="width: 65%"></video>');
			$('#modal-textv').html(snewscontent);
		} else if (rgxaudio.test(snewsimg)) {
			mediatype = 'audio';
			$('#btndown').attr('data-downtype', 'audio');
			$('#modaltitlevkv').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#mediactntv').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
			$('#datemediactnv').text(snewsfdatetime);
			$('#mediactnv').html('<audio id="mediaelvideo" class="center-block" style="width: 100%" src="'+multclipimgurl+'/'+snewsimg+'" autobuffer controls></audio>');
			$('#modal-textv').html(snewscontent);
		} else if (rgximage.test(snewsimg)) {
			mediatype = 'image';
			$('#modaltitlevki').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#mediactnti').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
			$('#datemediactni').text(snewsfdatetime);

			if (snewstveid == 3 || snewstveid == 10 || snewstveid == 12 || snewstveid == 18) {
				$('#btndown').attr('data-downtype', 'facsimile');
				imgobj = new Image();
				// imgobj.crossOrigin = 'Anonymous';
				crosimg = '/home/proxy/'+btoa(multclipimgurl+'/'+snewsimg);
				// imgobj.src = multclipimgurl+'/'+snewsimg;
				imgobj.src = crosimg;

				imgobj.onload = function(event) {
					imgobjw = imgobj.width;
					imgobjh = imgobj.height;

					document.getElementById('mediactni').innerHTML = '';
					imgobj.setAttribute('id', 'mediaelimg');
					document.getElementById('mediactni').appendChild(imgobj);

					$('#mediaelimg').Jcrop(
						{
							keySupport: false,
							trueSize: [imgobjw, imgobjh],
							setSelect: [ 0, 0, 0, 0 ],
							boxWidth: 280,
							boxHeight: 400,
						},
						function()
						{
							jcropdestroy = true;
							jcrop_api = this;
						}
					);

					jcrop_api.animateTo([ snewsx1, snewsy1, snewsx2, snewsy2 ]);
					jcrop_api.disable();


					//imgdown
					// canvas = document.createElement('canvas');
					// ctx = canvas.getContext('2d');

					// imgw = imgobj.width;
					// imgh = imgobj.height;
					// ctx.canvas.width = imgw;
					// ctx.canvas.height = imgh;

					// ctx.drawImage(imgobj, 0, 0);
					// ctx.fillStyle = 'rgba(0, 0, 0, 0.8)';
					// ctx.fillRect(0, 0, imgw, imgh);
					// ctx.drawImage(imgobj, snewsx1, snewsy1, snewsmw, snewsmh, snewsx1, snewsy1, snewsmw, snewsmh);

					// document.getElementById('divmediacanvas').innerHTML = '';
					// canvas.setAttribute('id', 'mediacanvas');
					// document.getElementById('divmediacanvas').appendChild(canvas);

					// canvasel = document.getElementById('mediacanvas');
					// canvasdataURL = canvasel.toDataURL('image/png').replace('image/png', 'application/stream');

					// $('#btndowbfs').attr({
					// 	'href': canvasdataURL,
					// 	'download': 'facsimile.png'
					// });

					$('#mediaimgload').fadeOut('fast', function() {
						$('#mediactni').fadeIn('fast');
						// $('#mediactni').click(function(event) {
						// 	$('.imggrad').css('display', 'none');
						// 	$(this).css('overflow-y', 'auto');
						// });
					});
				}

				imgobj.onerror = function() {
					imgobj.src = '/assets/imgs/noimage.png';
				}
			} else {
				$('#btndown').attr('data-downtype', 'image');
				$('#mediactni').html(
					'<div class="imggrad"><span>Exibir tudo</span></div>'+
					'<img id="mediaelimg" class="img-responsive" src="'+multclipimgurl+'/'+snewsimg+'">'
				);

				$('#mediaelimg').on('load', function() {
					$('#mediaimgload').fadeOut('fast', function() {
						$('#mediactni').fadeIn('fast');
						$('#mediactni').click(function(event) {
							$('.imggrad').css('display', 'none');
							$(this).css('overflow-y', 'auto');
						});
					});
				});
			}

			$('#btnurl').removeClass('disabled');
			$('#btnurl').attr('disabled', false);
			$('#btnurl').attr('href', snewsurl);

			$.each(tndata.PChaves, function(index, val) {
				snewsgrf = val.Grifar.trim();
				snewsgrf = snewsgrf.split(';');
				$.each(snewsgrf, function(index, gval) {
					if (gval.length > 0) {
						rgxkw = new RegExp('\\b'+gval+'\\b', 'ig');
						snewscontent = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+gval+'</strong>');
					}
				});
			});
			$('#modal-texti').html(snewscontent);
		} else if (rgximageaws.test(snewsurl)) {
			mediatype = 'image';
			$('#modaltitlevki').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#mediactnti').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
			$('#datemediactni').text(snewsfdatetime);
			$('#mediactni').html(
				'<div class="imggrad"><span>Exibir tudo</span></div>'+
				'<img id="mediaelimg" class="img-responsive" src="'+snewsurl+'">'
			);

			$.each(tndata.PChaves, function(index, val) {
				snewsgrf = val.Grifar.trim();
				snewsgrf = snewsgrf.split(';');
				$.each(snewsgrf, function(index, gval) {
					if (gval.length > 0) {
						rgxkw = new RegExp('\\b'+gval+'\\b', 'g');
						snewscontent = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+gval+'</strong>');
					}
				});
			});
			$('#modal-texti').html(snewscontent);
		} else {
			$('#btndown').attr('data-downtype', 'noimage');
			mediatype = 'image';
			$('#modaltitlevki').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#mediactnti').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
			$('#datemediactni').text(snewsfdatetime);
			$('#mediactni').html(
				'<img id="mediaelimg" class="img-responsive" src="/assets/imgs/noimage.png">'
			);

			$.each(tndata.PChaves, function(index, val) {
				snewsgrf = val.Grifar.trim();
				snewsgrf = snewsgrf.split(';');
				$.each(snewsgrf, function(index, gval) {
					if (gval.length > 0) {
						rgxkw = new RegExp('\\b'+gval+'\\b', 'ig');
						snewscontent = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+gval+'</strong>');
					}
				});
			});
			$('#modal-texti').html(snewscontent);

			$('#btnurl').removeClass('disabled');
			$('#btnurl').attr('disabled', false);
			$('#btnurl').attr('href', snewsurl);
		}

		if (mediatype == 'image') {
			$('#mediaelimg').on('error', function() {
				$(this).attr('src', '/assets/imgs/noimage.png');
				$('.imggrad').css('display', 'none');
			});
		} else {
			$('#mediaelvideo').on('loadeddata', function() {
				$('#mediavideoload').fadeOut('fast', function() {
					$('#mediactnv').fadeIn('fast');
				});
			});
		}

		$('#modalwsinglenews').fadeOut('fast', function() {
			$('#modaltitlerow').fadeIn('fast');
			if (mediatype == 'image') {
				$('#modalcsinglenewsi').fadeIn('fast');
			} else {
				$('#modalcsinglenewsv').fadeIn('fast');
			}
			$('#btnsgroupsnews').fadeIn('fast');
		});
	});
});

$('#btnselclo').click(function(event) {
	// $('#modal-texti').scrollTop(0);
	$('#modal-texti').slimScroll({scrollTo: '0px'});
	$('#mediactni').scrollTop(0);

	btnsctrid = $(this).attr('data-trid');

	if ($('#'+btnsctrid).hasClass('selected') == false) {
		$('#'+btnsctrid).addClass('selected');
	}

	$('#showsinglenews').modal('hide');
});

document.getElementById('btnclose').addEventListener('click', function(){
	// document.getElementById('modal-texti').scrollTop = 0;
	$('#modal-texti').slimScroll({ scrollTo: '0px' });
	document.getElementById('mediactni').scrollTop = 0;
});

$(document).on('change', 'select', function(event) {
	$(this).find('option').each(function() {
		opttype = $(this).attr('data-type');
		fopstartdate = $('#dpsdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
		fopenddate = $('#dpedate').data('datepicker').getFormattedDate('yyyy-mm-dd');

		if (clientselid == 0) {
			cliid = cid;
		} else {
			cliid = clientselid;
		}

		switch(opttype) {
			case 'keyword':
				keywid = $(this).attr('data-keywordid');
				if($(this).is(':selected')) {
					if(subkeywordsarr.indexOf(keywid) == -1) {
						subkeywordsarr.push(keywid);
						$('.dataTables_processing').show();
						dtworker.postMessage({
							'vfunction':'add_keyword_news_data',
							'method':'GET',
							'url': '/home/keyword_news/'+keywid+'/'+cliid+'/'+fopstartdate+'/'+fopenddate,
							'clientid': cliid,
							'keywordid': keywid,
							'startdate': fopstartdate,
							'enddate': fopenddate,
							'ptype': 'subjectkeyword'
						});
						// add_keyword_news(keywid, cliid, fopstartdate, fopenddate, false, 'subjectkeyword');
					}
				} else {
					subkeywordsarr = jQuery.grep(subkeywordsarr, function(value) {
						remove_keyword_news(keywid);
						return value != keywid;
					});
				}
				break;
			case 'adssubject':
				subjid = $(this).attr('data-subjectid');
				subname = $(this).text();

				if($(this).is(':selected')) {
					if(adssubjectarr.indexOf(subjid) == -1) {
						adssubjectarr.push(subjid);

						subsname = $(this).text();
						$('#adskeyword').selectpicker({title: 'Aguarde...'});
						$('#adskeyword').selectpicker('refresh');
						get_keywordsfromsubject(subjid, function(data) {
							data.map(function(val, index) {
								html =	'<option data-type="adskeyword" data-subjectid="'+val.idAssunto+'" data-keywordid="'+val.Id+'" '+
												'data-subtext="('+subsname+')" val="'+val.Id+'">'+val.Nome+'</option>';
								$('#adskeyword').append(html);
							})

							$('#adskeyword').removeAttr('disabled');
							$('#adskeyword').removeClass('disabled');
							$('#adskeyword').selectpicker({title: 'Nada selecionado'});
							$('#adskeyword').selectpicker('refresh');
						});
					}
				} else {
					adssubjectarr = jQuery.grep(adssubjectarr, function(value) {
						$('#adskeyword').find('[data-subjectid='+subjid+']').remove();

						return value != subjid;
					});
					$('#adskeyword').selectpicker('refresh');
				}
				break;
			case 'adskeyword':
				keywid = $(this).attr('data-subjectid');
				keywname = $(this).text();

				if($(this).is(':selected')) {
					if(adskeywordarr.indexOf(keywid) == -1) {
							adskeywordarr.push(keywid);
						}
				} else {
					adskeywordarr = jQuery.grep(adskeywordarr, function(value) {
						return value != keywid;
					});
				}
				break;
			case 'adstveiculo':
				tveid = $(this).attr('data-tveiculoid');
				tvename = $(this).text();

				if($(this).is(':selected')) {
					if(adstveiculoarr.indexOf(tveid) == -1) {
						adstveiculoarr.push(tveid);
						if (tveid == 4) {
							$('#adstveiculo').selectpicker('toggle');
							$('#adsveiculositesfg').slideDown('fast');
						} else {
							$('#adsveiculositesfg').slideUp('fast');
							tvesname = $(this).text();
							$('#adsveiculo').selectpicker({title: 'Aguarde...'});
							$('#adsveiculo').selectpicker('refresh');
							get_veiculosfromtipoveiculos(tveid, function(data) {
								data.map(function(val, index) {
									html =	'<option data-type="adsveiculo" data-tveiculoid="'+val.idTipoVeiculo+'" data-veiculoid="'+val.Id+'" '+
													'data-subtext="('+tvesname+')" val="'+val.Id+'">'+val.Nome+'</option>';
									$('#adsveiculo').append(html);
								})

								$('#adsveiculo').removeAttr('disabled');
								$('#adsveiculo').removeClass('disabled');
								$('#adsveiculo').selectpicker({title: 'Nada selecionado'});
								$('#adsveiculo').selectpicker('refresh');
							});
						}
					}
				} else {
					adstveiculoarr = jQuery.grep(adstveiculoarr, function(value) {
						if (tveid == 4) {
							$('#adsveiculositesfg').slideUp('fast');
						} else {
							$('#adsveiculo').find('[data-tveiculoid='+tveid+']').remove();
						}

						return value != tveid;
					});
					$('#adsveiculo').selectpicker('refresh');
				}
				break;
			case 'adsveiculo':
				veid = $(this).attr('data-veiculoid');
				vename = $(this).text();

				if($(this).is(':selected')) {
					if(adsveiculoarr.indexOf(tveid) == -1) {
						adsveiculoarr.push(tveid);

						vesname = $(this).text();
						$('#adseditoria').selectpicker({title: 'Aguarde...'});
						$('#adseditoria').selectpicker('refresh');
						get_editoriasfromveiculos(veid, function(data) {
							data.map(function(val, index) {
								html =	'<option data-type="adseditoria" data-veiculoid="'+val.idVeiculo+'" data-editoriaid="'+val.Id+'" '+
												'data-subtext="('+vesname+')" val="'+val.Id+'">'+val.Nome+'</option>';
								$('#adseditoria').append(html);
							})

							$('#adseditoria').removeAttr('disabled');
							$('#adseditoria').removeClass('disabled');
							$('#adseditoria').selectpicker({title: 'Nada selecionado'});
							$('#adseditoria').selectpicker('refresh');
						});
					}
				} else {
					adsveiculoarr = jQuery.grep(adsveiculoarr, function(value) {
						$('#adseditoria').find('[data-veiculoid='+veid+']').remove();

						return value != veid;
					});
					$('#adseditoria').selectpicker('refresh');
				}
				break;
			case 'adseditoria':
				edid = $(this).attr('data-editoriaid');
				edname = $(this).text();

				if($(this).is(':selected')) {
					if(adseditoriaarr.indexOf(edid) == -1) {
						adseditoriaarr.push(edid);
					}
				} else {
					adseditoriaarr = jQuery.grep(adseditoriaarr, function(value) {
						return value != veid;
					});
				}
				break;
			case 'adsstates':
				stateid = $(this).attr('data-stateid');
				statename = $(this).text();

				if($(this).is(':selected')) {
					if(adsstatesarr.indexOf(stateid) == -1) {
						adsstatesarr.push(stateid);
					}
				} else {
					adsstatesarr = jQuery.grep(adsstatesarr, function(value) {
						return value != stateid;
					});
				}
				break;
		}
	});
});

$('#btnasearch').click(function(event) {
	$('#advancedsearch').modal('show');
});

$('.cdrefreshitem').click(function(event) {
	refreshtm = $(this).attr('data-refreshtm');

	clearInterval(rfdata);
	refresh_countdown(refreshtm);
});

$('#btnexpand').click(function(event) {
	$('#mediactni').animate({'height': '100%'}, 'fast');
	$('#showsinglenews > .modal-dialog.modal-lg').animate({'width': '98%'}, 'fast');
	$('#modal-texti').slimScroll({
		height: 'auto',
	});
});

$('#btndown').click(function(event) {
	downtype = $(this).attr('data-downtype');

	$(this).removeClass('disabled');
	$(this).removeAttr('disabled');

	switch (downtype) {
		case 'video':
			// statements_1
			break;
		case 'audio':
			// statements_1
			break;
		case 'image':
			// statements_1
			break;
		case 'noimage':
			$(this).addClass('disabled');
			$(this).attr('disabled', true);
			break;
		case 'facsimile':
			canvas = document.createElement('canvas');
			ctx = canvas.getContext('2d');

			imgw = imgobj.width;
			imgh = imgobj.height;
			ctx.canvas.width = imgw;
			ctx.canvas.height = imgh;

			ctx.drawImage(imgobj, 0, 0);
			ctx.fillStyle = 'rgba(0, 0, 0, 0.5)';
			ctx.fillRect(0, 0, imgw, imgh);
			ctx.drawImage(imgobj, snewsx1, snewsy1, snewsmw, snewsmh, snewsx1, snewsy1, snewsmw, snewsmh);

			document.getElementById('divmediacanvas').innerHTML = '';
			canvas.setAttribute('id', 'mediacanvas');
			document.getElementById('divmediacanvas').appendChild(canvas);

			canvasel = document.getElementById('mediacanvas');
			canvasdataURL = canvasel.toDataURL('image/png');
			cvdowndataURL = canvasel.toDataURL('image/png').replace('image/png', 'image/octet-stream');
			// canvasdataURL = canvasel.toDataURL('image/png').replace('image/png', 'application/stream');

			// imgwred = (imgw * 25) / 100;
			// imghred = (imgh * 25) / 100;

			windowo = window.open();
			windowo.document.write(
				'<img src="'+canvasdataURL+'" style="width: 30%"/>'+
				'<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>'+
				'<script type="text/javascript" charset="utf-8">'+
				'$("img").click(function(event) {'+
						'if ($(this).hasClass("expanded")) {'+
							'$(this).removeClass("expanded");'+
							'$(this).animate({"width": "30%"}, "fast");'+
						'} else {'+
							'$(this).addClass("expanded");'+
							'$(this).animate({"width": "100%"}, "fast");'+
						'}'+
				'	});'+
				'</script>'
				);
			break;
	}
});

dtworker.onmessage = function(event) {
	jresponse = JSON.parse(event.data.response);
	if (typeof event.data.clientid !== 'undefined') {
		wcliendid = event.data.clientid;
	} else {
		wcliendid = 0;
	}
	wstartdate = event.data.startdate;
	wenddate = event.data.enddate;
	wptype = event.data.ptype;
	if (typeof event.data.keywordid !== 'undefined') {
		wkeywordid = event.data.keywordid;
	} else {
		wkeywordid = 0;
	}

	vfunc = event.data.vfunction;
	switch (vfunc) {
		case 'get_client_info':
			set_client_info(wcliendid, jresponse.name, jresponse.banner, true);
			break;
		case 'count_vtype':
			set_count_vtype(jresponse);
			break;
		case 'count_states':
			set_count_states(jresponse);
			break;
		case 'count_rating':
			set_count_rating(jresponse);
			break;
		case 'count_client':
			set_count_client(jresponse);
			break;
		case 'get_subject_keywords':
			$('#dpsdate').datepicker('update', new Date(wstartdate+'T00:00:00'));
			$('#dpedate').datepicker('update', new Date(wenddate+'T00:00:00'));
			add_keyword_news(set_subject_keywords(jresponse, true), wcliendid, wstartdate, wenddate, true, wptype);
			break;
		case 'get_subjects':
			set_subjects(jresponse);
			break;
		case 'add_keyword_news_data':
			add_keyword_news_data(jresponse, wkeywordid, wcliendid, false, wptype);
			$('.dataTables_processing').hide();
			break;
		default:
			console.log('Function not recog!');
			break;
	}
}