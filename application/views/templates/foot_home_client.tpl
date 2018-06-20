{extends file='body_home_client.tpl'}
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
		set_tablenews(false, false);

		tableexport = $('#tableexport').DataTable({
			'order': [
				[0, 'asc']
			],
			'destroy': true,
			'autoWidth': true,
			'rowId': 'Id',
			'buttons': {
				'buttons': [
					{
						'title': 'ExportarExcel',
						'extend': 'excelHtml5',
						// 'action': function(dt) {
						// 	console.log(dt);
						// },
						'customize': function(xlsx) {
							console.log(xlsx);
							var sheet = xlsx.xl.worksheets['sheet1.xml'];

							//bold at colunm "C"
							// $('row c[r^="C"]', sheet).attr('s','2');
							// $('row c[r^="C"]', sheet).attr('s','2');

							// console.log($('row c[r="2"]', sheet));

							//background row 2
							$('row r[r="2"]', sheet).attr('s', '20');

							//line on all rows
							$('row', sheet).each(function(index, elem) {
								// console.log($(elem));
								// $('row c[r*="10"]', sheet).attr( 's', '25' );
								$(elem).attr( 's', '25' );
							});
						}
					}
				]
			},
			'language': {'url': '//cdn.datatables.net/plug-ins/1.10.15/i18n/Portuguese-Brasil.json'}
		});
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
			columns: [['Tipo de Veiculos', 0]],
			type: 'donut'
		}
	});

	$('#brmap').mapael({
		map : {
			name: 'brasil',
			defaultArea: {
				attrs: {
					"stroke": "##FFFFFF",
					"stroke-width": 2
				},
					attrsHover: {
					"fill": "#838383",
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

	get_tveiculos(function(data) {
		data.map(function(val, index) {
			html = '<option data-type="adstveiculo" data-tveiculoid="'+val.Id+'" value="'+val.Id+'">'+val.Nome+'</option>';
			$('#adstveiculo').append(html);
		});
		$('#adstveiculo').selectpicker('refresh');
	});

	get_states(function(data) {
		data.map(function(val, index) {
			html = '<option data-type="adsstates" data-stateid="'+val.id+'" title="'+val.uf+'" value="'+val.id+'">'+val.nome+'</option>';
			$('#adsstates').append(html);
		});
		$('#adsstates').selectpicker('refresh');
	});

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
