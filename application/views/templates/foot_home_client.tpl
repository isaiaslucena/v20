{extends file='body_home_client.tpl'}
{block name=foot}
	<!-- Footer-->
	<footer class="footer">
		<span class="pull-right">
			Dataclip - Business Inteligence
		</span>
	</footer>
</div><!-- Main Wrapper -->

<script type="text/javascript" charset="utf-8">
	var clientsel = '{$client_selected}';
	var clientselid = {$client_sel_id};
	var clientselb = (clientsel == 'true');

	{literal}
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
		"autoWidth": false,
		"order": [
			[0, "desc"],
			[1, "desc"]
		],
		"columnDefs": [
			{"searchable": false, "width": "5%", "targets": 0},
			{"searchable": false, "width": "5%", "targets": 1},
			{"searchable": false, "width": "15%", "targets": 2},
			{"searchable": true, "width": "5%", "targets": 3},
			{"searchable": false, "width": "5%", "targets": 4},
			{"searchable": true, "width": "15%", "targets": 5},
			{"searchable": true, "width": "40%", "targets": 6},
			{"searchable": false, "width": "10%", "targets": 7},
			{"searchable": false, "width": "10%", "targets": 8}
		],
		"processing": true,
		"rowId": "id",
		"language": {"url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json"},
		"initComplete": function(settings) {
			this.api().columns([2,3,4,5]).every(function(coln) {
				var column = this;
				var seltitle = $(column.header()).text();
				var select = $('<select id="selpckr_'+coln+'" class="filter selectpicker" data-windowPadding="1" data-size="4" data-width="fit" data-style="btn-default btn-xs" title="'+seltitle+'"><option val=""></option></select>')
				.appendTo($(column.footer()))
				.on('change', function() {
					var val = $.fn.dataTable.util.escapeRegex($(this).val());
					column.search( val ? '^'+val+'$' : '', true, false).draw();
				});
			});
			$('.filter.selectpicker').selectpicker('render');
		},
		"drawCallback": function(settings) {
			this.api().column(2, {page:'current'}).data().each(function(tvcurrent, i) {
				if (tvarr.indexOf(tvcurrent) == -1) {
					tvarr.push(tvcurrent);
					ihtml = '<option val="'+tvcurrent+'">'+tvcurrent+'</option>'
					$(ihtml).appendTo('#selpckr_2');
				}
			})

			this.api().column(3, {page:'current'}).data().each(function (vcurrent, i) {
				if (varr.indexOf(vcurrent) == -1) {
					varr.push(vcurrent);
					ihtml = '<option val="'+vcurrent+'">'+vcurrent+'</option>'
					$(ihtml).appendTo('#selpckr_3');
				}
			})

			this.api().column(4, {page:'current'}).data().each(function (ecurrent, i) {
				if (earr.indexOf(ecurrent) == -1) {
					earr.push(ecurrent);
					ihtml = '<option val="'+ecurrent+'">'+ecurrent+'</option>'
					$(ihtml).appendTo('#selpckr_4');
				}
			})

			this.api().column(5, {page:'current'}).data().each(function (pccurrent, i) {
				if (pcarr.indexOf(pccurrent) == -1) {
					pcarr.push(pccurrent);
					ihtml = '<option val="'+pccurrent+'">'+pccurrent+'</option>'
					$(ihtml).appendTo('#selpckr_5');
				}
			})
			$('.filter.selectpicker').selectpicker('refresh');
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

		cid = $(this).children(":selected").attr("id");
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
		setcolors();
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
		add_keyword_news(subkeywordsarr[0], fdpstartdate, fdpenddate, true);
	});

	$('#showsinglenews').on('show.bs.modal', function(event) {
		$('#wrapper').css('overflow-y', 'hidden');
	});

	$('#showsinglenews').on('hidden.bs.modal', function(event) {
		$('#wrapper').css('overflow-y', 'auto');
		$('#modalcsinglenewsi').css('display', 'none');
		$('#modalcsinglenewsv').css('display', 'none');
		$('#modalwsinglenews').css('display', 'block');

		$('#modaltsinglenews').text(null);
		if (mediatype == 'video' || mediatype == 'audio') {
			var mmediadel = $('#mmediael');
			if (mmediadel[0].paused) {
				// mmediadel[0].play();
			} else {
				mmediadel[0].pause();
			}
		}
	});

	$('#tablenews').on('click', 'tbody > tr', function (event) {
		var trc = tablenews.row(this).node();
		var trcid = $(trc).attr('id');
		var trkid = $(trc).attr('data-keywordid');

		$('#showsinglenews').modal('show');
		get_single_news(trcid, trkid, function(tndata) {
			snewsid = tndata[0].Id;
			snewsdate = tndata[0].Data;
			snewstime = tndata[0].Hora;

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

			snewstitle = tndata[0].Titulo;
			snewssubtitle = tndata[0].Subtitulo;
			snewscontent = tndata[0].Noticia;
			snewsauthor = tndata[0].Autor;
			snewsurl = tndata[0].URL;
			snewsvid = tndata[0].idVeiculo;
			snewsve = tndata[0].Veiculo;
			snewseid = tndata[0].idEditoria;
			snewsed = tndata[0].Editoria;
			snewsgrf = tndata[0].Grifar.trim();
			snewsimg = tndata[0].Imagem;
			console.log('Grifar');
			console.log(snewsgrf.length);
			console.log(snewsgrf);

			$('#modaltsinglenews').html(snewsve+' - <small>'+snewsed+'</small>');

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
				$('#mediactnti').html('<a href="'+snewsurl+'" target="_blank">'+snewstitle+'</a><br><small>'+snewssubtitle+'</small>');
				$('#datemediactni').text(snewsfdatetime);
				$('#mediactni').html('<a class="thumbnail"><img class="img-responsive" src="'+multclipimgurl+'/'+snewsimg+'"></a>');

				if (snewsgrf.length > 0) {
					rgxkw = new RegExp('\\b'+snewsgrf+'\\b', 'ig');
					snewscontent = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+snewsgrf+'</strong>');
				}
				$('#modal-texti').html(snewscontent);
			} else if (rgximageaws.test(snewsurl)) {
				mediatype = 'image';
				$('#mediactnti').html('<a href="'+snewsurl+'" target="_blank">'+snewstitle+'</a><br><small>'+snewssubtitle+'</small>');
				$('#datemediactni').text(snewsfdatetime);
				$('#mediactni').html('<a class="thumbnail"><img class="img-responsive" src="'+snewsurl+'"></a>');

				rgxkw = new RegExp('\\b'+snewsgrf+'\\b', 'ig');
				fullnewtext = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+snewsgrf+'</strong>');
				$('#modal-texti').html(fullnewtext);
			} else {
				mediatype = 'image';
				$('#mediactnti').html('<a href="'+snewsurl+'" target="_blank">'+snewstitle+'</a><br><small>'+snewssubtitle+'</small>');
				$('#datemediactni').text(snewsfdatetime);
				$('#mediactni').html('<a class="thumbnail"><img class="img-responsive" src="/assets/imgs/noimage.png"></a>');

				rgxkw = new RegExp('\\b'+snewsgrf+'\\b', 'ig');
				fullnewtext = snewscontent.replace(rgxkw, '<strong class="kwgrifar">'+snewsgrf+'</strong>');
				$('#modal-texti').html(fullnewtext);
			}

			$('#modalwsinglenews').fadeOut('fast', function() {
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
				if($(this).is(':selected')) {
					if(subkeywordsarr.indexOf(keywid) == -1) {
						subkeywordsarr.push(keywid);
						add_keyword_news(keywid, fopstartdate, fopenddate);
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
					stroke: "#fff",
					"stroke-width": 1
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
				'0': 'Não definido',
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


		});
	}

	function setcolors() {
		sourceImage = $('#bannerheader');
		var colorThief = new ColorThief();
		dominantcolor = colorThief.getColor(sourceImage[0]);
		palettcolor = colorThief.getPalette(sourceImage[0], 10);
		$('#header').css('background', 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+')');
		$('.panel-body').css('background', 'rgba('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.08)');
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
									max: 100,
									attrs: {
										fill: "#66D1E7"
									},
									label: "Menos que 100"
								},
								{
									min: 100,
									max: 300,
									attrs: {
										fill: "#4DBCD3"
									},
									label: "Entre 100 e 200"
								},
								{
									min: 300,
									max: 500,
									attrs: {
										fill: "#3291AA"
									},
									label: "Entre 300 e 400"
								},
								{
									min: 500,
									attrs: {
										fill: "#1A727D"
									},
									label: "Mais de 500"
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
				add_keyword_news(keywordidchosen, startdate, enddate, true);
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

	function add_keyword_news(keywordid, startdate, enddate, cleartable = false) {
		$.get('/home_client/keyword_news/'+keywordid+'/'+startdate+'/'+enddate,
		function(redata, textStatus, xhr) {
			if (cleartable) {
				tablenews.clear().draw();
			}

			$.each(redata.data, function(index, val) {
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
				}

				var rowNode = tablenews.row.add(
					[
						vday+'/'+vnmonth,
						vhour+':'+vminutes,
						val.TipoVeiculo,
						val.Veiculo,
						val.Editoria,
						val.PalavraChave,
						vtitle,
						val.EdValor,
						val.EdAudiencia
					]
				).draw(false).node();
				$(rowNode).attr('id', val.Id);
				$(rowNode).attr('data-keywordid', keywordid);
			});

			cdatebtn.ladda('stop');
			swal.close();
		});
	};

	function remove_keyword_news(keywordid) {
		drows = tablenews.rows('tr[data-keywordid='+keywordid+']');
		drows.remove().draw();
	};

	function get_single_news(newsid, newskwid, callback) {
		$.get('/home_client/single_news/'+newsid+'/'+newskwid, function(data) {
			callback(data);
		});
	};
</script>
{/literal}
{/block}