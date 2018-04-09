<!DOCTYPE html>
<html>
<head>
	<title>Imagens</title>
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" crossorigin="anonymous"></script>
	<script src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/js/bootstrap-datepicker.min.js"></script>
	<script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.8.0/css/bootstrap-datepicker3.css" />

	<style type="text/css">
		.swal2-popup {
			font-size: 1.6rem !important;
		}
	</style>
</head>
<body>

	<div class="container-fluid">
		<div class="row">
			<div class="col-lg-12">
				<div class="form-inline">
					<label for="datepickerrange">Data</label>
					<div class="form-group">
						<div class="input-daterange input-group"id="datepickerrange">
							<input required type="text" class="input-sm form-control" id="startdate" placeholder="Incício" autocomplete="off"/>
							<span class="input-group-addon">Até</span>
							<input required type="text" class="input-sm form-control" id="enddate" placeholder="Fim" autocomplete="off"/>
						</div>
					</div>
					<button id="btnsend" class="btn btn-primary" data-loading-text="Aguarde...">Enviar</button>
				</div>
			</div>
		</div>

		<div class="row">
			<div class=" col-lg-12">
				<h4 id="msglimg" style="display: none;"><i class="fas fa-circle-notch fa-spin"></i> Baixando imagens...</h4>
				<h4 id="msgcval" style="display: none;"><i class="fas fa-circle-notch fa-spin"></i> Cadastrando Valores...</h4>
				<h4 id="msgdone" style="display: none;"><i class="far fa-check-circle"></i> Pronto</h4>
			</div>
		</div>

		<div class="row">
			<div class="col-lg-4">
				<ul id="ullist" class="list-group" style="max-height: 500px; overflow-y: auto"></ul>
			</div>

			<div class="col-lg-4">
				<div id="ullisterror" class="list-group" style="max-height: 500px; overflow-y: auto"></div>
			</div>

			<div class="col-lg-4">
				<div id="ullisterrorbk" class="list-group" style="max-height: 500px; overflow-y: auto"></div>
			</div>
		</div>
	</div>

	<script type="text/javascript" src="/assets/dataclip/imgs_values.js"></script>
</body>
</html>