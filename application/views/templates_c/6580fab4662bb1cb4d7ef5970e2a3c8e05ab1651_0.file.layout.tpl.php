<?php
/* Smarty version 3.1.30, created on 2018-04-02 15:05:36
  from "/app/application/views/templates/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5ac270f093a897_87563521',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6580fab4662bb1cb4d7ef5970e2a3c8e05ab1651' => 
    array (
      0 => '/app/application/views/templates/layout.tpl',
      1 => 1522692325,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5ac270f093a897_87563521 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5715542585ac270f0933210_20424348', 'head');
?>

	</head>
	<body class="light-skin fixed-navbar sidebar-scroll hide-sidebar" style="color: black" crossorigin="anonymous">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2082197645ac270f0936287_51193951', 'body');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20435018545ac270f0938e83_90694665', 'foot');
?>

	</body>
</html><?php }
/* {block 'head'} */
class Block_5715542585ac270f0933210_20424348 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_2082197645ac270f0936287_51193951 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'foot'} */
class Block_20435018545ac270f0938e83_90694665 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'foot'} */
}
