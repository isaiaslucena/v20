{extends file='layout.tpl'}
{block name=head}
	<link rel="shortcut icon" href="/assets/imgs/dataclip.ico" type="image/x-icon">

	{* JS *}
	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="/assets/color-thief/color-thief.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
	<script src="https://cdn.datatables.net/v/bs/dt-1.10.16/af-2.2.2/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js"></script>
	<script src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-pt_BR.min.js"></script>

	<!--C3 Charts-->
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/d3/d3.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/c3/c3.min.js"></script>
	<!--Mapael-->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery-mapael/2.1.0/js/jquery.mapael.min.js"></script>
	{* <script src="//cdn.jsdelivr.net/npm/jquery-mapael@2.1.0/js/jquery.mapael.min.js"></script> *}
	<script src="/assets/brasil-id.js"></script>

	<!-- App scripts -->
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/spin.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/ladda.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/ladda.jquery.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/metisMenu/dist/metisMenu.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/iCheck/icheck.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/peity/jquery.peity.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/sparkline/index.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/slimScroll/jquery.slimscroll.min.js"></script>
	<script src="http://webapplayers.com/homer_admin-v2.0/light-shadow/scripts/homer.js"></script>

	{* CSS *}
	<!-- Vendor styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/v/bs/dt-1.10.16/af-2.2.2/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css">
	<link rel="stylesheet" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css">
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/metisMenu/dist/metisMenu.css">
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/animate.css/animate.css">
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/ladda-themeless.min.css">
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/c3/c3.min.css">

	<!-- App styles -->
	<link rel="stylesheet" href="/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="/assets/pe-icon-7-stroke/css/helper.css">
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/styles/style.css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="/assets/dataclip/dataclip.css">

{/block}