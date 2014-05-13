<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:11:50
         compiled from "layout\site\statusView.tpl" */ ?>
<?php /*%%SmartyHeaderCode:25536536e93d16745b1-02673692%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '41ff9adbe1c2dfd131e855c0d644076dd79b1db0' => 
    array (
      0 => 'layout\\site\\statusView.tpl',
      1 => 1399932682,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '25536536e93d16745b1-02673692',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e93d19d3b07_35347346',
  'variables' => 
  array (
    'Obj' => 0,
    'Link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e93d19d3b07_35347346')) {function content_536e93d19d3b07_35347346($_smarty_tpl) {?><div class="row">
	<div class="col-md-2">
		<label>Status: </label>
	</div>
	<!-- col-md-2 -->
	<div class="col-md-10">
		<?php if ($_smarty_tpl->tpl_vars['Obj']->value->getStatus()){?><i class="glyphicon glyphicon-ok"></i> Ativo<?php }else{ ?><i class="glyphicon glyphicon-remove"></i> Inativo<?php }?>
	</div>
	<!-- col-md-10 -->
</div>
<!-- row -->
<div class="row">
	<div class="col-sm-2">
		<label>Opções: </label>
	</div>
	<!-- col-md-2 -->
	<div class="col-md-10">
		<div class="btn-group">
			<a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['list'];?>
" id="listar" class="btn btn-default"><i class="glyphicon glyphicon-list-alt"></i> Listar </a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['edit'];?>
<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getId();?>
" id="edit" class="btn btn-default"><i class="glyphicon glyphicon-edit"></i> Editar </a>
			<a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['delete'];?>
<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getId();?>
" id="delete" class="btn btn-default"><i class="glyphicon glyphicon-remove"></i> Excluir </a>
		</div>
		<!-- btn-group -->
	</div>
	<!-- col-md-10 -->
</div>	
<!-- row --><?php }} ?>