<?php
/* Smarty version 3.1.30, created on 2018-03-27 13:59:18
  from "/app/application/views/templates/body_home_client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aba7866d04235_20892679',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76cba18931df9e5fe89b7011b419ddd788d1c24f' => 
    array (
      0 => '/app/application/views/templates/body_home_client.tpl',
      1 => 1522169891,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_5aba7866d04235_20892679 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20940836805aba7866cea4e8_37117014', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_20940836805aba7866cea4e8_37117014 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Header -->
	<div id="header" class="thumbnail">
		<img id="bannerheader" crossOrigin="anonymous" src="/assets/banner/dataclip_logo.jpg" alt="Logo" class="center-block img-responsive" style="height: 100%;">
	</div>

	<!-- Main Wrapper -->
	<div id="wrapper">
		<div class="container-fluid content" data-effect="zoomIn" data-child="element">
			
			<div id="changeclient" class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 element">
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
				<div class="col-sm-4 col-md-4 col-lg-4 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Quantidade por tipo de veículo</h4>
							</div>
							<div id="chartdonut"></div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-md-4 col-lg-4 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Quantidade por estado</h4>
							</div>
							<br>
							<div id="brmap" class="mapcontainer">
								<div class="map"></div>
								<div class="areaLegend" style="position: absolute; top: 55%"></div>
							</div>
						</div>
					</div>
				</div>

				<div class="col-sm-4 col-md-4 col-lg-4 element">
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
				<div class="col-sm-7 col-md-7 col-lg-7 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							<div class="stats-title text-center">
								<h4>Evolução</h4>
							</div>
							<div id="chartlinestacked"></div>
						</div>
					</div>
				</div>

				<div class="col-sm-5 col-md-5 col-lg-5 element">
					<div class="hpanel stats">
						<div class="panel-body h-200">
							
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 text-center">
									<div id="event_period">
										<div id="dpsdate" type="text" class="actual_range">
											<h5 class="text-center">DATA INICIAL</h5>
										</div>
										<div id="dpedate" type="text" class="actual_range">
											<h5 class="text-center">DATA FINAL</h5>
										</div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="center-block text-center">
										<button id="dpbtn" class="ladda-button btn btn-success" data-style="zoom-in">Confirmar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			
			<div class="row">
					<div class="col-sm-12 col-md-12 col-lg-12 element">
						<div class="hpanel">
							<div class="panel-body text-center">
								<button id="btnasearch" class="btn w-xs btn-primary" type="button"><i class="fa fa-search-plus"></i> <span class="bold">Pesquisa avançada</span></button>
								<button id="btnmyclipp" class="btn w-xs btn-primary" type="button"><i class="fa fa-thumb-tack"></i> <span class="bold">Meu Cliping</span></button>
								<button id="btncharts" class="btn w-xs btn-primary" type="button"><i class="fa fa-line-chart"></i> <span class="bold">Estatísticas</span></button>
								<button id="btnnpapper" class="btn w-xs btn-primary" type="button"><i class="fa fa-newspaper-o"></i> <span class="bold">Banca</span></button>
								<button id="btnepdf" class="btn w-xs btn-primary" type="button"><i class="fa fa-file-pdf-o"></i> <span class="bold">PDF</span></button>
								<button id="btneexcel" class="btn w-xs btn-primary" type="button"><i class="fa fa-file-excel-o"></i> <span class="bold">Excel</span></button>
								<button id="btnforward" class="btn w-xs btn-primary" type="button"><i class="fa fa-arrow-circle-right"></i> <span class="bold">Encaminhar</span></button>
							</div>
						</div>
					</div>
			</div>

			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 element">
					<div class="hpanel">
						<div id="sublist" class="panel-body center-block text-center"></div>
					</div>
				</div>
			</div>

			
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 element">
					<div id="newstable" class="hpanel">
						<div class="panel-body">
							<div id="divtablenews" class="table-responsive">
								<table id="tablenews" cellpadding="0.5" cellspacing="1" class="table table-bordered table-striped table-hover">
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

		<div class="modal fade" id="pagewaitmodal" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-sm" role="document">
				<div class="modal-content" style="height: 200px">
					<div class="hollow-dots-spinner center-block" style="vertical-align: middle;">
						<div class="dot"></div>
						<div class="dot"></div>
						<div class="dot"></div>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="showsinglenews" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" style="margin-top: 15px">
				<div class="modal-content">
					<div class="modal-header text-center" style="padding: 15px">
						<div id="modaltitlerow" class="row">
							<div class="col-lg-4 text-left">
								<h5 id="modaltitleve" class="text-primary"></h5>
								<h5 id="modaltitleed" class="text-primary"></h5>
							</div>
							<div class="col-lg-4 text-left">
								<h5 id="modaltitlevm" class="text-primary"></h5>
								<h5 id="modaltitleva" class="text-primary"></h5>
							</div>
							<div class="col-lg-4 text-left">
								<h5 id="modaltitlevq" class="text-primary"></h5>
								<h5 id="modaltitlevv" class="text-primary"></h5>
							</div>
						</div>
					</div>
					<div class="modal-body">
						<div id="modalcsinglenewsi" class="row" style="display: none">
							<div id="mediaimgload" class="col-sm-4 col-md-4 col-lg-4 center-block text-center" style="padding-top: 5%">
								<img src="/assets/imgs/loading.gif" width="40"><br>
							</div>
							<div id="mediactni" class="col-sm-4 col-md-4 col-lg-4" style="max-height: 420px; overflow-y: hidden; overflow-x: hidden; display: none">
							</div>
							<div class="col-lg-8">
								<p id="datemediactni" class="text-muted"></p>
								<p id="modaltitlevki" class="text-primary"></p>
								<h3 id="mediactnti"></h3>
								<p id="modal-texti" class="text-justify" style="max-height: 280px; overflow-y: auto"></p>
							</div>
						</div>

						<div id="modalcsinglenewsv" style="display: none">
							<div class="row">
								<div id="mediavideoload" class="col-sm-12 col-md-12 col-lg-12 center-block text-center">
									<img src="/assets/imgs/loading.gif" width="50"><br>
								</div>
								<div id="mediactnv" class="col-sm-12 col-md-12 col-lg-12" style="display: none"></div>
							</div>
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12 center-block">
									<p id="datemediactnv" class="text-muted"></p>
									<p id="modaltitlevkv" class="text-primary"></p>
									<h3 id="mediactntv"></h3>
									<p id="modal-textv" class="text-justify"></p>
								</div>
							</div>
						</div>

						<br>
						<div id="modalwsinglenews" class="row center-block text-center">
							<div class="col-sm-12 col-md-12 col-lg-12">
								<img src="/assets/imgs/loading.gif" alt="Carregando" width="60">
								<h3 id="waitmsg">Carregando...</h3>
							</div>
						</div>
					</div>
					<div id="modasnfooter" class="modal-footer">
						<a id="btnmail" class="btn btn-sm w-xs btn-default">Enviar por e-mail</a>
						<a id="btnurl" class="btn btn-sm w-xs btn-default" target="_blank">Abrir página</a>
						<a id="btnclose" class="btn btn-sm w-xs btn-default" data-dismiss="modal">Fechar</a>
						<a id="btnselclo" class="btn btn-sm w-xs btn-primary">Fechar e selecionar</a>
					</div>
				</div>
			</div>
		</div>

		<div class="modal fade" id="advancedsearch" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" style="margin-top: 15px">
				<div class="modal-content">
					<div class="modal-header text-center" style="padding: 15px">
						<h3>Pesquisa avançada</h3>
					</div>
					<div class="modal-body">
						<div class="row">
							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label>Assunto</label>
									<select id="adssubject" class="selectpicker form-control"
									data-size="10" data-style="btn btn-sm btn-default" data-actions-box="true"
									data-live-search="true" data-selected-text-format="count > 5" multiple>
									</select>
								</div>
								<div class="form-group">
									<label>Palavra-chave</label>
									<select id="adskeyword" class="selectpicker form-control disabled"
									data-size="10" data-style="btn btn-sm btn-default"
									data-actions-box="true" data-live-search="true" data-selected-text-format="count > 5"
									title="Selecione o assunto" multiple disabled>
									</select>
								</div>
								<div class="form-group">
									<label>Tipo de Veículo</label>
									<select id="adstveiculo" class="selectpicker form-control"
									data-size="10" data-style="btn btn-sm btn-default" data-actions-box="true"
									data-live-search="true" data-selected-text-format="count > 5" multiple>
									</select>
								</div>
								<div class="form-group">
									<label>Veículo</label>
									<select id="adsveiculo" class="selectpicker form-control disabled"
									data-size="10" data-style="btn btn-sm btn-default"
									data-actions-box="true" data-live-search="true" data-selected-text-format="count > 5"
									title="Selecione o tipo de veículo" multiple disabled>
									</select>
								</div>
								<div class="form-group">
									<label>Editoria</label>
									<select id="adseditoria" class="selectpicker form-control disabled"
									data-size="10" data-style="btn btn-sm btn-default" data-actions-box="true"
									data-live-search="true" data-selected-text-format="count > 5" title="Selecione o veículo" multiple disabled>
									</select>
								</div>
							</div>

							<div class="col-sm-6 col-md-6 col-lg-6">
								<div class="form-group">
									<label>Data</label>
									<div class="input-daterange input-group" id="adsdatepicker">
										<input required type="text" class="input-sm form-control" id="adsstartdate" name="adsstartdate" placeholder="Início" autocomplete="off"/>
										<span class="input-group-addon">Até</span>
										<input required type="text" class="input-sm form-control" id="adsenddate" name="adsenddate" placeholder="Fim" autocomplete="off"/>
									</div>
								</div>

								<div class="form-group">
									<label>Hora</label>
									<div class="input-daterange input-group">
										<input required type="text" class="input-sm form-control clockpicker" id="adsstarttime" name="adsstarttime" placeholder="Início" value="00:00" autocomplete="off"/>
										<span class="input-group-addon">Até</span>
										<input required type="text" class="input-sm form-control clockpicker" id="adsendtime" name="adsendtime" placeholder="Fim" value="23:59" autocomplete="off"/>
									</div>
								</div>

								<div class="row">
									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
											<label>Destaque</label>
											<div>
												<label style="font-weight: normal;">
													<div class="iradio_square-blue" style="position: relative;">
														<input type="radio" name="adsdestaque" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Sim
											</div>
											<div>
												<label style="font-weight: normal;">
													<div class="iradio_square-blue" style="position: relative;">
														<input type="radio" name="adsdestaque" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Não
											</div>
										</div>
									</div>

									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
											<label>Motivação</label>
											<div>
												<label class="" style="font-weight: normal;">
													<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Espontânea
											</div>
											<div>
												<label class="" style="font-weight: normal;">
													<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Provocada
											</div>
										</div>
									</div>

									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
											<label>Avaliação</label>
											<div>
												<label class="" style="font-weight: normal;">
													<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Negativo
											</div>
											<div>
												<label class="" style="font-weight: normal;">
													<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" name="motivradio" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Neutro
											</div>
											<div>
												<label class="" style="font-weight: normal;">
													<div class="icheckbox_square-blue" style="position: relative;">
														<input type="checkbox" class="i-checks" style="position: absolute; opacity: 0;">
														<ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
													</div>
												</label>
												Positivo
											</div>
										</div>
									</div>
								</div>

								<div class="form-group">
									<label>Estado</label>
									<select id="adsstates" class="selectpicker form-control" data-size="10" data-style="btn btn-sm btn-default" multiple data-actions-box="true" data-live-search="true">
									</select>
								</div>

								<div class="form-group">
									<label>Texto</label>
									<input type="text" id="adstext" name="stext" class="form-control input-sm" autocomplete="off">
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Cancelar </button>
						<button id="adsbtn" type="button" class="ladda-button btn btn-primary" data-style="zoom-in">Pesquisar</button>
					</div>
				</div>
			</div>
		</div>
<?php
}
}
/* {/block 'body'} */
}
