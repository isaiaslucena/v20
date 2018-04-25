<?php
/* Smarty version 3.1.30, created on 2018-04-25 13:43:07
  from "/app/application/views/templates/foot_home_client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ae0b01baa1956_82505310',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35eb8ec61cebe74b32f6b6a35db3fde5f38811b7' => 
    array (
      0 => '/app/application/views/templates/foot_home_client.tpl',
      1 => 1524674582,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:body_home_client.tpl' => 1,
  ),
),false)) {
function content_5ae0b01baa1956_82505310 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8922877065ae0b01ba8f925_17284965', 'foot');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:body_home_client.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'foot'} */
class Block_8922877065ae0b01ba8f925_17284965 extends Smarty_Internal_Block
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
 type="text/javascript" charset="utf-8" src="/assets/dataclip/dtfunctions.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8">
	var clientsel = '<?php echo $_smarty_tpl->tpl_vars['client_selected']->value;?>
';
	var clientselid = <?php echo $_smarty_tpl->tpl_vars['client_sel_id']->value;?>
;
	var clientselb = (clientsel == 'true');

	
	var rfdata, dtworker, dtrefreshworker, cid, tablenews, tablenewsfn, cname, firsttabn,
	sectabn, subjectid, subjectnm, keywordid, keywordnm, keywordtb, keywordgf, subjectskeywords,
	headerlogo, subjecctid, subjectcount, keywordcount, mediatype, idtitle,
	imgobj, jcrop_api, snewsx1, snewsy1, snewsx2, snewsy2, snewsmw, snewsmh;
	var adsdestaque = null;
	var jcropdestroy = false;
	var subkeywordsarr = [], tvarr = [], varr = [], earr = [], pcarr = [], trselected = [],
	adssubjectarr = [], adskeywordarr = [], adstveiculoarr = [], adsveiculoarr = [], adsveiculossitesarr = [],
	adseditoriaarr = [], adsstatesarr = [], adsmotivacaoarr = [], adsavaliacaoarr = [], arrtest = [];

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
		'rowId': 'id',
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
			if(isTouchDevice() === false) {
				$('.tooltipa').tooltip();
			}
		}
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

	// var sites = new Bloodhound({
	// 	datumTokenizer: function (datum) {
	// 		return Bloodhound.tokenizers.whitespace(datum.value);
	// 	},
	// 	queryTokenizer: Bloodhound.tokenizers.whitespace,
	// 	remote: {
	// 		url: document.origin+'/home/editorias_sites?query=%QUERY',
	// 		wildcard: '%QUERY',
	// 		filter: function (rsites) {
	// 			return $.map(rsites, function(site) {
	// 				return {
	// 					Id: site.Id,
	// 					Nome: site.Nome
	// 				};
	// 			});
	// 		},
	// 		identify: function(rsites) { return rsites.Id; }
	// 	}
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

	// $('#adsveiculosites').typeahead(null, {
	// 	displayKey: 'Nome',
	// 	async: true,
	// 	source: sites.ttAdapter(),
	// 	minLength: 3,
	// 	hint: true,
	// 	highlight: true,
	// 	limit: 20
	// });

	$('#adsveiculosites').tagsinput({
		freeInput: false,
		itemValue: 'Id',
		itemText: 'Nome',
		typeaheadjs: {
			name: 'sites',
			displayKey: 'Nome',
			source: sites.ttAdapter(),
			minLength: 3,
			hint: true,
			highlight: true,
			limit: 20
		}
	});

	$('.twitter-typeahead').css('display', 'inline');

	if (clientselb) {
		subkeywordsarr = [];
		tvarr = [], varr = [], earr = [], pcarr = [];

		$('#changeclient').css('display', 'none');
		$('#selclient').attr('disabled', true);
		$('#selclient').addClass('disabled');

		salertloading(isTouchDevice());

		load_data('startpage', clientselid, todaydate, todaydate);

		// get_client_info(clientselid, true);
		// count_vtype(clientselid, todaydate, todaydate);
		// count_rating(clientselid, todaydate, todaydate);
		// count_states(clientselid, todaydate, todaydate);
		// count_client(clientselid, todaydate, todaydate);
		// $('.actual_range').datepicker('update', new Date(todaydate+'T00:00:00'));
		// get_subject_keywords(clientselid, todaydate, todaydate, true, function(keywid){
		// 	add_keyword_news(keywid, clientselid, todaydate, todaydate, true, 'startpage');
		// });
		// get_subjects(clientselid, function(data){
		// 	data.map(function(val, index) {
		// 		html = '<option data-type="adssubject" data-subjectid="'+val.Id+'" data-subjectorder="'+val.Ordem+'" value="'+val.Nome+'">'+val.Nome+'</option>';
		// 		$('#adssubject').append(html);
		// 	});
		// 	$('#adssubject').selectpicker('refresh');
		// });
	}
<?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 type="text/javascript" charset="utf-8" src="/assets/dataclip/dteventlistener.js"><?php echo '</script'; ?>
>

<?php
}
}
/* {/block 'foot'} */
}
