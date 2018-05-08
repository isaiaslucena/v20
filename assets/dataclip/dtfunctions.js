//Functions

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
		allowEscapeKey: false,
		allowOutsideClick: false,
		showCancelButton: false,
		showConfirmButton: false,
	});
};

function salertloadingdone(mobile) {
	if (mobile) {
		$('.selectpicker').selectpicker('mobile');
		$('#btnsgroupnews').removeClass('btn-group-justified').addClass('btn-group-vertical');
		$('#btnsgroupsnews').removeClass('btn-group-justified').addClass('btn-group-vertical');
		$('#btnexpand').css('display', 'none');
		$('#modaltitlerow > div.col-sm-4.col-md-4.col-lg-4').removeClass('text-center').removeClass('text-right').addClass('text-left');
		swalwidth = '16em';
	} else {
		swalwidth = '32em';
	}

	swal({
		title: "Pronto!",
		type: "success",
		// width: swalwidth,
		allowEscapeKey: false,
		allowOutsideClick: false,
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
		cbanner = '/home/proxy/'+btoa(data.banner);

		if (setselpicker) {
			$('#selclient').selectpicker('val', cname);
		}

		$('#bannerheader').attr('src', cbanner);
		$('#bannerheaders').css('margin-top', '3%');
		$('#bannerheaders').attr('src', cbanner);
	});
};

