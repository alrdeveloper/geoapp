<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 18:50:17
         compiled from "layout\site\pagination.tpl" */ ?>
<?php /*%%SmartyHeaderCode:27431536e1f6abee6d2-80007042%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '37a22031077fe275ce99d940fb02340b63a9b4d5' => 
    array (
      0 => 'layout\\site\\pagination.tpl',
      1 => 1399929959,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '27431536e1f6abee6d2-80007042',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e1f6ac86c78_90260098',
  'variables' => 
  array (
    'PG_REG_AFETADOS' => 0,
    'PG_LABEL' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e1f6ac86c78_90260098')) {function content_536e1f6ac86c78_90260098($_smarty_tpl) {?><lable>
	Registros: <strong>#<?php echo $_smarty_tpl->tpl_vars['PG_REG_AFETADOS']->value;?>
</strong> <br />
</label>
<?php echo $_smarty_tpl->tpl_vars['PG_LABEL']->value;?>




<?php }} ?>