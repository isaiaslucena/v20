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

	count_vtype(cid, fdpstartdate, fdpenddate);
	count_rating(cid, fdpstartdate, fdpenddate);
	count_states(cid, fdpstartdate, fdpenddate);
	count_client(cid, fdpstartdate, fdpenddate);
	get_subject_keywords(cid, fdpstartdate, fdpenddate, true, function(keywid){
		add_keyword_news(keywid, cliid, fdpstartdate, fdpenddate, true, 'selecteddate');
	});
});

cadsbtn.click(function(event) {
	// cadsbtn.ladda('start');

	if (clientselid == 0) {
		cliid = cid;
	} else {
		cliid = clientselid;
	}

	adsstartdate = $('#adsstartdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
	adsenddate = $('#adsenddate').data('datepicker').getFormattedDate('yyyy-mm-dd');

	$('#dpsdate').datepicker('update', new Date(adsstartdate+'T00:00:00'));
	$('#dpedate').datepicker('update', new Date(adsenddate+'T00:00:00'));

	idassutos = $('#adssubject').selectpicker('val');
	idpchaves = $('#adskeyword').selectpicker('val');
	idtveiculos = $('#adstveiculo').selectpicker('val');
	idveiculossites = $('#adsveiculosites').val();
	idveiculos = $('#adsveiculo').selectpicker('val');
	ideditorias = $('#adseditoria').selectpicker('val');

	console.log(idassutos);
	console.log(idpchaves);
	console.log(idtveiculos);
	console.log(idveiculossites);
	console.log(idveiculos);
	console.log(ideditorias);

	// count_vtype(cid, adsstartdate, adsenddate);
	// count_rating(cid, adsstartdate, adsenddate);
	// count_states(cid, adsstartdate, adsenddate);
	// count_client(cid, adsstartdate, adsenddate);
	// get_subject_keywords(cid, adsstartdate, adsenddate, true, function(keywid){
	// 	add_keyword_news(keywid, cliid, adsstartdate, adsenddate, true, 'advancedsearch');
	// });
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
		snewsvid = tndata.idVeiculo;
		snewsve = tndata.Veiculo;
		snewseid = tndata.idEditoria;
		snewsed = tndata.Editoria;
		snewsimg = tndata.Imagem;

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

		multclipimgurl = 'http://www.multclipp.com.br/arquivos/noticias/'+snewsdate.replace(/-/g,'\/')+'/'+snewsid;
		rgxvideo = new RegExp('(.mp4)', 'ig');
		rgxaudio = new RegExp('(.mp3)', 'ig');
		rgximage = new RegExp('(.jpeg|.jpg|.png|.bmp)', 'ig');
		rgximageaws = new RegExp('s3.amazonaws.com', 'ig');
		if (rgxvideo.test(snewsimg)) {
			mediatype = 'video';
			$('#modaltitlevkv').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#mediactntv').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
			$('#datemediactnv').text(snewsfdatetime)
			$('#mediactnv').html('<video id="mediaelvideo" class="img-responsive center-block" src="'+multclipimgurl+'/'+snewsimg+'" autobuffer controls style="width: 65%"></video>');
			$('#modal-textv').html(snewscontent);
		} else if (rgxaudio.test(snewsimg)) {
			mediatype = 'audio';
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
			$('#mediactni').html(
				'<div class="imggrad"><span>Exibir tudo</span></div>'+
				'<img id="mediaelimg" class="img-responsive" src="'+multclipimgurl+'/'+snewsimg+'">'
			);
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
			$('#mediaelimg').on('load', function() {
				$('#mediaimgload').fadeOut('fast', function() {
					$('#mediactni').fadeIn('fast');
					$('#mediactni').click(function(event) {
						$('.imggrad').css('display', 'none');
						$(this).css('overflow-y', 'auto');
					});
				});
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
						add_keyword_news(keywid, cliid, fopstartdate, fopenddate, false, 'subjectkeyword');
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
				subname = $(this).val();

				if($(this).is(':selected')) {
					if(adssubjectarr.indexOf(subjid) == -1) {
						adssubjectarr.push(subjid);

						subsname = $(this).val();
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
				keywname = $(this).val();

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
				tvename = $(this).val();

				if($(this).is(':selected')) {
					if(adstveiculoarr.indexOf(tveid) == -1) {
						adstveiculoarr.push(tveid);
						if (tveid == 4) {
							$('#adsveiculositesfg').slideDown('fast');
						} else {
							tvesname = $(this).val();
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
				vename = $(this).val();

				if($(this).is(':selected')) {
					if(adsveiculoarr.indexOf(tveid) == -1) {
						adsveiculoarr.push(tveid);

						vesname = $(this).val();
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
			default:
				console.log('Option not recognized!');
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
	$('#showsinglenews > .modal-dialog.modal-lg').animate({'width': '98%'}, 'fast');
	$('#modal-texti').slimScroll({
		height: 'auto',
	});
});