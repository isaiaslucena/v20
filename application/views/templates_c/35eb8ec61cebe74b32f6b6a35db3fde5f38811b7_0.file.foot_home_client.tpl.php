<?php
/* Smarty version 3.1.30, created on 2018-04-02 18:58:30
  from "/app/application/views/templates/foot_home_client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac2a7867e92e6_54514503',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '35eb8ec61cebe74b32f6b6a35db3fde5f38811b7' => 
    array (
      0 => '/app/application/views/templates/foot_home_client.tpl',
      1 => 1522706303,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:body_home_client.tpl' => 1,
  ),
),false)) {
function content_5ac2a7867e92e6_54514503 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20987032085ac2a7867d30d0_34742144', 'foot');
?>

<?php $_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:body_home_client.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'foot'} */
class Block_20987032085ac2a7867d30d0_34742144 extends Smarty_Internal_Block
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

	
	var dtworker, cid, tablenews, tablenewsfn, cname, firsttabn, sectabn, subjectid, subjectnm,
	keywordid, keywordnm, keywordtb, keywordgf, subjectskeywords, headerlogo,
	subjecctid, subjectcount, keywordcount, mediatype, idtitle;
	var subkeywordsarr = [], tvarr = [], varr = [], earr = [], pcarr = [], trselected = [];
	var adssubjectarr = [], adskeywordarr = [], adstveiculoarr = [], adsveiculoarr = [], adseditoriaarr = [], adsstatesarr = [];

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
				$('[data-toggle="tooltip"]').tooltip();
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
			html = '<option data-type="adstveiculo" data-tveiculoid="'+val.Id+'" value="'+val.Nome+'">'+val.Nome+'</option>';
			$('#adstveiculo').append(html);
		});
		$('#adstveiculo').selectpicker('refresh');
	});

	get_states(function(data) {
		data.map(function(val, index) {
			html = '<option data-type="adsstates" data-stateid="'+val.id+'" value="'+val.uf+'" title="'+val.uf+'">'+val.nome+'</option>';
			$('#adsstates').append(html);
		});
		$('#adsstates').selectpicker('refresh');
	});

	var sites = new Bloodhound({
		datumTokenizer: function (datum) {
			return Bloodhound.tokenizers.whitespace(datum.value);
		},
		queryTokenizer: Bloodhound.tokenizers.whitespace,
		remote: {
			url: document.origin+'/home_client/editorias_sites?query=%QUERY',
			wildcard: '%QUERY',
			filter: function (rsites) {
				return $.map(rsites, function(site) {
					return {
						Id: site.Id,
						Nome: site.Nome
					};
				});
			}
		}
	});

	sites.initialize();

	$('#adsveiculosites').typeahead(null, {
			displayKey: 'Nome',
			source: sites.ttAdapter(),
			minLength: 3,
			highlight: true,
			limit: 20
	});

	if (clientselb) {
		subkeywordsarr = [];
		tvarr = [], varr = [], earr = [], pcarr = [];

		$('#changeclient').css('display', 'none');
		$('#selclient').attr('disabled', true);
		$('#selclient').addClass('disabled');

		salertloading(isTouchDevice());

		// setTimeout(function(){

			if (window.Worker) {
				dtworker1 = new Worker('/assets/dataclip/dtworker.js');
				dtworker2 = new Worker('/assets/dataclip/dtworker.js');
				dtworker3 = new Worker('/assets/dataclip/dtworker.js');
				dtworker4 = new Worker('/assets/dataclip/dtworker.js');
				dtworker5 = new Worker('/assets/dataclip/dtworker.js');
				dtworker6 = new Worker('/assets/dataclip/dtworker.js');
				dtworker7 = new Worker('/assets/dataclip/dtworker.js');

				dtworker1.postMessage({'vfunction':'get_client_info', 'method':'GET', 'url': '/home_client/client_info/'+clientselid});
				dtworker2.postMessage({'vfunction':'count_vtype', 'method':'GET', 'url': '/home_client/count_vtype_news/'+clientselid+'/'+todaydate+'/'+todaydate});
				dtworker3.postMessage({'vfunction':'count_states', 'method':'GET', 'url': '/home_client/count_states_news/'+clientselid+'/'+todaydate+'/'+todaydate});
				dtworker4.postMessage({'vfunction':'count_rating', 'method':'GET', 'url': '/home_client/count_rating_news/'+clientselid+'/'+todaydate+'/'+todaydate});
				dtworker5.postMessage({'vfunction':'count_client', 'method':'GET', 'url': '/home_client/count_client_news/'+clientselid+'/'+todaydate+'/'+todaydate});
				dtworker6.postMessage({'vfunction':'get_subject_keywords', 'method':'GET', 'url': '/home_client/client_subjects_keywords/'+clientselid+'/'+todaydate+'/'+todaydate});
				dtworker7.postMessage({'vfunction':'get_subjects', 'method':'GET', 'url': '/home_client/client_subjects/'+clientselid});

				dtworker1.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					set_client_info(clientselid, jresponse.name, jresponse.banner, true);
				};

				dtworker2.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					set_count_vtype(jresponse);
				};

				dtworker3.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					set_count_states(jresponse);
				};

				dtworker4.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					set_count_rating(jresponse);
				};

				dtworker5.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					set_count_client(jresponse);
				};

				dtworker6.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					$('.actual_range').datepicker('update', new Date(todaydate+'T00:00:00'));
					add_keyword_news(set_subject_keywords(jresponse, true), clientselid, todaydate, todaydate, true, 'startpage');
				};

				dtworker7.onmessage = function(event) {
					jresponse = JSON.parse(event.data.response);
					set_subjects(jresponse);
				};

				// dtworker.onmessage = function(event) {
				// 	// console.log(event.data);
				// 	jresponse = JSON.parse(event.data.response);
				// 	// console.log(jresponse);

				// 	vfunc = event.data.vfunction;
				// 	switch (vfunc) {
				// 		case 'get_client_info':
				// 			set_client_info(clientselid, jresponse.name, jresponse.banner, true);
				// 			break;
				// 		case 'count_vtype':
				// 			set_count_vtype(jresponse);
				// 			break;
				// 		case 'count_states':
				// 			set_count_states(jresponse);
				// 			break;
				// 		case 'count_rating':
				// 			set_count_rating(jresponse);
				// 			break;
				// 		case 'count_client':
				// 			set_count_client(jresponse);
				// 			break;
				// 		case 'get_subject_keywords':
				// 			$('.actual_range').datepicker('update', new Date(todaydate+'T00:00:00'));
				// 			add_keyword_news(set_subject_keywords(jresponse, true), clientselid, todaydate, todaydate, true, 'startpage');
				// 			break;
				// 		case 'get_subjects':
				// 			set_subjects(jresponse);
				// 			break;
				// 		default:
				// 			console.log('Nothing to do!')
				// 			break;
				// 	}
				// }
			}

		// }, 300);

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
