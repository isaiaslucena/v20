<?php
/* Smarty version 3.1.30, created on 2017-07-11 19:24:04
  from "/app/application/views/templates/layout.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_596525d49f8803_46885216',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6580fab4662bb1cb4d7ef5970e2a3c8e05ab1651' => 
    array (
      0 => '/app/application/views/templates/layout.tpl',
      1 => 1499801024,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_596525d49f8803_46885216 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1084240752596525d49f0a36_02647968', 'head');
?>

	</head>
	<body class="light-skin fixed-navbar sidebar-scroll hide-sidebar">
		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_165889005596525d49f3da0_36870024', 'body');
?>

		<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1150534714596525d49f6dc0_41329784', 'foot');
?>

	</body>
</html><?php }
/* {block 'head'} */
class Block_1084240752596525d49f0a36_02647968 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'head'} */
/* {block 'body'} */
class Block_165889005596525d49f3da0_36870024 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'body'} */
/* {block 'foot'} */
class Block_1150534714596525d49f6dc0_41329784 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block 'foot'} */
}
