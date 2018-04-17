<?php
/* Smarty version 3.1.30, created on 2018-04-17 15:43:43
  from "/app/application/views/templates/body_home_client.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ad64060006357_82645878',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '76cba18931df9e5fe89b7011b419ddd788d1c24f' => 
    array (
      0 => '/app/application/views/templates/body_home_client.tpl',
      1 => 1523990060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:head.tpl' => 1,
  ),
),false)) {
function content_5ad64060006357_82645878 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12549713255ad6405ff278b2_25293294', 'body');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:head.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'body'} */
class Block_12549713255ad6405ff278b2_25293294 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<!-- Header -->
	<div id="header">
		<div id="logo" class="light-version" style="padding: 0; margin: auto; position: absolute; width: 100%;">
			<img id="bannerheader" class="center-block" style="max-height: 100%" src="/assets/banner/dataclip_logo.jpg" alt="Logo" crossOrigin="anonymous">
		</div>
		<div id="logomobile" class="small-logo" style="padding-top: 0px; position: absolute; width: 100%; height: 100%">
			<img id="bannerheaders" class="center-block" style="max-height: 100%; max-width: 100%;" src="/assets/banner/dataclip_logo.jpg" alt="Logo" crossOrigin="anonymous">
		</div>
		<div role="navigation">
			<div class="mobile-menu">
				<button type="button" class="navbar-toggle mobile-menu-toggle" data-toggle="collapse" data-target="#mobile-collapse">
					<i class="fa fa-chevron-down"></i>
				</button>
				<div class="collapse mobile-navbar" id="mobile-collapse">
					<ul class="nav navbar-nav">
						<li>
							<a class="" href="#">Perfil</a>
						</li>
						<li>
							<a class="" href="#">Configurações</a>
						</li>
						<li>
							<a class="" href="#">Sair</a>
						</li>
					</ul>
				</div>
			</div>

			<div class="navbar-right">
					<ul class="nav navbar-nav no-borders">
						<li class="dropdown" title="Atualizar">
							<a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown" aria-expanded="false">
								<i class="pe-7s-refresh"></i>
								<span id="countdownrefresh" class="label label-success" style="right: 5px; display: none;">0</span>
							</a>
							<ul id="cdrefreshlist" class="dropdown-menu hdropdown bounceInDown">
									<div class="title">Atualizar em:</div>
									
									<li>
										<a class="cdrefreshitem" data-refreshtm="60">
											<i id="icheck60" class="fa fa-check" style="display: none"></i>
											1 minuto</a>
									</li>
									<li>
										<a class="cdrefreshitem" data-refreshtm="300">
											<i id="icheck300" class="fa fa-check" style="display: none"></i>
											5 minutos</a>
									</li>
									<li>
										<a class="cdrefreshitem" data-refreshtm="600">
											<i id="icheck600" class="fa fa-check" style="display: none"></i>
											10 Minutos</a>
									</li>
									<li class="summary">
										<a class="cdrefreshitem" data-refreshtm="disable">
											<i id="icheckdisable" class="fa fa-check"></i>
											Desligado
										</a>
									</li>
							</ul>
						</li>

						<li class="dropdown" title="Opções">
							<a class="dropdown-toggle label-menu-corner" href="#" data-toggle="dropdown" aria-expanded="false">
							<i class="pe-7s-user"></i>
							</a>
							<ul class="dropdown-menu hdropdown bounceInDown">
								<div class="title">Nome do Usuário</div>
								<li><a>Perfil</a></li>
								<li><a>Cofigurações</a></li>
								<li class="summary"><a href="/login">Sair</a></li>
							</ul>
						</li>
					</ul>
			</div>
		</div>
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
									<option data-clientid="<?php echo $_smarty_tpl->tpl_vars['client']->value['Id'];?>
