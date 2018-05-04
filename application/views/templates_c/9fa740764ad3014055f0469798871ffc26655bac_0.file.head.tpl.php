<?php
/* Smarty version 3.1.30, created on 2018-05-04 09:25:22
  from "/app/application/views/templates/head.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aec5132d0f9c0_92441885',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9fa740764ad3014055f0469798871ffc26655bac' => 
    array (
      0 => '/app/application/views/templates/head.tpl',
      1 => 1525436716,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:layout.tpl' => 1,
  ),
),false)) {
function content_5aec5132d0f9c0_92441885 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4792583075aec5132d0aee4_49540198', 'head');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:layout.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'head'} */
class Block_4792583075aec5132d0aee4_49540198 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

	<link rel="shortcut icon" href="/assets/imgs/dataclip.ico" type="image/x-icon">

	<!-- JS -->
	<?php echo '<script'; ?>
 src="https://code.jquery.com/jquery-3.3.1.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/color-thief/2.0.1/color-thief.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.18.0/sweetalert2.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.jsdelivr.net/npm/promise-polyfill@7.1.0/dist/promise.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/pdfmake.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.32/vfs_fonts.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/js/bootstrap-datepicker.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/locales/bootstrap-datepicker.pt-BR.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/i18n/defaults-pt_BR.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="https://bootstrap-tagsinput.github.io/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://jcrop-cdn.tapmodo.com/v0.9.12/js/jquery.Jcrop.min.js"><?php echo '</script'; ?>
>

	<!--C3 Charts-->
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/d3/d3.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/c3/c3.min.js"><?php echo '</script'; ?>
>
	<!--Mapael-->
	<?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.2.7/raphael.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="//cdnjs.cloudflare.com/ajax/libs/jquery-mapael/2.1.0/js/jquery.mapael.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="/assets/brasil-id.js"><?php echo '</script'; ?>
>

	<!-- App scripts -->
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/spin.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/ladda.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/ladda.jquery.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/metisMenu/dist/metisMenu.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/iCheck/icheck.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/peity/jquery.peity.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/sparkline/index.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/slimScroll/jquery.slimscroll.min.js"><?php echo '</script'; ?>
>
	<?php echo '<script'; ?>
 src="http://webapplayers.com/homer_admin-v2.0/light-shadow/scripts/homer.js"><?php echo '</script'; ?>
>

	<!-- CSS -->
	<!-- Vendor styles -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"/>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput-typeahead.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css"/>
	<link rel="stylesheet" href="https://cdn.datatables.net/v/bs/jszip-2.5.0/dt-1.10.16/af-2.2.2/b-1.5.1/b-colvis-1.5.1/b-html5-1.5.1/b-print-1.5.1/cr-1.4.1/fc-3.2.4/fh-3.1.3/kt-2.3.2/r-2.2.1/rg-1.0.2/rr-1.2.3/sc-1.4.4/sl-1.2.5/datatables.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.7.1/css/bootstrap-datepicker.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/css/bootstrap-select.min.css"/>
	<link rel="stylesheet" href="http://weareoutman.github.io/clockpicker/dist/jquery-clockpicker.min.css"/>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.18.0/sweetalert2.min.css"/>
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/metisMenu/dist/metisMenu.css"/>
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/animate.css/animate.css"/>
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/ladda/dist/ladda-themeless.min.css"/>
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/vendor/c3/c3.min.css"/>
	<link rel="stylesheet" href="http://jcrop-cdn.tapmodo.com/v0.9.12/css/jquery.Jcrop.min.css"/>

	<!-- App styles -->
	<link rel="stylesheet" href="/assets/pe-icon-7-stroke/css/pe-icon-7-stroke.css">
	<link rel="stylesheet" href="/assets/pe-icon-7-stroke/css/helper.css">
	<link rel="stylesheet" href="http://webapplayers.com/homer_admin-v2.0/light-shadow/styles/style.css">

	<!-- Custom styles -->
	<link rel="stylesheet" href="/assets/dataclip/dataclip.css">

<?php
}
}
/* {/block 'head'} */
}
