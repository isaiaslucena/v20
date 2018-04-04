//App Functions

function salertloading(mobile) {
	if (mobile) {
		swalwidth = '16em';
	} else {
		swalwidth = '32em';
	}

	swal({
		onOpen: () => {
			swal.showLoading()
		},
		title: "Carregando...",
		// width: swalwidth,
		showCancelButton: false,
		showConfirmButton: false,
	});
};

function salertloadingdone(mobile) {
	if (mobile) {
		$('.selectpicker').selectpicker('mobile');
		$('#btnsgroupnews').removeClass('btn-group-justified');
		$('#btnsgroupnews').addClass('btn-group-vertical');
		swalwidth = '16em';
	} else {
		swalwidth = '32em';
	}

	swal({
		title: "Pronto!",
		type: "success",
		// width: swalwidth,
		showCancelButton: false,
		showConfirmButton: false,
		timer: 1500
	});
};

function isTouchDevice() {
	return true == ("ontouchstart" in window || window.DocumentTouch && document instanceof DocumentTouch);
};

function get_client_info(clientid, setselpicker) {
	$.get('/home/client_info/'+clientid,
	function(data, textStatus, xhr) {
		cid = data.id;
		cname = data.name;
		cbanner = data.banner;

		if (setselpicker) {
			$('#selclient').selectpicker('val', cname);
		}

		headerlogo = new Image();
		headerlogo.src = cbanner;
		headerlogo.setAttribute('crossOrigin', 'anonymous');
		// headerlogo.setAttribute('id', 'bannerheader');
		// imgsrcb64 = '';

		headerlogo.onload = function(event) {
			// document.getElementById('bannerheader').setAttribute('src', 'data:image/png;base64,'+)
			// document.getElementById('logo').innerHTML = '<img id="bannerheader" src="'+cbanner+'" crossOrigin="anonymous" style="display: none">';
			setcolors();
		};

		$('#bannerheader').attr('src', cbanner);
		$('#logo, #logomobile').css({
			'background-image': 'url("'+cbanner+'")',
			'background-repeat': 'no-repeat',
			'background-size': 'auto 100%',
			'background-position': 'center'
		});
	});
};

function set_client_info(cid, cname, cbanner, setselpicker) {
	if (setselpicker) {
		$('#selclient').selectpicker('val', cname);
	}

	cbanner = '/home/proxy/'+btoa(cbanner);
	$('#bannerheader').attr('src', cbanner);
	$('#bannerheaders').attr('src', cbanner);

	// headerlogo = new Image();
	// headerlogo.setAttribute('crossOrigin', 'anonymous');
	// headerlogo.src = cbanner;

	// headerlogo.onload = function() {
		// console.log('Image loaded!');
	// };
};