"><?php echo $_smarty_tpl->tpl_vars['client']->value['Nome'];?>
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
										<button id="dpbtn" class="ladda-button btn btn-primary" data-style="zoom-in">Confirmar</button>
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
							<div class="panel-body">
								<div id="btnsgroupnews" class="btn-group btn-group-justified center-block">
									<div class="btn-group">
										<button id="btnasearch" class="btn btn-primary" type="button"><i class="fa fa-search-plus"></i> <span class="bold">Pesquisa avançada</span></button>
									</div>
									<div class="btn-group">
										<button id="btnmyclipp" class="btn btn-primary" type="button"><i class="fa fa-thumb-tack"></i> <span class="bold">Meu Cliping</span></button>
									</div>
									<div class="btn-group">
										<button id="btncharts" class="btn btn-primary" type="button"><i class="fa fa-line-chart"></i> <span class="bold">Estatísticas</span></button>
									</div>
									<div class="btn-group">
										<button id="btnnpapper" class="btn btn-primary" type="button"><i class="fa fa-newspaper-o"></i> <span class="bold">Banca</span></button>
									</div>
									<div class="btn-group">
										<button id="btnepdf" class="btn btn-primary" type="button"><i class="fa fa-file-pdf-o"></i> <span class="bold">PDF</span></button>
									</div>
									<div class="btn-group">
										<button id="btneexcel" class="btn btn-primary" type="button"><i class="fa fa-file-excel-o"></i> <span class="bold">Excel</span></button>
									</div>
									<div class="btn-group">
										<button id="btnforward" class="btn btn-primary" type="button"><i class="fa fa-arrow-circle-right"></i> <span class="bold">Encaminhar</span></button>
									</div>
								</div>
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

		<div class="modal fade" id="showsinglenews" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog modal-lg" style="margin-top: 15px">
				<div class="modal-content">
					<div class="modal-header text-center" style="padding: 15px">
						<div id="modaltitlerow" class="row">
							<div class="col-sm-4 col-md-4 col-lg-4 text-left">
								<h5 id="modaltitleve" class="text-primary"></h5>
								<h5 id="modaltitleed" class="text-primary"></h5>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-4 text-center">
								<h5 id="modaltitlevm" class="text-primary"></h5>
								<h5 id="modaltitleva" class="text-primary"></h5>
							</div>
							<div class="col-sm-4 col-md-4 col-lg-4 text-right">
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
							<div id="mediactni" class="col-sm-4 col-md-4 col-lg-4" style="max-height: 400px; overflow-y: auto; overflow-x: hidden; display: none">
							</div>
							<div class="col-sm-8 col-md-8 col-lg-8">
								<h5 id="datemediactni" class="text-muted"></h5>
								<p id="modaltitlevki" class="text-primary"></p>
								<h3 id="mediactnti"></h3>
								<p id="modal-texti" class="text-justify"></p>
							</div>
							<div id="divmediacanvas" style="display: none"></div>
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
									<h5 id="datemediactnv" class="text-muted"></h5>
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
							<div id="btnsgroupsnews" class="btn-group btn-group-justified center-block" style="display: none;">
								<div class="btn-group">
									<a id="btndown" class="btn btn-sm w-xs btn-default">Baixar Fac-Símile</a>
								</div>
								<div class="btn-group">
									<a id="btnexpand" class="btn btn-sm w-xs btn-default">Expandir</a>
								</div>
								<div class="btn-group">
									<a id="btnwapp" class="btn btn-sm w-xs btn-default">Enviar por WhatsApp</a>
								</div>
								<div class="btn-group">
									<a id="btnmail" class="btn btn-sm w-xs btn-default">Enviar por e-mail</a>
								</div>
								<div class="btn-group">
									<a id="btnurl" class="btn btn-sm w-xs btn-default" target="_blank">Abrir página</a>
								</div>
								<div class="btn-group">
									<a id="btnclose" class="btn btn-sm w-xs btn-default" data-dismiss="modal">Fechar</a>
								</div>
								<div class="btn-group">
									<a id="btnselclo" class="btn btn-sm w-xs btn-primary">Fechar e selecionar</a>
								</div>
							</div>
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
									data-size="10" data-style="btn btn-sm btn-default"
									data-live-search="true" data-selected-text-format="count > 5" multiple>
									</select>
								</div>
								<div class="form-group">
									<label>Palavra-chave</label>
									<select id="adskeyword" class="selectpicker form-control disabled"
									data-size="10" data-style="btn btn-sm btn-default"
									data-live-search="true" data-selected-text-format="count > 5"
									title="Selecione o assunto" multiple disabled>
									</select>
								</div>
								<div class="form-group">
									<label>Tipo de Veículo</label>
									<select id="adstveiculo" class="selectpicker form-control"
									data-size="10" data-style="btn btn-sm btn-default"
									data-live-search="true" data-selected-text-format="count > 5" multiple>
									</select>
								</div>
								<div id="adsveiculositesfg" class="form-group" style="display: none;">
									<label>Veículo - Sites</label>
									<input id="adsveiculosites" type="text" class="form-control input-sm" placeholder="Digite para pesquisar" autocomplete="off">
									</select>
								</div>
								<div class="form-group">
									<label>Veículo</label>
									<select id="adsveiculo" class="selectpicker form-control disabled"
									data-size="10" data-style="btn btn-sm btn-default"
									data-live-search="true" data-selected-text-format="count > 5"
									title="Selecione o tipo de veículo" multiple disabled>
									</select>
								</div>
								<div class="form-group">
									<label>Editoria</label>
									<select id="adseditoria" class="selectpicker form-control disabled"
									data-size="10" data-style="btn btn-sm btn-default" data-live-search="true"
									data-selected-text-format="count > 5" title="Selecione o veículo" multiple disabled>
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

								<div class="form-group">
									<label>Estado</label>
									<select id="adsstates" class="selectpicker form-control" data-size="10" data-style="btn btn-sm btn-default" data-live-search="true" multiple>
									</select>
								</div>

								<div class="form-group">
									<label>Texto</label>
									<input type="text" id="adstext" name="adstext" class="form-control input-sm" autocomplete="off">
								</div>

								<div class="row">
									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
											<label>Destaque</label>
											<div>
												<label style="font-weight: normal;">
													<input type="radio" data-type="adsdestaque" name="adsdestaque" data-val="1" class="i-checks">
												</label>
												Sim
											</div>
											<div>
												<label style="font-weight: normal;">
													<input type="radio" data-type="adsdestaque" name="adsdestaque" data-val="2" class="i-checks">
												</label>
												Não
											</div>
										</div>
									</div>

									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
											<label>Motivação</label>
											<div>
												<label style="font-weight: normal;">
													<input type="checkbox" data-type="adsmotivacao" data-val="0" class="i-checks">
												</label>
												Espontânea
											</div>
											<div>
												<label style="font-weight: normal;">
													<input type="checkbox" data-type="adsmotivacao" data-val="1" class="i-checks">
												</label>
												Provocada
											</div>
										</div>
									</div>

									<div class="col-sm-4 col-md-4 col-lg-4">
										<div class="form-group">
											<label>Avaliação</label>
											<div>
												<label style="font-weight: normal;">
													<input type="checkbox" data-type="adsavaliacao" name="adsavaliacao" data-val="1" class="i-checks checkavaliacao">
												</label>
												Negativo
											</div>
											<div>
												<label style="font-weight: normal;">
													<input type="checkbox" data-type="adsavaliacao" name="adsavaliacao" data-val="2" class="i-checks checkavaliacao">
												</label>
												Neutro
											</div>
											<div>
												<label class="" style="font-weight: normal;">
													<input type="checkbox" data-type="adsavaliacao" name="adsavaliacao" data-val="3" class="i-checks checkavaliacao">
												</label>
												Positivo
											</div>
										</div>
									</div>
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
