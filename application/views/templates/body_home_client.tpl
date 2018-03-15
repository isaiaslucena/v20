{extends file="head.tpl"}
{block name=body}
	<!-- Header -->
	<div id="header" class="thumbnail">
		<img id="bannerheader" crossOrigin="anonymous" src="/assets/banner/dataclip_logo.jpg" alt="Logo" class="center-block img-responsive" style="height: 100%;">
	</div>

	<!-- Main Wrapper -->
	<div id="wrapper">
		<div class="container-fluid content" data-effect="zoomIn" data-child="element">
			{* Change client *}
			<div id="changeclient" class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 element">
					<div class="hpanel">
						<div class="panel-body">
							<select id="selclient" class="selectpicker" data-size="10" data-width="fit" data-live-search="true" data-style="btn-default btn-sm" title="Selecione um cliente">
								{foreach from=$clients item=client}
									<option id="{$client.Id}">{$client.Nome|utf8_encode}</option>
								{/foreach}
							</select>
						</div>
					</div>
				</div>
			</div>


			{* C3 Charts *}
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
							<div id="brmap" class="mapcontainer center-block img-responsive">
								<div class="map"></div>
								<div class="areaLegend" style="display: none;"></div>
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

			{* Evolution c3 chart and datepicker*}
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
						<div class="panel-body h-200 center-block">
							{* <div id="datepicker" class="center-block datepicker-inline"></div> *}
							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div id="event_period">
										<div id="dpsdate" type="text" class="actual_range text-center"><h5>DATA INICIAL</h5></div>
										<div id="dpedate" type="text" class="actual_range text-center"><h5>DATA FINAL</h5></div>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-sm-12 col-md-12 col-lg-12">
									<div class="center-block text-center">
										<button id="dpbtn" class="ladda-button ladda-button-demo btn btn-success" data-style="zoom-in">Confirmar</button>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			{* Butons *}
			<div class="row">
					<div class="col-sm-6 col-md-6 col-lg-6 element">
						<div class="hpanel">
							<div id="div1btns" class="panel-body text-center">
								<button id="btnasearch" class="btn w-xs btn-primary" type="button"><i class="fa fa-search-plus"></i> <span class="bold">Pesquisa avançada</span></button>
								<button id="btnmyclipp" class="btn w-xs btn-primary" type="button"><i class="fa fa-thumb-tack"></i> <span class="bold">Meu Cliping</span></button>
								<button id="btncharts" class="btn w-xs btn-primary" type="button"><i class="fa fa-line-chart"></i> <span class="bold">Estatísticas</span></button>
							</div>
						</div>
					</div>

					<div class="col-sm-6 col-md-6 col-lg-6 element">
						<div class="hpanel">
							<div id="div2btns" class="panel-body text-center">
								<button id="btnnpapper" class="btn w-xs btn-primary" type="button"><i class="fa fa-newspaper-o"></i> <span class="bold">Banca</span></button>
								<button id="btnepdf" class="btn w-xs btn-primary" type="button"><i class="fa fa-file-pdf-o"></i> <span class="bold">PDF</span></button>
								<button id="btneexcel" class="btn w-xs btn-primary" type="button"><i class="fa fa-file-excel-o"></i> <span class="bold">Excel</span></button>
								<button id="btnforward" class="btn w-xs btn-primary" type="button"><i class="fa fa-arrow-circle-right"></i> <span class="bold">Encaminhar</span></button>
							</div>
						</div>
					</div>
			</div>

			{* Subjects and Keywords *}
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 element">
					<div class="hpanel">
						<div id="sublist" class="panel-body center-block text-center"></div>
					</div>
				</div>
			</div>

			{* News Table *}
			<div class="row">
				<div class="col-sm-12 col-md-12 col-lg-12 element">
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

							<div id="divsinglenews" style="display: none;">
								
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
							<div class="col-lg-6 text-left">
								<h5 id="modaltitleve" class="text-primary"></h5>
								<h5 id="modaltitleed" class="text-primary"></h5>
							</div>
							<div class="col-lg-3 text-left">
								<h5 id="modaltitlevm" class="text-primary"></h5>
								<h5 id="modaltitleva" class="text-primary"></h5>
							</div>
							<div class="col-lg-3 text-left">
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
							<div id="mediactni" class="col-sm-4 col-md-4 col-lg-4" style="max-height: 420px; overflow-y: hidden; display: none">
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
					<div class="modal-footer">
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
							<div class="col-sm-5 col-md-5 col-lg-5">
								<div class="form-group">
									<label>Tipo de Veículo</label>
									<select class="selectpicker form-control" data-style="btn btn-sm btn-default" multiple data-actions-box="true" data-live-search="true">
										<option value="opcao1">opcao1</option>
										<option value="opcao2">opcao2</option>
										<option value="opcao3">opcao3</option>
										<option value="opcao4">opcao4</option>
									</select>
								</div>
								<div class="form-group">
									<label>Veículo</label>
									<select class="selectpicker form-control" data-style="btn btn-sm btn-default" multiple data-actions-box="true" data-live-search="true">
										<option value="opcao1">opcao1</option>
										<option value="opcao2">opcao2</option>
										<option value="opcao3">opcao3</option>
										<option value="opcao4">opcao4</option>
									</select>
								</div>
								<div class="form-group">
									<label>Editoria</label>
									<select class="selectpicker form-control" data-style="btn btn-sm btn-default" multiple data-actions-box="true" data-live-search="true">
										<option value="opcao1">opcao1</option>
										<option value="opcao2">opcao2</option>
										<option value="opcao3">opcao3</option>
										<option value="opcao4">opcao4</option>
									</select>
								</div>
								<div class="form-group">
									<label>Assunto</label>
									<select class="selectpicker form-control" data-style="btn btn-sm btn-default" multiple data-actions-box="true" data-live-search="true">
										<option value="opcao1">opcao1</option>
										<option value="opcao2">opcao2</option>
										<option value="opcao3">opcao3</option>
										<option value="opcao4">opcao4</option>
									</select>
								</div>
								<div class="form-group">
									<label>Palavra-chave</label>
									<select class="selectpicker form-control" data-style="btn btn-sm btn-default" multiple data-actions-box="true" data-live-search="true">
										<option value="opcao1">opcao1</option>
										<option value="opcao2">opcao2</option>
										<option value="opcao3">opcao3</option>
										<option value="opcao4">opcao4</option>
									</select>
								</div>
							</div>

							<div class="col-sm-7 col-md-7 col-lg-7">
								<div class="form-group">
									<label>Data</label>
									<div class="input-daterange input-group" id="datepicker">
										<input required type="text" class="input-sm form-control" id="startdate" name="startdate" placeholder="Início" autocomplete="off"/>
										<span class="input-group-addon">Até</span>
										<input required type="text" class="input-sm form-control" id="enddate" name="enddate" placeholder="Fim" autocomplete="off"/>
									</div>
								</div>
								<div class="form-group">
									<label>Hora</label>
									<div class="input-daterange input-group">
										<input required type="text" class="input-sm form-control clockpicker" id="starttime" name="starttime" placeholder="Início" value="00:00" autocomplete="off"/>
										<span class="input-group-addon">Até</span>
										<input required type="text" class="input-sm form-control clockpicker" id="endtime" name="endtime" placeholder="Fim" value="23:59" autocomplete="off"/>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
{/block}