<?php
/* Smarty version 3.1.30, created on 2018-03-12 15:39:15
  from "/app/application/views/templates/foot_home_client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa6c9537e14c6_94906991',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35eb8ec61cebe74b32f6b6a35db3fde5f38811b7' => 
    array (
      0 => '/app/application/views/templates/foot_home_client.tpl',
      1 => 1520879953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:body_home_client.tpl' => 1,
  ),
),false)) {
function content_5aa6c9537e14c6_94906991 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_10927709895aa6c9537b1a96_51671460', 'foot');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:body_home_client.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'foot'} */
class Block_10927709895aa6c9537b1a96_51671460 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Footer-->
	<footer class="footer">
		<span class="pull-right">
			Dataclip - Business Inteligence
		</span>
	</footer>
</div><!-- Main Wrapper -->

<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
	var clientsel = '<?php echo $_smarty_tpl->tpl_vars['client_selected']->value;?>
';
	var clientselid = <?php echo $_smarty_tpl->tpl_vars['client_sel_id']->value;?>
;
	var clientselb = (clientsel == 'true');

	
	var tablenews, tablenewsfn, cname, firsttabn, sectabn, subjectid, subjectnm,
	keywordid, keywordnm, keywordtb, keywordgf, subjectskeywords,
	subjecctid, subjectcount, keywordcount, mediatype, idtitle;
	var subkeywordsarr = [], tvarr = [], varr = [], earr = [], pcarr = [];

	var d = new Date();
	var day = d.getDate();
	var day = ('0' + day).slice(-2);
	var month = (d.getMonth() + 1);
	var month = ('0' + month).slice(-2);
	var year = d.getFullYear();
	var todaydate = year+'-'+month+'-'+day;
	var todaydate_br = day+'/'+month+'/'+year;
	var cdatebtn = $('#dpbtn').ladda();

	var tablenews = $('#tablenews').DataTable({
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
		'processing': true,
		'rowId': 'id',
		'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'},
		'initComplete': function(settings) {
			this.api().columns(2).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_2" class="filter selectpicker" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});

			this.api().columns(3).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_3" class="filter selectpicker" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});

			this.api().columns(4).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_4" class="filter selectpicker" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});

			this.api().columns(5).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_5" class="filter selectpicker" data-windowPadding="1" data-size="6" data-width="fit" data-style="btn-default btn-xs" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});
			$('.filter.selectpicker').selectpicker('refresh');
		},
		'drawCallback': function(settings) {
			this.api().column(2).data().each(function(tvcurrent, i) {
				if (tvarr.indexOf(tvcurrent) == -1) {
					tvarr.push(tvcurrent);
					ihtml = '<option val="'+tvcurrent+'">'+tvcurrent+'</option>'
					$(ihtml).appendTo('#selpckr_2');
				}
			})

			this.api().column(3).data().each(function (vcurrent, i) {
				if (varr.indexOf(vcurrent) == -1) {
					varr.push(vcurrent);
					ihtml = '<option val="'+vcurrent+'">'+vcurrent+'</option>'
					$(ihtml).appendTo('#selpckr_3');
				}
			})

			this.api().column(4).data().each(function (ecurrent, i) {
				if (earr.indexOf(ecurrent) == -1) {
					earr.push(ecurrent);
					ihtml = '<option val="'+ecurrent+'">'+ecurrent+'</option>'
					$(ihtml).appendTo('#selpckr_4');
				}
			})

			this.api().column(5).data().each(function (pccurrent, i) {
				if (pcarr.indexOf(pccurrent) == -1) {
					pcarr.push(pccurrent);
					ihtml = '<option val="'+pccurrent+'"">'+pccurrent+'</option>'
					$(ihtml).appendTo('#selpckr_5');
				}
			})
			$('.filter.selectpicker').selectpicker('refresh');
			$('[data-toggle="tooltip"]').tooltip();
		}
	});

	$('body audio').bind('contextmenu', function() { return false; });
	$('body video').bind('contextmenu', function() { return false; });
	$('body img').bind('contextmenu', function() { return false; });

	$('#selclient').change(function(event) {
		subkeywordsarr = [];
		tvarr = [], varr = [], earr = [], pcarr = [];

		swal({
			title: "Carregando...",
			imageUrl: "/assets/imgs/loading.gif",
			showCancelButton: false,
			showConfirmButton: false
		});

		cid = $(this).children(':selected').attr('id');
		cname = event.target.value;
		console.log('Client ID: '+cid);
		console.log('Client Name: '+cname);

		get_client_info(cid, false);
		count_vtype(cid, todaydate, todaydate);
		count_rating(cid, todaydate, todaydate);
		count_states(cid, todaydate, todaydate);
		count_client(cid, todaydate, todaydate);
		$('.actual_range').datepicker('update', new Date(todaydate+'T00:00:00-03:00'));
		get_subject_keywords(cid, todaydate, todaydate, true);
	});

	$('#bannerheader').on('load', function() {
		bannerurl = $(this).attr('src');
		setcolors(bannerurl);
	});

	$('#event_period').datepicker({
		format: "dd/mm/yyyy",
		language: 'pt-BR',
		todayBtn: true,
		todayHighlight: true,
		inputs: $('.actual_range')
	});

	cdatebtn.click(function(event) {
		swal({
			title: "Carregando...",
			imageUrl: "/assets/imgs/loading.gif",
			showCancelButton: false,
			showConfirmButton: false
		});

		cdatebtn.ladda('start');

		fdpstartdate = $('#dpsdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
		fdpenddate = $('#dpedate').data('datepicker').getFormattedDate('yyyy-mm-dd');

		count_vtype(cid, fdpstartdate, fdpenddate);
		count_rating(cid, fdpstartdate, fdpenddate);
		count_states(cid, fdpstartdate, fdpenddate);
		count_client(cid, fdpstartdate, fdpenddate);
		get_subject_keywords(cid, fdpstartdate, fdpenddate, true);
		add_keyword_news(subkeywordsarr[0], clientselid, fdpstartdate, fdpenddate, true);
	});

	$('#showsinglenews').on('show.bs.modal', function(event) {
		$('#wrapper').css('overflow-y', 'hidden');
	});

	$('#showsinglenews').on('hidden.bs.modal', function(event) {
		$('#wrapper').css('overflow-y', 'auto');
		$('#modalcsinglenewsi').css('display', 'none');
		$('#modalcsinglenewsv').css('display', 'none');
		$('#modaltitlerow').css('display', 'none');
		$('#modalwsinglenews').css('display', 'block');

		if (mediatype == 'video' || mediatype == 'audio') {
			var mmediadel = $('#mmediael');
			if (mmediadel[0].paused) {
				// mmediadel[0].play();
			} else {
				mmediadel[0].pause();
			}
		}
	});

	// $('#tablenews').on('click', 'tbody > tr', function (event) {
	$(document).on('click', '.tooltipa', function(event) {
		// var trc = tablenews.row(this).node();
		var trc = $(this);
		var trnid = $(trc).attr('data-newsid');
		var trkid = $(trc).attr('data-keywordid');
		var trcid = $(trc).attr('data-clientid');

		$('#showsinglenews').modal('show');
		get_single_news(trnid, trcid, function(tndata) {
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
			snewsfdatetime = sday+'/'+smonth+'/'+syear+' '+shour+':'+sminutes;

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
			$('#modaltitlevk').html('<strong>Palavra-chave:</strong> '+snewspchave);
			$('#btnurl').attr('href', snewsurl);

			multclipimgurl = 'http://www.multclipp.com.br/arquivos/noticias/'+snewsdate.replace(/-/g,'\/')+'/'+snewsid;
			rgxvideo = new RegExp('(.mp4)', 'ig');
			rgxaudio = new RegExp('(.mp3)', 'ig');
			rgximage = new RegExp('(.jpeg|.jpg|.png|.bmp)', 'ig');
			rgximageaws = new RegExp('s3.amazonaws.com', 'ig');
			if (rgxvideo.test(snewsimg)) {
				mediatype = 'video';
				$('#mediactntv').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
				$('#datemediactnv').text(snewsfdatetime)
				$('#mediactnv').html('<a class="thumbnail"><video id="mmediael" class="img-responsive" src="'+multclipimgurl+'/'+snewsimg+'" autobuffer controls></video></a>');
				$('#modal-textv').html(snewscontent);
			} else if (rgxaudio.test(snewsimg)) {
				mediatype = 'audio';
				$('#mediactntv').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
				$('#datemediactnv').text(snewsfdatetime);
				$('#mediactnv').html('<a class="thumbnail"><audio id="mmediael" class="center-block" style="width: 100%" src="'+multclipimgurl+'/'+snewsimg+'" autobuffer controls></audio></a>');
				$('#modal-textv').html(snewscontent);
			} else if (rgximage.test(snewsimg)) {
				mediatype = 'image';
				$('#mediactnti').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
				$('#datemediactni').text(snewsfdatetime);
				$('#mediactni').html('<a class="thumbnail"><img class="img-responsive" src="'+multclipimgurl+'/'+snewsimg+'"></a>');

				$.each(tndata.PChaves, function(index, val) {
					snewsgrf = val.Grifar.trim();
					snewsgrf = snewsgrf.split(';');
					$.each(snewsgrf, function(index, gval) {
						if (gval.length > 0) {
							console.log('Grifar: '+gval);
							rgxkw = new RegExp('\\b'+gval+'\\b', 'ig');
							snewscontent = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+gval+'</strong>');
						}
					});
				});
				$('#modal-texti').html(snewscontent);
			} else if (rgximageaws.test(snewsurl)) {
				mediatype = 'image';
				$('#mediactnti').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
				$('#datemediactni').text(snewsfdatetime);
				$('#mediactni').html('<a class="thumbnail"><img class="img-responsive" src="'+snewsurl+'"></a>');

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
				$('#mediactnti').html(snewstitle+'<br><small>'+snewssubtitle+'</small>');
				$('#datemediactni').text(snewsfdatetime);
				$('#mediactni').html('<a class="thumbnail"><img class="img-responsive" src="/assets/imgs/noimage.png"></a>');

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

	$(document).on('change', 'select', function(event) {
		$(this).find("option").each(function() {
			opttype = $(this).attr('data-type');
			fopstartdate = $('#dpsdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
			fopenddate = $('#dpedate').data('datepicker').getFormattedDate('yyyy-mm-dd');

			if (opttype == 'keyword') {
				keywid = $(this).attr('id');
				// console.log(this);
				if($(this).is(':selected')) {
					if(subkeywordsarr.indexOf(keywid) == -1) {
						subkeywordsarr.push(keywid);
						add_keyword_news(keywid, clientselid, fopstartdate, fopenddate);
					}
				} else {
					subkeywordsarr = jQuery.grep(subkeywordsarr, function(value) {
						remove_keyword_news(keywid);
						return value != keywid;
					});
				}
			}
		});
	});

	var chartdonut = c3.generate({
		bindto: '#chartdonut',
		data: {
			columns: [['Tipo de Veiculos', 0]],
			type: 'donut'
		}
	});

	$('#brmap').mapael({
		map : {
			name: 'brasil',
			defaultArea: {
				attrs: {
					stroke: "##FFFFFF",
					"stroke-width": 2
				},
					attrsHover: {
					"stroke-width": 2
				}
			}
		}
	});

	var chartstacked = c3.generate({
		bindto: '#chartstacked',
		data: {
			columns: [
				['0', 0]
				['1', 0],
				['2', 0],
				['3', 0]
			],
			type: 'bar',
			names: {
				'0': 'Neutro',
				'1': 'Negativo',
				'2': 'Neutro',
				'3': 'Positivo'
			},
			colors: {
				'0': '#0010C7',
				'1': '#BF0D00',
				'2': '#FF8934',
				'3': '#00CF03'
			}
		},
		grid: {
			y: {
				lines: [{value: 0}]
			}
		}
	});

	var chartlinestacked = c3.generate({
		bindto: '#chartlinestacked',
		size: {
			height: 300
		},
		data: {
				x: 'Data',
				columns: [
						['Data', todaydate],
						['QNoticias', 0],
						['EdValor', 0],
						['EdAudiencia', 0]
				],
				axes: {
					'QNoticias': 'y2',
				},
				types: {
					'QNoticias': 'bar',
					'EdValor': 'spline',
					'EdAudiencia': 'spline'
				},
				names: {
					'QNoticias': 'Notícias',
					'EdValor': 'Valor',
					'EdAudiencia': 'Audiência'
				}
		},
		axis: {
				x: {
						type: 'timeseries',
						tick: {
								format: '%Y-%m-%d'
						}
				},
				y2: {
					show: true,
				}
		}
	});

	if (clientselb) {
		subkeywordsarr = [];
		tvarr = [], varr = [], earr = [], pcarr = [];
		$('#changeclient').css('display', 'none');
		$('#selclient').attr('disabled', true);
		$('#selclient').addClass('disabled');

		swal({
			title: "Carregando...",
			imageUrl: "/assets/imgs/loading.gif",
			showCancelButton: false,
			showConfirmButton: false
		});

		get_client_info(clientselid, true);
		count_vtype(clientselid, todaydate, todaydate);
		count_rating(clientselid, todaydate, todaydate);
		count_states(clientselid, todaydate, todaydate);
		count_client(clientselid, todaydate, todaydate);
		$('.actual_range').datepicker('update', new Date(todaydate+'T00:00:00-03:00'));
		get_subject_keywords(clientselid, todaydate, todaydate, true);
	}

	function get_client_info(clientid, setselpicker) {
		$.get('/home_client/client_info/'+clientid,
		function(data, textStatus, xhr) {
			cid = data.id;
			cname = data.name;
			cbanner = data.banner;

			if (setselpicker) {
				$('#selclient').selectpicker('val', cname);
			}

			$('#bannerheader').attr('src', cbanner);
			// $('#header').css({
				// 'background-image': 'url("'+cbanner+'"")',
				// 'background-repeat': 'no-repeat'
			// });
		});
	}

	function setcolors(imgurl) {
		sourceImage = $('#bannerheader');
		var colorThief = new ColorThief();
		dominantcolor = colorThief.getColor(sourceImage[0]);
		palettcolor = colorThief.getPalette(sourceImage[0], 10);
		$('#header').css({
			'background': 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+')'
		});
		// $('.panel-body').css('background', 'rgba('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.08)');
		$('.btn-primary').css({
			'background-color': 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.7)',
			'border-color': 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.7)'
		});
		$(".btn-primary").hover(function(e) {
			var bghover = 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.6)';
			var nbghover = 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.7)';
			$(this).css({
				'background-color': e.type === 'mouseenter' ? bghover : nbghover,
				'border-color': e.type === 'mouseenter' ? bghover : nbghover
			});
		});
	};

	function count_vtype(clientid, startdate, enddate) {
		var chartdonutdata = [];
		$.get('/home_client/count_vtype_news/'+clientid+'/'+startdate+'/'+enddate,
			function(resdata) {
				resdata.map(function(obj, index){
					var arrtmp = [obj.Nome, obj.QNoticias];
					chartdonutdata.push(arrtmp);
				});

				chartdonut.load({
					unload: true,
					columns: chartdonutdata,
				});
			}
		);
	};

	function count_rating(clientid, startdate, enddate) {
		var chartstackeddata = [];
		$.get('/home_client/count_rating_news/'+clientid+'/'+startdate+'/'+enddate,
			function(resdata) {
				resdata.map(function(obj, index){
					var arrtmp = [obj.Avaliacao, obj.QNoticias];
					chartstackeddata.push(arrtmp);
				});

				chartstacked.load({
					unload: true,
					columns: chartstackeddata,
				});
			}
		);
	};

	function count_states(clientid, startdate, enddate) {
		mapareas = {};
		$.get('/home_client/count_states_news/'+clientid+'/'+startdate+'/'+enddate,
			function(esdata) {
				esdata.map(function(obj, index){
					mapareas[obj.Id] = {
						value: obj.QNoticias,
						tooltip: {content: '<span style="font-weight:bold;">'+obj.Estado+'</span><br />Matérias: '+obj.QNoticias}
					}
				});

				$('#brmap').mapael({
					map : {
						name: 'brasil',
						defaultArea: {
							attrs: {
								stroke: "#FFFFFF",
								"stroke-width": 2
							},
								attrsHover: {
								fill: "#CA2A00",
								animDuration: 100,
								"stroke-width": 2
							}
						}
					},
					legend: {
						area: {
							slices: [
								{
									max: 0,
									attrs: {
										fill: "#004351"
									},
									label: "Nenhum"
								},
								{
									min: 1,
									max: 10,
									attrs: {
										fill: "#66D1E7"
									},
									label: "Menos que 10"
								},
								{
									min: 11,
									max: 20,
									attrs: {
										fill: "#4DBCD3"
									},
									label: "Entre 11 e 20"
								},
								{
									min: 21,
									max: 30,
									attrs: {
										fill: "#3291AA"
									},
									label: "Entre 21 e 30"
								},
								{
									min: 31,
									attrs: {
										fill: "#1A727D"
									},
									label: "Acima de 31"
								}
							]
						}
					},
					areas: mapareas
				});
			}
		);
	};

	function count_client(clientid, startdate, enddate) {
		var chartbarlinedata = [];
		var arrdatf = ['Data'];
		var arrnotf = ['QNoticias'];
		var arrvalf = ['EdValor'];
		var arraudf = ['EdAudiencia'];

		if (startdate == enddate) {
			var ed = new Date(startdate+'T00:00:00-03:00');
			ed.setDate(ed.getDate()-6);
			var edday = ed.getDate();
			var edday = ('0' + edday).slice(-2);
			var edmonth = (ed.getMonth() + 1);
			var edmonth = ('0' + edmonth).slice(-2);
			var edyear = ed.getFullYear();
			var fstartdate = edyear+'-'+edmonth+'-'+edday;
			var fenddate = enddate;
		} else {
			var fstartdate = startdate;
			var fenddate = enddate;
		}

		$.get('/home_client/count_client_news/'+clientid+'/'+fstartdate+'/'+fenddate,
			function(cldata) {
				cldata.map(function(obj, index){
					arrdatf.push(obj.Data);
					arrnotf.push(obj.QNoticias);
					arrvalf.push(obj.EdValor);
					arraudf.push(obj.EdAudiencia);
				});
				chartbarlinedata.push(arrdatf);
				chartbarlinedata.push(arrnotf);
				chartbarlinedata.push(arrvalf);
				chartbarlinedata.push(arraudf);

				chartlinestacked.load({
					unload: true,
					columns: chartbarlinedata,
				});
			}
		);
	};

	function get_subject_keywords(clientid, startdate, enddate, updatesubjects = false) {
		$.get('/home_client/client_subjects_keywords/'+clientid+'/'+startdate+'/'+enddate,
			function(cdata, textStatus, xhr) {
				subjectskeywords = cdata;

				if (updatesubjects) {
					$('#sublist .selectpicker').selectpicker('destroy');
					$('#sublist').html('');
				}

				$.each(subjectskeywords, function(index, sval) {
					subjectid = sval.IdAssunto;
					subjectnm = sval.Assunto;
					subjectcount = sval.QNoticias;
					skeywords = sval.PChaves;

					if (subjectnm == cname) {
						subjecchosen = subjectnm;
						subjecctid = subjectid;
					} else {
						subjecchosen = subjectskeywords[0].Assunto;
						subjecctid = subjectskeywords[0].IdAssunto;
					}

					html = '<select id="'+subjectid+'" class="selectpicker" data-type="subject" data-style="btn-default btn-sm" data-size="10" data-width="150px" data-live-search="true" data-selected-text-format="count > 3" title="'+subjectnm+' ('+subjectcount+')'+'" multiple>';

					$.each(skeywords, function(index, kval) {
						keywordid = kval.IdPChave;
						keywordnm = kval.PChave;
						keywordtb = kval.TermoBusca;
						keywordgf = kval.Grifar;
						keywordcount = kval.QNoticias;

						html += '<option id="'+keywordid+'" data-type="keyword" data-subtext="('+keywordcount+')">'+keywordnm+'</option>';
					});

					html += '</select>';
					$('#sublist').append(html);
					$('#sublist .selectpicker').selectpicker('render');
					// $('#sublist .selectpicker').selectpicker('refresh');
				});

				var result = $.grep(subjectskeywords, function(e){ return e.IdAssunto == subjecctid; });
				$.each(result[0].PChaves, function(index, kval) {
					keywordid = kval.IdPChave;
					keywordnm = kval.PChave;
					keywordtb = kval.TermoBusca;
					keywordgf = kval.Grifar;

					if (keywordnm == cname) {
						keywordidchosen = keywordid;
						keywordnmchosen = keywordnm;
					} else {
						keywordidchosen = result[0].PChaves[0].IdPChave;
						keywordnmchosen = result[0].PChaves[0].PChave;
					}
				});

				subkeywordsarr.push(keywordidchosen);
				$('#sublist .selectpicker').selectpicker('val', keywordnmchosen);
				add_keyword_news(keywordidchosen, clientid, startdate, enddate, true);
			}
		);
	};

	function get_keyword_news(keywordid, startdate, enddate) {
		$('#tablenews').dataTable().fnClearTable();
		$('#tablenews').dataTable().fnDestroy();
		$('#tablenews').DataTable({
			'ajax': '/home_client/keyword_news/'+keywordid+'/'+startdate+'/'+enddate,
			'columns': [
				{ 'data': 'Data' },
				{ 'data': 'Hora' },
				{ 'data': 'TipoVeiculo' },
				{ 'data': 'Veiculo' },
				{ 'data': 'Editoria' },
				{ 'data': 'Titulo' },
				{ 'data': 'EdValor' },
				{ 'data': 'EdAudiencia' }
			],
			'order': [
				[0, 'desc'],
				[1, 'desc']
			],
			'processing': true,
			'rowId': 'Id'
		});
	};

	function add_keyword_news(keywordid, clientid, startdate, enddate, cleartable = false) {
		$.get('/home_client/keyword_news/'+keywordid+'/'+clientid+'/'+startdate+'/'+enddate,
		function(redata, textStatus, xhr) {
			if (cleartable) {
				tablenews.clear().draw();
			}

			$.each(redata.data, function(index, val) {
				vid = val.Id;
				vdata = val.Data.trim();
				vhora = val.Hora.trim();
				if (vhora == '' || vhora == ' ' || vhora == '0:0') {
					vhora = '00:00';
				}
				valdataf = vdata+'T'+vhora;
				vdatetime = new Date(valdataf);
				vday = vdatetime.getDate();
				vday = ('0'+vday).slice(-2);
				vmonth = (vdatetime.getMonth() + 1);
				vmonth = ('0'+vmonth).slice(-2);
				vnmonharr = vdatetime.toString().split(' ');
				vnmonth = vnmonharr[1];
				vyear = vdatetime.getFullYear();
				vhour = vdatetime.getHours();
				vhour = ('0'+vhour).slice(-2);
				vminutes = vdatetime.getMinutes();
				vminutes = ('0'+vminutes).slice(-2)

				vtitle = val.Titulo;
				if (vtitle.length > 50) {
					vtitle = vtitle.slice(0, 47) + '...';
					vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'" data-toggle="tooltip" data-placement="top" title="" data-original-title="'+val.Titulo+'">'+vtitle+'</a>'
				} else if (vtitle.length <= 1) {
					vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'">Sem Título</a>';
				}


				vedvalor = Number(val.EdValor).toLocaleString("pt-BR", {minimumFractionDigits: 2});
				vedvalor = 'R$ '+vedvalor;

				vaudiencia = Number(val.EdAudiencia).toLocaleString("pt-BR", {minimumFractionDigits: 0});

				var rowNode = tablenews.row.add(
					[
						vday+'/'+vnmonth,
						vhour+':'+vminutes,
						val.TipoVeiculo,
						val.Veiculo,
						val.Editoria,
						val.PalavraChave,
						vftitle,
						vedvalor,
						vaudiencia
					]
				).draw(false).node();
				// $(rowNode).attr('id', 'tr-'+val.Id);
				// $(rowNode).attr('data-clientid', clientid);
				$(rowNode).attr('data-keywordid', keywordid);
			});

			cdatebtn.ladda('stop');
			swal.close();
		});
	};

	function remove_keyword_news(keywordid) {
		drows = tablenews.rows('tr[data-keywordid='+keywordid+']');
		$('#selpckr_2').html('<option val=""></option>');
		tvarr = [];
		$('#selpckr_3').html('<option val=""></option>');
		varr = [];
		$('#selpckr_4').html('<option val=""></option>');
		earr = [];
		$('#selpckr_5').html('<option val=""></option>');
		pcarr = [];
		drows.remove().draw();
	};

	function get_single_news_keyword(newsid, newskwid, kcallback) {
		$.get('/home_client/single_news_keyword/'+newsid+'/'+newskwid, function(data) {
			kcallback(data);
		});
	};

	function get_single_news(newsid, clientid, callback) {
		$.get('/home_client/single_news/'+newsid+'/'+clientid, function(data) {
			callback(data);
		});
	};
<?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'foot'} */
}
