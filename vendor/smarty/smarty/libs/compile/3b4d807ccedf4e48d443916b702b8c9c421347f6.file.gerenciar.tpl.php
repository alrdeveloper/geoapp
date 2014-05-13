<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:15:27
         compiled from "layout\site\gerenciar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14299536e240f9f6840-04029440%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3b4d807ccedf4e48d443916b702b8c9c421347f6' => 
    array (
      0 => 'layout\\site\\gerenciar.tpl',
      1 => 1399932701,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14299536e240f9f6840-04029440',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e240fbb3db5_53298875',
  'variables' => 
  array (
    'Error' => 0,
    'Success' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e240fbb3db5_53298875')) {function content_536e240fbb3db5_53298875($_smarty_tpl) {?><div class="container-fluid">
	<div class="row">
		<div class="col-sm-12">
			<div class="alert alert-warning alert-dismissable">
			  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
			  <strong>Informação:</strong> O(s) Campo(s) marcados com <strong>*</strong> são obrigatórios.
			</div>
		</div>
	</div>
	<?php if ($_smarty_tpl->tpl_vars['Error']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate ("layout/site/error.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	<?php if ($_smarty_tpl->tpl_vars['Success']->value){?>
		<?php echo $_smarty_tpl->getSubTemplate ("layout/site/success.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	<?php }?>
	
	<script type="text/javascript">
		$(document).ready(function(){
			$('.modal').modal({
				show: true,
				keyboard: false,
				backdrop: 'static'
			});
		});
	</script>
	
</div><?php }} ?>