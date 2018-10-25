{extends file='teste_body_home_client.tpl'}
{block name=foot}
	<!-- Footer-->
	<footer class="footer">
		<span class="pull-right">
			 Dataclip - Business Inteligence
		</span>
	</footer>
</div><!-- Main Wrapper -->

<script type="text/javascript" charset="utf-8" src="/assets/dataclip/dtfunctions.js"></script>
<script type="text/javascript" charset="utf-8">
	var clientsel = '{$client_selected}';
	var clientselid = {$client_sel_id};
	var clientselb = (clientsel == 'true');

	{literal}
	var rfdata, dtworker, dtrefreshworker, cid, cliid, tablenews, tableexport, tablenewsfn, cname, firsttabn,
	sectabn, subjectid, subjectnm, keywordid, keywordnm, keywordtb, keywordgf, subjectskeywords,
	headerlogo, subjecctid, subjectcount, keywordcount, mediatype, idtitle, adssearchdata,
	imgobj, jcrop_api, snewsx1, snewsy1, snewsx2, snewsy2, snewsmw, snewsmh;
	var adsdestaque = null;
	var jcropdestroy = false, vmotesp = false, vmotprov = false, vmotnenh = false, vavaneg = false,
	vavaneu = false, vavapos = false, vavanenh = false, vadvsearch = false, vmyclipp = false;
	var subkeywordsarr = [], tvarr = [], varr = [], earr = [], pcarr = [], trselected = [],
	adssubjectarr = [], adskeywordarr = [], adstveiculoarr = [], adsveiculoarr = [], adsveiculossitesarr = [],
	adseditoriaarr = [], adsstatesarr = [], adsmotivacaoarr = [], adsavaliacaoarr = [], arrtest = [],
	idsnots = [], idskws = [];

	if (window.Worker) {
		dtworker = new Worker('/assets/dataclip/dtworker.js');
	}

	var d = new Date();
	var day = d.getDate();
	var day = ('0' + day).slice(-2);
	var month = (d.getMonth() + 1);
	var month = ('0' + month).slice(-2);
	var year = d.getFullYear();
	var todaydate = year+'-'+month+'-'+day;
	var todaydate_br = day+'/'+month+'/'+year;
	var cdatebtn = $('#dpbtn').ladda();
	var cadsbtn = $('#adsbtn').ladda();
	var btncmclipp = $('#mclippbtncreate').ladda();

	$(document).ready(function() {
		// set_tablenews(false, false);

		// tableexport = $('#tableexport').DataTable({
		// 	'order': [
		// 		[0, 'asc']
		// 	],
		// 	'destroy': true,
		// 	'autoWidth': true,
		// 	'rowId': 'Id',
		// 	'buttons': {
		// 		'buttons': [
		// 			{
		// 				'title': 'ExportarExcel',
		// 				'extend': 'excelHtml5',
		// 				// 'action': function(dt) {
		// 				// 	console.log(dt);
		// 				// },
		// 				'customize': function(xlsx) {
		// 					console.log(xlsx);
		// 					var sheet = xlsx.xl.worksheets['sheet1.xml'];

		// 					//bold at colunm "C"
		// 					// $('row c[r^="C"]', sheet).attr('s','2');
		// 					// $('row c[r^="C"]', sheet).attr('s','2');

		// 					// console.log($('row c[r="2"]', sheet));

		// 					//background row 2
		// 					$('row r[r="2"]', sheet).attr('s', '20');

		// 					//line on all rows
		// 					$('row', sheet).each(function(index, elem) {
		// 						// console.log($(elem));
		// 						// $('row c[r*="10"]', sheet).attr( 's', '25' );
		// 						$(elem).attr( 's', '25' );
		// 					});
		// 				}
		// 			}
		// 		]
		// 	},
		// 	'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'}
		// });

		$('#tablenews').DataTable();
	});

	$('#adsdatepicker').datepicker({
		format: "dd/mm/yyyy",
		language: 'pt-BR',
		todayBtn: true,
		todayHighlight: true,
		autoclose: true
		}).on('change', function(){
			$('#adsenddate').focus();
	});

	$('#adsstarttime').clockpicker({
		autoclose: true,
	}).on('change', function(){
		$('#adsendtime').focus();
		$('html').css('overflow-y', 'hidden');
	});

	$('#adsendtime').clockpicker({
		autoclose: true
	});

	$('#event_period').datepicker({
		format: "dd/mm/yyyy",
		language: 'pt-BR',
		todayBtn: true,
		todayHighlight: true,
		inputs: $('.actual_range')
	});

	$('.tooltipinput').tooltip({
		trigger: 'manual'
	});

	$('#modal-texti').slimScroll({
		height: '250px',
		railVisible: true,
		touchScrollStep: 800
	});

	var chartdonut = c3.generate({
		bindto: '#chartdonut',
		data: {
			columns: [
				['Amil', Math.floor((Math.random() * 100) + 10)],
				['Unimed', Math.floor((Math.random() * 100) + 10)],
				['Assim', Math.floor((Math.random() * 100) + 10)],
				['Amil', Math.floor((Math.random() * 100) + 10)],
				['Golden Cross', Math.floor((Math.random() * 100) + 10)],
				['Intermédica', Math.floor((Math.random() * 100) + 10)],
				['Sulamérica', Math.floor((Math.random() * 100) + 10)]
			],
			type: 'donut'
		},
		donut: {
			label: {
				format: function (value) { return value; }
			}
		}
	});

	// $('#brmap').mapael({
	// 	map : {
	// 		name: 'brasil',
	// 		defaultArea: {
	// 			attrs: {
	// 				"stroke": "##FFFFFF",
	// 				"stroke-width": 2
	// 			},
	// 				attrsHover: {
	// 				"fill": "#838383",
	// 				"stroke-width": 2
	// 			}
	// 		}
	// 	}
	// });
	var mapareas = {};
	var esdata = [
	    {
	        "Id": "11",
	        "uf": "MG",
	        "Estado": "Minas Gerais",
	        "QNoticias": Math.floor((Math.random() * 100) + 10)
	    },
	    {
	        "Id": "7",
	        "uf": "DF",
	        "Estado": "Distrito Federal",
	        "QNoticias": Math.floor((Math.random() * 100) + 10)
	    },
	    {
	        "Id": "19",
	        "uf": "RJ",
	        "Estado": "Rio de Janeiro",
	        "QNoticias": Math.floor((Math.random() * 100) + 10)
	    },
	    {
	        "Id": "26",
	        "uf": "SP",
	        "Estado": "Sao Paulo",
	        "QNoticias": Math.floor((Math.random() * 100) + 10)
	    }
	]

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

	var chartstacked = c3.generate({
		bindto: '#chartstacked',
		data: {
			columns: [
				['1', Math.floor((Math.random() * 100) + 10)],
				['2', Math.floor((Math.random() * 100) + 10)],
				['3', Math.floor((Math.random() * 100) + 10)]
			],
			type: 'bar',
			names: {
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

	datearr = ['Data'];
	for (var i = 5; i >= 1; i--) {
		var dt = new Date();
		dt.setDate(dt.getDate()-i);
		var day = dt.getDate();
		var day = ('0' + day).slice(-2);
		var month = (d.getMonth() + 1);
		var month = ('0' + month).slice(-2);
		var year = d.getFullYear();
		var cdate = year+'-'+month+'-'+day;

		datearr.push(cdate);
	}
	datearr.push(todaydate);

	var chartlinestacked = c3.generate({
		bindto: '#chartlinestacked',
		size: {
			height: 300
		},
		data: {
				x: 'Data',
				columns: [
					datearr,
					['Quantidade', Math.floor((Math.random() * 100) + 10), Math.floor((Math.random() * 100) + 10), Math.floor((Math.random() * 100) + 10), Math.floor((Math.random() * 100) + 10) ,Math.floor((Math.random() * 100) + 10), Math.floor((Math.random() * 100) + 10), Math.floor((Math.random() * 100) + 10)],
					['Atendidas', Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10) ,Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10)],
					['Perdidas', Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10) ,Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10), Math.floor((Math.random() * 20) + 10)]
				],
				axes: {
					'Quantidade': 'y2',
				},
				types: {
					'Quantidade': 'bar',
					'Atendidas': 'spline',
					'Perdidas': 'spline'
				},
				names: {
					'Quantidade': 'Quantidade',
					'Atendidas': 'Atendidas',
					'Perdidas': 'Perdidas'
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

	// get_tveiculos(function(data) {
	// 	data.map(function(val, index) {
	// 		html = '<option data-type="adstveiculo" data-tveiculoid="'+val.Id+'" value="'+val.Id+'">'+val.Nome+'</option>';
	// 		$('#adstveiculo').append(html);
	// 	});
	// 	$('#adstveiculo').selectpicker('refresh');
	// });

	// get_states(function(data) {
	// 	data.map(function(val, index) {
	// 		html = '<option data-type="adsstates" data-stateid="'+val.id+'" title="'+val.uf+'" value="'+val.id+'">'+val.nome+'</option>';
	// 		$('#adsstates').append(html);
	// 	});
	// 	$('#adsstates').selectpicker('refresh');
	// });

	var sites = new Bloodhound({
		datumTokenizer: Bloodhound.tokenizers.obj.whitespace('Nome'),
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			url: document.origin+'/home/editorias_sites?query=%QUERY',
			wildcard: '%QUERY',
			filter: function (rsites) {
				return $.map(rsites, function(site) {
					return {
						'Id': site.Id,
						'Nome': site.Nome
					};
				});
			},
			identify: function(rsites) { return rsites.Id; }
		}
	});

	sites.initialize();

	$('#adsveiculosites').tagsinput({
		typeaheadjs: [
			{
				minLength: 3,
				hint: true,
				highlight: true,
				limit: 20,
			},
			{
				itemText: 'Nome',
				itemValue: 'Id',
				name: 'sites',
				displayKey: 'Nome',
				source: sites.ttAdapter(),
			},
		],
		freeInput: false,
		itemText: 'Nome',
		itemValue: 'Id'
	});

	$('.twitter-typeahead').css('display', 'inline');

	if (clientselb) {
		subkeywordsarr = [];
		tvarr = [], varr = [], earr = [], pcarr = [];

		$('#changeclient').css('display', 'none');
		$('#selclient').attr('disabled', true);
		$('#selclient').addClass('disabled');

		$('#btnnpapper').attr({
			'href': 'http://v22.multclipp.com.br/banca/?path='+clientselid,
			'target': '_blank'
		});

		salertloading(isTouchDevice());

		load_data('startpage', clientselid, todaydate, todaydate);
	}

	if (clientselid == 0) {
		console.log('no client selected!');
	} else {
		cliid = clientselid;
	}
</script>
<script type="text/javascript" charset="utf-8" src="/assets/dataclip/dteventlistener.js"></script>
{/literal}
{/block}
