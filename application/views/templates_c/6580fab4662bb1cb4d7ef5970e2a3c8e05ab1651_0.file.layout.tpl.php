<?php
/* Smarty version 3.1.30, created on 2018-04-04 11:38:05
  from "/app/application/views/templates/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac4e34dbe1327_98363171',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6580fab4662bb1cb4d7ef5970e2a3c8e05ab1651' => 
    array (
      0 => '/app/application/views/templates/layout.tpl',
      1 => 1522851535,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac4e34dbe1327_98363171 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14588770205ac4e34dbd72b1_65798704', 'head');
?>

	</head>
	<body class="light-skin fixed-navbar sidebar-scroll hide-sidebar" style="color: #333333">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11311536955ac4e34dbdabd2_40423784', 'body');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7347933135ac4e34dbdecb2_64706388', 'foot');
?>

	</body>
</html><?php }
/* {block 'head'} */
class Block_14588770205ac4e34dbd72b1_65798704 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_11311536955ac4e34dbdabd2_40423784 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'foot'} */
class Block_7347933135ac4e34dbdecb2_64706388 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'foot'} */
}
