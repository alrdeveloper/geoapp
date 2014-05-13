<?php /* Smarty version Smarty-3.1.13, created on 2014-05-10 17:48:01
         compiled from "D:\PHPProjects\AppDoc\app\lib\application\modulos\Area\template\gerenciar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14570536e240f2321f3-17732896%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '68e70eb56063b893539d955c0b0c4aa97b7affd4' => 
    array (
      0 => 'D:\\PHPProjects\\AppDoc\\app\\lib\\application\\modulos\\Area\\template\\gerenciar.tpl',
      1 => 1399754700,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14570536e240f2321f3-17732896',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e240f9a8638_60891069',
  'variables' => 
  array (
    'Obj' => 0,
    'Select' => 0,
    'Item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e240f9a8638_60891069')) {function content_536e240f9a8638_60891069($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/site/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/navegacao.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/site/gerenciar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form method="post">
	<div class="container-fluid">
		<div class="row-fluid">
			<div class="col-sm-12">
				<fieldset>
					<legend>Gerenciar Registro: <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getId()){?>#<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getId();?>
<?php }?></legend>
				</fieldset>
				<input type="hidden" name="identificador" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getIdentificador();?>
" />
			</div><!-- span12 -->
		</div><!-- row-fluid -->
		<div class="row-fluid">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="id_area_pai" class="col-sm-2 control-label top-10">Área Principal *: </label>
				    <div class="col-sm-10">
						<select name="id_area_pai" class="form-control" id="id_area_pai">
							<option value="0" <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getIdAreaPai()==0){?>selected="selected"<?php }?>>Área Principal</option>
							<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Select']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
							<option value="<?php echo $_smarty_tpl->tpl_vars['Item']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getIdAreaPai()==$_smarty_tpl->tpl_vars['Item']->value['id']){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['Item']->value['titulo'];?>
</option>
							<?php } ?>
						</select>
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row-fluid -->
		<div class="row-fluid">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="titulo" class="col-sm-2 control-label top-20">Título *: </label>
				    <div class="col-sm-10">
				      <input type="titulo" name="titulo" class="form-control top-10" id="titulo" placeholder="Inserir o nome da área" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getTitulo();?>
" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row-fluid -->
		<div class="row-fluid">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="preferencia" class="col-sm-2 control-label top-20">Descrição: </label> 
					<div class="col-sm-10 top-10">
						<textarea name="descricao" class="form-control col-sm-10" rows="5" maxlength="500"></textarea>
					</div> <!-- col-sm-10 -->
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row-fluid -->
		<?php echo $_smarty_tpl->getSubTemplate ("layout/site/status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<!-- container-fluid -->
</form>
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>