function set_client_info(cid, cname, cbanner, setselpicker) {
	if (setselpicker) {
		$('#selclient').selectpicker('val', cname);
	}

	cbanner = '/home/proxy/'+btoa(cbanner);
	$('#bannerheader').attr('src', cbanner);
	$('#bannerheaders').css('margin-top', '3%');
	$('#bannerheaders').attr('src', cbanner);
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
						html += '<option data-type="keyword" data-keywordid="'+keywordid+'" data-subtext="('+keywordcount+')" val="'+keywordid+'">'+keywordnm+'</option>';
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
			html = '<select class="selectpicker subjectkewords" data-subjectid="'+subjectid+'" '+
							'data-style="btn btn-sm btn-default" data-size="10" data-width="200px" '+
							'data-live-search="true" data-selected-text-format="count > 3" '+
							'title="'+subjectnm+' ('+subjectcount+')'+'" multiple>';
		}

		$.each(skeywords, function(index, kval) {
			keywordid = kval.IdPChave;
			keywordnm = kval.PChave;
			keywordtb = kval.TermoBusca;
			keywordgf = kval.Grifar;
			keywordcount = kval.QNoticias;
			if (keywordcount != null) {
				html += '<option data-type="keyword" data-keywordid="'+keywordid+'" data-subtext="('+keywordcount+')" val="'+keywordid+'">'+keywordnm+'</option>';
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

	if (cleartable) {
		tablenews.clear().draw();
	}

	$.get('/home/keyword_news/'+keywordid+'/'+clientid+'/'+startdate+'/'+enddate,
	function(redata, textStatus, xhr) {
		each_news_data(redata.data, keywordid, clientid);

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

function add_keyword_news_data(redata, keywordid, clientid, cleartable = false, type) {
	if (cleartable) {
		tablenews.clear().draw();
	}

	each_news_data(redata.data, keywordid, clientid);

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
};

function each_news_data(endata, keywordid, clientid) {
	$.each(endata, function(index, val) {
		vmotesp = false, vmotprov = false, vmotnenh = false,
		vavaneg = false, vavaneu = false, vavapos = false, vavanenh = false;

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
		vfdatetime = vdate+'<br>'+vtime;

		vtitle = val.Titulo;
		vtitlelth = vtitle.length;
		if (vtitlelth > 50) {
			vtitle = vtitle.slice(0, 47) + '...';
			vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'" data-toggle="tooltip" data-placement="top" title="" data-original-title="'+val.Titulo+'">'+vtitle+'</a>'
		} else if (vtitlelth == 1) {
			vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'">Sem Título</a>';
		} else {
			vftitle = '<a class="tooltipa" data-newsid="'+vid+'" data-keywordid="'+keywordid+'" data-clientid="'+clientid+'">'+vtitle+'</a>';
		}

		vpchave = '<span data-trid="tr_'+val.Id+'" data-keywordid="'+keywordid+'">'+val.PalavraChave+'</span>';

		vedvalor = Number(val.EdValor).toLocaleString("pt-BR", {minimumFractionDigits: 2});
		vedvalor = 'R$ '+vedvalor;

		vaudiencia = Number(val.EdAudiencia).toLocaleString("pt-BR", {minimumFractionDigits: 0});

		vavaliacao = val.Avaliacao;
		switch(vavaliacao) {
			case '1':
				vavaneg = true;
				break;
			case '2':
				vavaneu = true;
				break;
			case '3':
				vavapos = true;
				break;
			default:
				vavanenh = true;
				break;
		}

		vmotivacao = val.Motivacao;
		switch(vmotivacao) {
			case '1':
				vmotesp = true;
				break;
			case '2':
				vmotprov = true;
				break;
			default:
				vmotnenh = true;
				break;
		}
		avmobtns =	'<div id="btngpa_'+vid+'" data-toggle="buttons" class="btn-group">'+
									'<label class="btn btn-xs rdaval '+(vavaneg ? 'active btn-danger' : 'btn-default')+'" title="Negativo" data-aval="1" data-newsid="'+vid+'">'+
										'<input type="radio" id="avaliacao1" name="Aval">'+
										'<i class="fa fa-frown-o"></i>'+
									'</label>'+
									'<label class="btn btn-xs rdaval '+(vavaneu ? 'active btn-warning' : 'btn-default')+'" title="Neutro" data-aval="2" data-newsid="'+vid+'"">'+
										'<input type="radio" id="avaliacao2" name="Aval">'+
										'<i class="fa fa-meh-o"></i>'+
									'</label>'+
									'<label class="btn btn-xs rdaval '+(vavapos ? 'active btn-success' : 'btn-default')+'" title="Positivo" data-aval="3" data-newsid="'+vid+'">'+
										'<input type="radio" id="avaliacao3" name="Aval">'+
										'<i class="fa fa-smile-o"></i>'+
									'</label>'+
								'</div>'+
								'<br>'+
								'<div id="btngpm_'+vid+'" data-toggle="buttons" class="btn-group">'+
									'<label class="btn btn-xs rdmoti '+(vmotesp ? 'active btn-success' : 'btn-default')+'" title="Espontânea" data-moti="1" data-newsid="'+vid+'">'+
										'<input type="radio" id="motivacao1" name="Moti">'+
										'<i class="fa fa-users"></i>'+
									'</label>'+
									'<label class="btn btn-xs rdmoti '+(vmotprov ? 'active btn-warning' : 'btn-default')+'" title="Provocada" data-moti="2" data-newsid="'+vid+'">'+
										'<input type="radio" id="motivacao2" name="Moti">'+
										'<i class="fa fa-handshake-o">'+
									'</label>'+
								'</div>';

		var tablenodes = tablenews.rows().nodes();
		if ($(tablenodes).filter('tr#tr_'+val.Id).length == 1) {
			rowindex = tablenews.row('#tr_'+val.Id).index();
			newnode = tablenews.cell(rowindex,4).node();
			$(newnode).append('<span data-kwseparator="true">, </span>'+vpchave);

			modrownode = tablenews.row('#tr_'+val.Id).node();
			$(modrownode).attr('data-multiplekw', true);
		} else {
			var rowNode = tablenews.row.add(
				[
					vfdatetime,
					val.TipoVeiculo,
					val.Veiculo,
					val.Editoria,
					vpchave,
					vftitle,
					vedvalor,
					vaudiencia,
					avmobtns
				]
			).draw(false).node();
			// $(rowNode).attr('data-keywordid', keywordid);
		}

		$(rowNode).attr('id', 'tr_'+val.Id);
	});
};

function add_advsearch_news_data(newsdata, clientid) {
	tablenews.clear().draw();

	each_news_data(newsdata.data, 0, clientid);

	cadsbtn.ladda('stop');
	$('#advancedsearch').modal('hide');
	$('.dataTables_processing').hide();
};

function remove_keyword_news(keywordid) {
	$('.dataTables_processing').show();

	$('#selpckr_2').html('<option val=""></option>');
	$('#selpckr_3').html('<option val=""></option>');
	$('#selpckr_4').html('<option val=""></option>');
	$('#selpckr_5').html('<option val=""></option>');
	tvarr = [], varr = [], earr = [], pcarr = [];

	tbnodes = tablenews.rows().column(4).nodes();
	tbnodes.map(function(val, index) {
		ckws = $(val).children('span[data-keywordid]');
		if (ckws.length > 1) {
			trid = ckws.attr('data-trid');
			ckws.map(function(cval, index) {
				ckwid = $(index).attr('data-keywordid');
				if (ckwid == keywordid) {
					if (cval == 0) {
						$(index).next('span[data-kwseparator]').detach();
					} else {
						$(index).prev('span[data-kwseparator]').detach();
					}
					$(index).detach();
				}
			});
			tablenews.rows().column(4).draw(false);
		} else {
			ckwid = ckws.attr('data-keywordid');
			trid = ckws.attr('data-trid');
			if (ckwid == keywordid) {
				tablenews.row('#'+trid).remove().draw(false);
			}
		}
	});

	$('.dataTables_processing').hide();
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

function set_single_news_dtw(tndata, titletrid){
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
		case '1':
			snewsmotstr = '<span class="text-warning">Espontânea</span>';
			break;
		case '2':
			snewsmotstr = '<span class="text-warning">Provocada</span>';
			break;
		default:
			snewsmotstr = '<span class="text-warning">Nenhuma</span>';
			break;
	}

	switch(snewsava) {
		case '1':
			snewsavastr = '<span class="text-danger">Negativo</span>';
			break;
		case '2':
			snewsavastr = '<span class="text-warning">Neutro</span>';
			break;
		case '3':
			snewsavastr = '<span class="text-success">Positiva</span>';
			break;
		default:
			snewsavastr = '<span class="text-warning">Nenhum</span>';
			break;
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
			crosimg = '/home/proxy/'+btoa(multclipimgurl+'/'+snewsimg);
			imgobj.src = crosimg;

			imgobj.onload = function(event) {
				imgobjw = imgobj.width;
				imgobjh = imgobj.height;

				document.getElementById('mediactni').innerHTML = '';
				imgobj.setAttribute('id', 'mediaelimg');
				document.getElementById('mediactni').appendChild(imgobj);

				rgxnoimage = new RegExp('/assets/imgs/noimage.png', 'ig');
				if (rgxnoimage.test(imgobj.src)) {
					jcrop_api.destroy();
				} else {
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
				}

				$('#mediaimgload').fadeOut('fast', function() {
					$('#mediactni').fadeIn('fast');
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
			'<img id="mediaelimg" class="img-responsive noimageatall" src="/assets/imgs/noimage.png">'
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
};

function xhr_single_news(){
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
					snewsmotstr = '<span class="text-warning">Nenhuma</span>';
					break;
				case '1':
					snewsmotstr = '<span class="text-warning">Espontânea</span>';
					break;
				case '2':
					snewsmotstr = '<span class="text-warning">Provocada</span>';
					break;
				default:
					snewsmotstr = '<span class="text-warning">Nenhuma</span>';
					break;
			}

			switch(snewsava) {
				case '0':
					snewsavastr = '<span class="text-warning">Nenhum</span>';
					break;
				case '1':
					snewsavastr = '<span class="text-danger">Negativo</span>';
					break;
				case '2':
					snewsavastr = '<span class="text-warning">Neutro</span>';
					break;
				case '3':
					snewsavastr = '<span class="text-success">Positiva</span>';
					break;
				default:
					snewsavastr = '<span class="text-warning">Nenhum</span>';
					break;
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
};

function get_subjects(clientid, callback) {
	$.get('/home/client_subjects/'+clientid, function(data) {
		callback(data);
	});
};

function set_subjects(subjdata) {
	subjdata.map(function(val, index) {
		html = '<option data-type="adssubject" data-subjectid="'+val.Id+'" data-subjectorder="'+val.Ordem+'" value="'+val.Id+'">'+val.Nome+'</option>';
		$('#adssubject').append(html);
	});
	$('#adssubject').selectpicker('refresh');
	// console.log('Done.');
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

function set_facsimile(){
	console.log('teste');
	//teste
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
	return minutes+':'+seconds;

	// if (secs >= 60) {
	// 	return minutes+':'+seconds;
	// } else {
	// 	return seconds;
	// }
};

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

					rstartdate = $('#dpsdate').data('datepicker').getFormattedDate('yyyy-mm-dd');
					renddate = $('#dpedate').data('datepicker').getFormattedDate('yyyy-mm-dd');
					if (clientselid == 0) {
						cliid = cid;
					} else {
						cliid = clientselid;
					}


					console.log('Updating data...');
					load_data('autorefresh', cliid, rstartdate, renddate);
				} else {
					countdowns--;
				}

				$('#countdownrefresh').text(sectostring(countdowns))
			}, 1000);
		});
	}
};

function load_data(ptype, ldclientid, ldstartdate, ldenddate) {
	if (ldstartdate == ldenddate) {
		var ed = new Date(ldstartdate+'T00:00:00-03:00');
		ed.setDate(ed.getDate()-6);
		var edday = ed.getDate();
		var edday = ('0' + edday).slice(-2);
		var edmonth = (ed.getMonth() + 1);
		var edmonth = ('0' + edmonth).slice(-2);
		var edyear = ed.getFullYear();

		var fstartdate = edyear+'-'+edmonth+'-'+edday;
		var fenddate = ldenddate;
	} else {
		var fstartdate = ldstartdate;
		var fenddate = ldenddate;
	}

	dtworker.postMessage({
		'vfunction':'get_client_info',
		'method':'GET',
		'url': '/home/client_info/'+ldclientid,
		'clientid': ldclientid,
		'startdate': ldstartdate,
		'enddate': ldenddate,
		'ptype': ptype
	});
	dtworker.postMessage({
		'vfunction':'count_vtype',
		'method':'GET',
		'url': '/home/count_vtype_news/'+ldclientid+'/'+ldstartdate+'/'+ldenddate,
		'clientid': ldclientid,
		'startdate': ldstartdate,
		'enddate': ldenddate,
		'ptype': ptype
	});
	dtworker.postMessage({
		'vfunction':'count_states',
		'method':'GET',
		'url': '/home/count_states_news/'+ldclientid+'/'+ldstartdate+'/'+ldenddate,
		'clientid': ldclientid,
		'startdate': ldstartdate,
		'enddate': ldenddate,
		'ptype': ptype
	});
	dtworker.postMessage({
		'vfunction':'count_rating',
		'method':'GET',
		'url': '/home/count_rating_news/'+ldclientid+'/'+ldstartdate+'/'+ldenddate,
		'clientid': ldclientid,
		'startdate': ldstartdate,
		'enddate': ldenddate,
		'ptype': ptype
	});
	dtworker.postMessage({
		'vfunction':'count_client',
		'method':'GET',
		'url': '/home/count_client_news/'+ldclientid+'/'+fstartdate+'/'+fenddate,
		'clientid': ldclientid,
		'startdate': fstartdate,
		'enddate': fenddate,
		'ptype': ptype
	});
	dtworker.postMessage({
		'vfunction':'get_subject_keywords',
		'method':'GET',
		'url': '/home/client_subjects_keywords/'+ldclientid+'/'+ldstartdate+'/'+ldenddate,
		'clientid': ldclientid,
		'startdate': ldstartdate,
		'enddate': ldenddate,
		'ptype': ptype
	});
	dtworker.postMessage({
		'vfunction':'get_subjects',
		'method':'GET',
		'url': '/home/client_subjects/'+ldclientid,
		'clientid': ldclientid,
		'startdate': ldstartdate,
		'enddate': ldenddate,
		'ptype': ptype
	});
};

function add_data_export(data, callback) {
	tableexport.clear().draw();
	postData('/home/excel_export', data)
	.then(redata => {
		console.log(redata);

		redata.map(function(index, elem) {
			residnoticia = index.IdNoticia;
			resdata = index.Data;
			reshora = index.Hora;
			restititulo = index.Titulo;
			resurl = index.URL_Externo;
			resurlsistema = index.URL_Sistema;
			restveiculo = index.TipoVeiculo;
			resveiculo = index.Veiculo;
			reseditoria = index.Editoria;
			resassunto = index.Assunto;
			respchave = index.PalavraChave;
			restier = index.Tier;
			resvalor = index.Valor;
			resaudiencia = index.Audiencia;
			resavaliacao = index.Avaliacao;
			resmotivacao = index.Motivacao;

			var rowNode = tableexport.row.add(
				[
					residnoticia,
					resdata,
					reshora,
					restititulo,
					resurl,
					resurlsistema,
					restveiculo,
					resveiculo,
					reseditoria,
					resassunto,
					respchave,
					restier,
					resvalor,
					resaudiencia,
					resavaliacao,
					resmotivacao
				]
			).draw(false).node();
		});

		callback();
	})
	.catch(error => console.error(error))
}

function postData(url, data) {
	// Default options are marked with *
	return fetch(url, {
		body: JSON.stringify(data), // must match 'Content-Type' header
		cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
		credentials: 'same-origin', // include, same-origin, *omit
		headers: {
			'user-agent': 'Mozilla/4.0 MDN Example',
			'content-type': 'application/json'
		},
		method: 'POST', // *GET, POST, PUT, DELETE, etc.
		mode: 'cors', // no-cors, cors, *same-origin
		redirect: 'follow', // *manual, follow, error
		referrer: 'no-referrer', // *client, no-referrer
	})
	.then(response => response.json()) // parses response to JSON
};