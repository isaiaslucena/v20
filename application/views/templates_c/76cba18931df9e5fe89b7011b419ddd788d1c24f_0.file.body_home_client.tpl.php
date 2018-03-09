<?php
/* Smarty version 3.1.30, created on 2018-03-09 15:56:39
  from "/app/application/views/templates/body_home_client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aa2d8e7ddf979_95068180',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76cba18931df9e5fe89b7011b419ddd788d1c24f' => 
    array (
      0 => '/app/application/views/templates/body_home_client.tpl',
      1 => 1520621798,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_5aa2d8e7ddf979_95068180 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19784597355aa2d8e7dd2294_09886849', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_19784597355aa2d8e7dd2294_09886849 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Header -->
	<div id="header" style="height: 10%;" class="text-center">
		<img id="bannerheader" crossOrigin="anonymous" src="/assets/banner/dataclip_logo.jpg" alt="Logo" style="height: 100%">
	</div>

	<!-- Main Wrapper -->
	<div id="wrapper">
		<div class="container-fluid content animate-panel" data-effect="zoomIn" data-child="element">
			
			<div class="row">
				<div class="col-lg-12 element">
					<div class="hpanel">
						<div class="panel-body">
							<select id="selclient" class="selectpicker" data-size="10" data-width="fit" data-live-search="true" data-style="btn-default btn-sm" title="Selecione um cliente">
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['clients']->value, 'client');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['client']->value) {
?>
									<option id="<?php echo $_smarty_tpl->tpl_vars['client']->value['Id'];?>
"><?php echo utf8_encode($_smarty_tpl->tpl_vars['client']->value['Nome']);?>
</option>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</select>
						</div>
					</div>
				</div>
			</div>

			
			
				
				

				
				

				
				

				
				
			

			
			<div class="row">
				<div class="col-lg-4 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Quantidade por tipo de veículo</h4>
							</div>
							<div id="chartdonut"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Quantidade por estado</h4>
							</div>
							<br>
							<div id="brmap" class="mapcontainer center-block img-responsive">
								<div class="map"></div>
								<div class="areaLegend" style="display: none;"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-lg-4 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Sentimentos</h4>
							</div>
							<div id="chartstacked"></div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="row">
				<div class="col-lg-7 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Evolução</h4>
							</div>
							<div id="chartlinestacked"></div>
						</div>
					</div>
				</div>

				<div class="col-lg-5 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							
							<div class="row">
								<div class="col-lg-12">
									<div id="event_period">
										<div id="dpsdate" type="text" class="actual_range text-center pull-left"><h5>DATA INICIAL</h5></div>
										<div id="dpedate" type="text" class="actual_range text-center pull-right"><h5>DATA FINAL</h5></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-lg-12">
									<div class="center-block text-center">
										<button id="dpbtn" class="ladda-button ladda-button-demo btn btn-success" data-style="zoom-in">Confirmar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="row">
					<div class="col-lg-6 element">
						<div class="hpanel">
							<div id="div1btns" class="panel-body text-center">
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-search-plus"></i> <span class="bold">Pesquisa avançada</span></button>
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-thumb-tack"></i> <span class="bold">Meu Cliping</span></button>
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-line-chart"></i> <span class="bold">Estatísticas</span></button>
							</div>
						</div>
					</div>

					<div class="col-lg-6 element">
						<div class="hpanel">
							<div id="div2btns" class="panel-body text-center">
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-newspaper-o"></i> <span class="bold">Banca</span></button>
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-file-pdf-o"></i> <span class="bold">PDF</span></button>
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-file-excel-o"></i> <span class="bold">Excel</span></button>
								<button class="btn w-xs btn-primary" type="button"><i class="fa fa-arrow-circle-right"></i> <span class="bold">Encaminhar</span></button>
							</div>
						</div>
					</div>
			</div>

			
			<div class="row">
				<div class="col-lg-12 element">
					<div class="hpanel">
						<div id="sublist" class="panel-body center-block text-center"></div>
					</div>
				</div>
			</div>

			
			<div class="row">
				<div class="col-lg-12 element">
					<div id="newstable" class="hpanel">
						<div class="panel-body">
								<div id="divtablenews" class="table-responsive">
									<table id="tablenews" cellpadding="0.5" cellspacing="1" class="table table-bordered table-striped">
										<thead>
											<tr>
												<th class="text-center">Data</th>
												<th class="text-center">Hora</th>
												<th class="text-center">Tipo de Veículo</th>
												<th class="text-center">Veículo</th>
												<th class="text-center">Editoria</th>
												<th class="text-center">Palavra-Chave</th>
												<th class="text-center">Título</th>
												<th class="text-center">Valor</th>
												<th class="text-center">Audiência</th>
											</tr>
										</thead>
										<tbody class="text-center"></tbody>
										<tfoot>
											<tr>
												<th class="text-center">Data</th>
												<th class="text-center">Hora</th>
												<th class="text-center"></th>
												<th class="text-center"></th>
												<th class="text-center"></th>
												<th class="text-center"></th>
												<th class="text-center">Título</th>
												<th class="text-center">Valor</th>
												<th class="text-center">Audiência</th>
											</tr>
										</tfoot>
									</table>
								</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="showsinglenews" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg">
				<div class="modal-content">
					<div class="modal-header text-center" style="padding: 15px">
						<div class="row">
							<div class="col-lg-3 text-left">
								<h5 id="modaltitleve" class="text-primary"></h5>
								<h5 id="modaltitleed" class="text-primary"></h5>
							</div>
							<div class="col-lg-3 text-center">
								<h5 id="modaltitlevm" class="text-primary"></h5>
								<h5 id="modaltitleva" class="text-primary"></h5>
							</div>
							<div class="col-lg-3 text-center">
								<h5 id="modaltitlevq" class="text-primary"></h5>
								<h5 id="modaltitlevv" class="text-primary"></h5>
							</div>
							<div class="col-lg-3 text-right">
								<a id="btnmail" class="btn btn-xs btn-block btn-primary">Enviar por e-mail</a>
								<a id="btnurl" class="btn btn-xs btn-block btn-primary" target="_blank">Abrir página</a>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<p id="modaltitlevk" class="text-primary pull-right"></p>
						<div id="modalcsinglenewsi" class="row" style="display: none">
							<div id="mediactni" class="col-lg-4"></div>
							<div class="col-lg-8">
								<p id="datemediactni" class="text-muted pull-right"></p>
								<h3 id="mediactnti"></h3>
								<p id="modal-texti" class="text-justify"></p>
							</div>
						</div>

						<div id="modalcsinglenewsv" style="display: none">
							<div class="row">
								<div id="mediactnv" class="col-lg-12"></div>
							</div>
							<div class="row">
								<div class="col-lg-12">
									<p id="datemediactnv" class="text-muted pull-right"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-lg-12 center-block">
									<h3 id="mediactntv"></h3>
									<p id="modal-textv" class="text-justify"></p>
								</div>
							</div>
						</div>

						<br>
						<div id="modalwsinglenews" class="row center-block text-center">
							<div class="col-lg-12">
								<img src="/assets/imgs/loading.gif" alt="Carregando" width="60">
								<h3 id="waitmsg">Carregando...</h3>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
<?php
}
}
/* {/block 'body'} */
}
