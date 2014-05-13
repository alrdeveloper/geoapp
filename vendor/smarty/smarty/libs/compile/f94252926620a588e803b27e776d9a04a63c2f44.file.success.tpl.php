<?php /* Smarty version Smarty-3.1.13, created on 2014-05-10 10:56:47
         compiled from "layout\site\success.tpl" */ ?>
<?php /*%%SmartyHeaderCode:5952536e301fbf4cb9-48000452%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'f94252926620a588e803b27e776d9a04a63c2f44' => 
    array (
      0 => 'layout\\site\\success.tpl',
      1 => 1399728185,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '5952536e301fbf4cb9-48000452',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'Link' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e301fd0e0f1_66621682',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e301fd0e0f1_66621682')) {function content_536e301fd0e0f1_66621682($_smarty_tpl) {?><div class="row-fluid">
	<div class="col-sm-12">
		<div class="alert alert-success">
			<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			<i class='glyphicon glyphicon-ok'></i> Dados cadastrados com sucesso!
		</div>
	</div>
</div>
<div class="modal fade">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Atenção</h4>
			</div>
			<div class="modal-body">
				<i class='glyphicon glyphicon-ok'></i> Dados cadastrados com sucesso!
			</div>
			<div class="modal-footer">
				<a href='<?php echo $_smarty_tpl->tpl_vars['Link']->value['list'];?>
' class="btn btn-default" ><i class='glyphicon glyphicon-list-alt'></i> Listar</a>
				<a href='<?php echo $_smarty_tpl->tpl_vars['Link']->value['add'];?>
' class="btn btn-primary" ><i class='glyphicon glyphicon-plus'></i> Novo</a>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<?php }} ?>