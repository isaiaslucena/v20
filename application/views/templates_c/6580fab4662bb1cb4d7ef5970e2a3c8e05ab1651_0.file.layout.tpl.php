<?php
/* Smarty version 3.1.30, created on 2018-03-16 12:10:02
  from "/app/application/views/templates/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5aabde4adcfb67_19808159',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6580fab4662bb1cb4d7ef5970e2a3c8e05ab1651' => 
    array (
      0 => '/app/application/views/templates/layout.tpl',
      1 => 1521212933,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5aabde4adcfb67_19808159 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<meta name="theme-color" content="">
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20782849525aabde4adca0d6_50730499', 'head');
?>

	</head>
	<body class="light-skin fixed-navbar sidebar-scroll hide-sidebar">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7349313665aabde4adcc4e2_85718043', 'body');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7001445675aabde4adce883_28186066', 'foot');
?>

	</body>
</html><?php }
/* {block 'head'} */
class Block_20782849525aabde4adca0d6_50730499 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_7349313665aabde4adcc4e2_85718043 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'foot'} */
class Block_7001445675aabde4adce883_28186066 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'foot'} */
}
