<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:18:13
         compiled from "layout\site\status.tpl" */ ?>
<?php /*%%SmartyHeaderCode:18259536e276f3702e7-20657599%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'a4f837fe056a682306af27575c3f6c38f2130e15' => 
    array (
      0 => 'layout\\site\\status.tpl',
      1 => 1399933092,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '18259536e276f3702e7-20657599',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e276f833008_85975205',
  'variables' => 
  array (
    'Obj' => 0,
    'Link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e276f833008_85975205')) {function content_536e276f833008_85975205($_smarty_tpl) {?><div class="row">
<div class="col-sm-12">
	<div class="form-group">
		<label for="status" class="col-sm-2 control-label top-20">Status: </label>
		<div class="col-sm-10 top-10">
			<div class="btn-group" data-toggle="buttons">
				<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getStatus()==1||$_smarty_tpl->tpl_vars['Obj']->value->getStatus()==''){?>active<?php }?>"> 
					<input type="radio" name="status" id="status" value="1" <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getStatus()==1||$_smarty_tpl->tpl_vars['Obj']->value->getStatus()==''){?>checked="checked"<?php }?>><i class="glyphicon glyphicon-ok"></i> Ativo
				</label> 
				<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getStatus()==2){?>active<?php }?>"> 
					<input type="radio" name="status" id="status" value="2" <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getStatus()==2){?>checked="checked"<?php }?>> <i class="glyphicon glyphicon-remove"></i> Inativo
				</label> 
			</div>
			<!-- btn-group -->
		</div>
		<!-- col-sm-10 -->
	</div>
	<!-- form-group -->
	<input type="hidden" name="id" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getId();?>
" />
</div>
<!-- span12 -->
<div class="col-sm-12">
	<div class="form-group">
		<label for="status" class="col-sm-2 control-label top-20">Opções: </label>
		<div class="col-sm-10 top-10">
			<div class="btn-group">
				<button type="submit" name="submit" id="salvar" class="btn btn-primary" value="salvar" ><i class="glyphicon glyphicon-floppy-disk"></i> Salvar </button>
				<button type="reset" name="limpar" id="limpar" class="btn btn-warning"> <i class="glyphicon glyphicon-trash"></i> Limpar </button>
				<a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['list'];?>
" id="listar" class="btn btn-default"><i class="glyphicon glyphicon-list-alt"></i> Listar </a>
			</div>
			<!-- btn-group -->
		</div>
		<!-- col-sm-10 -->
	</div>
	<!-- form-group -->
</div>	
</div>	
<!-- span12 --><?php }} ?>