function setcolors() {
	// sourceImage = $('#bannerheader');
	sourceImage = document.getElementById('bannerheader');

	var colorThief = new ColorThief();
	dominantcolor = colorThief.getColor(sourceImage);
	palettcolor = colorThief.getPalette(sourceImage, 10);

	$('meta[name=theme-color]').attr('content', 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+')');
	$('#logo, #logomobile').css('background', 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+')');
	// $('.navbar.navbar-static-top a i, .nav.navbar-nav li a i').css('color', 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.01)');
	// $('.navbar.navbar-static-top a, .nav.navbar-nav li a').hover(function(e) {
	// 	var bghover = 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.5)';
	// 	var nbghover = 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+')';
	// 	$(this).css({
	// 		'background-color': e.type === 'mouseenter' ? bghover : nbghover
	// 	});
	// });
	$('body').css({
		'background': 'rgb('+dominantcolor[0]+','+dominantcolor[1]+','+dominantcolor[2]+',0.03)'
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
	$.get('/home/count_vtype_news/'+clientid+'/'+startdate+'/'+enddate,
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

function set_count_vtype(cvtypedata) {
	var chartdonutdata = [];
	cvtypedata.map(function(obj, index){
		var arrtmp = [obj.Nome, obj.QNoticias];
		chartdonutdata.push(arrtmp);
	});

	chartdonut.load({
		unload: true,
		columns: chartdonutdata,
	});
};

function count_rating(clientid, startdate, enddate) {
	var chartstackeddata = [];
	$.get('/home/count_rating_news/'+clientid+'/'+startdate+'/'+enddate,
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

function set_count_rating(cratdata) {
	// console.log(cratdata);
	var chartstackeddata = [];
	// console.log(chartstackeddata);
	// cratdata.each(function(index, obj) {
	// 	var arrtmp = [obj.Avaliacao, obj.QNoticias];
	// 	chartstackeddata.push(arrtmp);
	// });

	cratdata.map(function(obj, index){
		var arrtmp = [obj.Avaliacao, obj.QNoticias];
		chartstackeddata.push(arrtmp);
	});

	chartstacked.load({
		unload: true,
		columns: chartstackeddata,
	});
};

function count_states(clientid, startdate, enddate) {
	mapareas = {};
	$.get('/home/count_states_news/'+clientid+'/'+startdate+'/'+enddate,
		function(esdata) {
			// console.log(esdata);
			esdata.map(function(obj, index){
				mapareas[obj.Id] = {
					text: {
						content: obj.uf,
						attrs: {
							'font-size': 20,
							'fill': '#202020'
						}
					},
					value: obj.QNoticias,
					tooltip: {content: '<span style="font-weight:bold;">'+obj.Estado+'</span><br />Matérias: '+obj.QNoticias}
				}
			});

			$('#brmap').mapael({
				map : {
					name: 'brasil',
					defaultArea: {
						attrs: {
							fill: '#CFCFCF',
							stroke: '#FFFFFF',
							'stroke-width': 2
						},
							attrsHover: {
							fill: '#DA7910',
							animDuration: 50,
							'stroke-width': 2
						}
					}
				},
				legend: {
					area: {
						slices: [
							{
								max: 0,
								attrs: {
									fill: "#CFCFCF"
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

function set_count_states(esdata) {
	mapareas = {};
	// console.log(esdata);
	esdata.map(function(obj, index){
		mapareas[obj.Id] = {
			text: {
				content: obj.uf,
				attrs: {
					'font-size': 20,
					'fill': '#202020'
				}
			},
			value: obj.QNoticias,
			tooltip: {content: '<span style="font-weight:bold;">'+obj.Estado+'</span><br />Matérias: '+obj.QNoticias}
		}
	});

	$('#brmap').mapael({
		map : {
			name: 'brasil',
			defaultArea: {
				attrs: {
					fill: '#CFCFCF',
					stroke: '#FFFFFF',
					'stroke-width': 2
				},
					attrsHover: {
					fill: '#DA7910',
					animDuration: 50,
					'stroke-width': 2
				}
			}
		},
		legend: {
			area: {
				slices: [
					{
						max: 0,
						attrs: {
							fill: "#CFCFCF"
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

	$.get('/home/count_client_news/'+clientid+'/'+fstartdate+'/'+fenddate,
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

function set_count_client(cldata) {
	var chartbarlinedata = [];
	var arrdatf = ['Data'];
	var arrnotf = ['QNoticias'];
	var arrvalf = ['EdValor'];
	var arraudf = ['EdAudiencia'];

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
};

function get_subject_keywords(clientid, startdate, enddate, updatesubjects = false, callback) {
	$.get('/home/client_subjects_keywords/'+clientid+'/'+startdate+'/'+enddate,
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

				if (subjectcount != null) {
					html = '<select class="selectpicker" data-subjectid="'+subjectid+'" '+
									'data-style="btn btn-sm btn-default" data-size="10" data-width="200px" '+
									'data-actions-box="true" data-live-search="true" '+
									'data-selected-text-format="count > 3" '+
									'title="'+subjectnm+' ('+subjectcount+')'+'" multiple>';
				}

				$.each(skeywords, function(index, kval) {
					keywordid = kval.IdPChave;
					keywordnm = kval.PChave;
					keywordtb = kval.TermoBusca;
					keywordgf = kval.Grifar;
					keywordcount = kval.QNoticias;
					if (keywordcount != null) {
						html += '<option data-type="keyword" data-keywordid="'+keywordid+'" data-subtext="('+keywordcount+')">'+keywordnm+'</option>';
						// keywordcount = 0;
					}
				});

				html += '</select>';
				$('#sublist').append(html);
				$('#sublist .selectpicker').selectpicker('refresh');

				$('#sublist .bs-deselect-all').css('float', 'none');
				$('#sublist .actions-btn').css('font-size', '70%');
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
			// add_keyword_news(keywordidchosen, clientid, startdate, enddate, true, 'startpage');
			callback(keywordidchosen);
		}
	);
};

function set_subject_keywords(cdata, updatesubjects = false, callback) {
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

		if (subjectcount != null) {
			html = '<select class="selectpicker" data-subjectid="'+subjectid+'" '+
							'data-style="btn btn-sm btn-default" data-size="10" data-width="200px" '+
							'data-actions-box="true" data-live-search="true" '+
							'data-selected-text-format="count > 3" '+
							'title="'+subjectnm+' ('+subjectcount+')'+'" multiple>';
		}

		$.each(skeywords, function(index, kval) {
			keywordid = kval.IdPChave;
			keywordnm = kval.PChave;
			keywordtb = kval.TermoBusca;
			keywordgf = kval.Grifar;
			keywordcount = kval.QNoticias;
			if (keywordcount != null) {
				html += '<option data-type="keyword" data-keywordid="'+keywordid+'" data-subtext="('+keywordcount+')">'+keywordnm+'</option>';
				// keywordcount = 0;
			}
		});

		html += '</select>';
		$('#sublist').append(html);
		$('#sublist .selectpicker').selectpicker('refresh');

		$('#sublist .bs-deselect-all').css('float', 'none');
		$('#sublist .actions-btn').css('font-size', '70%');
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
	// add_keyword_news(keywordidchosen, clientid, startdate, enddate, true, 'startpage');
	return keywordidchosen;
};

function get_keyword_news(keywordid, startdate, enddate) {
	$('#tablenews').dataTable().fnClearTable();
	$('#tablenews').dataTable().fnDestroy();
	$('#tablenews').DataTable({
		'ajax': '/home/keyword_news/'+keywordid+'/'+startdate+'/'+enddate,
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

function add_keyword_news(keywordid, clientid, startdate, enddate, cleartable = false, type) {
	$('.dataTables_processing').show();
	$.get('/home/keyword_news/'+keywordid+'/'+clientid+'/'+startdate+'/'+enddate,
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

			vdatetimenow = new Date();
			vnday = vdatetimenow.getDate();
			vnday = ('0'+vnday).slice(-2);
			vnnmonth = (vdatetimenow.getMonth() + 1);
			vnnmonth = ('0'+vnnmonth).slice(-2);
			vnnmonharr = vdatetimenow.toString().split(' ');
			vnnmonth = vnnmonharr[1];
			vnyear = vdatetimenow.getFullYear();
			vnhour = vdatetimenow.getHours();
			vnhour = ('0'+vnhour).slice(-2);
			vnminutes = vdatetimenow.getMinutes();
			vnminutes = ('0'+vnminutes).slice(-2)

			if (vdatetime > vdatetimenow) {
				vdate = vnday+'/'+vnnmonth;
				vtime = vnhour+':'+vnminutes;
			} else {
				vdate = vday+'/'+vnmonth;
				vtime = vhour+':'+vminutes;
			}

			vtitle = val.Titulo;
			if (vtitle.length > 50) {
				vtitle = vtitle.slice(0, 47) + '...';
				vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'" data-toggle="tooltip" data-placement="top" title="" data-original-title="'+val.Titulo+'">'+vtitle+'</a>'
			} else if (vtitle.length = 1) {
				vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'">Sem Título</a>';
			} else {
				vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'">'+vtitle+'</a>';
			}

			vedvalor = Number(val.EdValor).toLocaleString("pt-BR", {minimumFractionDigits: 2});
			vedvalor = 'R$ '+vedvalor;

			vaudiencia = Number(val.EdAudiencia).toLocaleString("pt-BR", {minimumFractionDigits: 0});

			var rowNode = tablenews.row.add(
				[
					vdate,
					vtime,
					val.TipoVeiculo,
					val.Veiculo,
					val.Editoria,
					val.PalavraChave,
					vftitle,
					vedvalor,
					vaudiencia
				]
			).draw(false).node();
			$(rowNode).attr('id', 'tr_'+val.Id);
			// $(rowNode).attr('data-clientid', clientid);
			$(rowNode).attr('data-keywordid', keywordid);
		});

		switch(type) {
			case 'advancedsearch':
				cadsbtn.ladda('stop');
				$('#advancedsearch').modal('hide');
				break;
			case 'selecteddate':
				cdatebtn.ladda('stop');
				salertloadingdone(isTouchDevice());
				break;
			case 'subjectkeyword':
				break;
			case 'autorefresh':
				break;
			default:
				salertloadingdone(isTouchDevice());
				break;
		}

		$('.dataTables_processing').hide();
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
	$.get('/home/single_news_keyword/'+newsid+'/'+newskwid, function(data) {
		kcallback(data);
	});
};

function get_single_news(newsid, clientid, callback) {
	$.get('/home/single_news/'+newsid+'/'+clientid, function(data) {
		callback(data);
	});
};

function get_subjects(clientid, callback) {
	$.get('/home/client_subjects/'+clientid, function(data) {
		callback(data);
	});
};

function set_subjects(subjdata) {
	subjdata.map(function(val, index) {
		html = '<option data-type="adssubject" data-subjectid="'+val.Id+'" data-subjectorder="'+val.Ordem+'" value="'+val.Nome+'">'+val.Nome+'</option>';
		$('#adssubject').append(html);
	});
	$('#adssubject').selectpicker('refresh');
	console.log('Done.');
};

function get_keywordsfromsubject(subjectid, callback) {
	$.get('/home/subject_keywords/'+subjectid, function(data) {
		callback(data);
	});
};

function get_veiculosfromtipoveiculos(tveiculoid, callback) {
	$.get('/home/veiculos_tipoveiculos/'+tveiculoid, function(data) {
		callback(data);
	});
};

function get_editoriasfromveiculos(veiculoid, callback) {
	$.get('/home/editorias_veiculos/'+veiculoid, function(data) {
		callback(data);
	});
};

function get_tveiculos(callback) {
	$.get('/home/get_tveiculos', function(data) {
		callback(data);
	});
};

function get_states(callback) {
	$.get('/home/get_states', function(data) {
		callback(data);
	});
};

function sectostring(secs) {
	var sec_num = parseInt(secs, 10);
	var hours   = Math.floor(sec_num / 3600);
	var minutes = Math.floor((sec_num - (hours * 3600)) / 60);
	var seconds = sec_num - (hours * 3600) - (minutes * 60);
	var mseconds = String(secs);
	var milliseconds =  mseconds.slice(-3);

	if (hours  < 10) {hours = "0" + hours;}
	if (minutes < 10) {minutes = "0" + minutes;}
	if (seconds < 10) {seconds = "0" + seconds;}
	// return hours+':'+minutes+':'+seconds+'.'+milliseconds;

	if (secs >= 60) {
		return minutes+':'+seconds;
	} else {
		return seconds;
	}
}

function refresh_countdown(seconds) {
	$('.fa.fa-check').fadeOut('fast');
	$('#icheck'+seconds).fadeIn('fast');

	if (seconds == 'disable') {
		$('#countdownrefresh').fadeOut('fast');

		clearInterval(rfdata);
	} else {
		miliseconds = seconds * 1000;
		countdowns = seconds;

		$('#countdownrefresh').text(sectostring(countdowns));
		$('#countdownrefresh').fadeIn('fast');

		// if (window.Worker) {
		// 	dtrefreshworker = new Worker('/assets/dataclip/dtrefreshworker.js');
		// }

		$(function(){
			rfdata = setInterval(function() {
				if (countdowns <= 0) {
					countdowns = seconds;

					console.log('Updating data...');
					load_data('autorefresh');
				} else {
					countdowns--;
				}

				$('#countdownrefresh').text(sectostring(countdowns))
			}, 1000);
		});
	}
}