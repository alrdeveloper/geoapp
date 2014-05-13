<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:22:56
         compiled from "layout\site\search.tpl" */ ?>
<?php /*%%SmartyHeaderCode:14822536e1f69199858-05196909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '7f72c066a379a52906585e2dccc426004e05fa85' => 
    array (
      0 => 'layout\\site\\search.tpl',
      1 => 1399933332,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '14822536e1f69199858-05196909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e1f6abd6fc5_83718185',
  'variables' => 
  array (
    'Qtde' => 0,
    'Param' => 0,
    'ListParam' => 0,
    'Item' => 0,
    'Attribute' => 0,
    'ListComparer' => 0,
    'Comparer' => 0,
    'AttributeOrder' => 0,
    'Order' => 0,
    'Status' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e1f6abd6fc5_83718185')) {function content_536e1f6abd6fc5_83718185($_smarty_tpl) {?><fieldset>
	<legend>Pesquisar: </legend>
	<form name="pesquisar" method="post" role="form">
		<div class="form-group">
			<div class="radiobox">
				<label for="qunatidade">Quantidade: </label> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Qtde']->value==10||$_smarty_tpl->tpl_vars['Qtde']->value==''){?>active<?php }?>">
						<input type="radio" name="quantidade" id="quantidade" value="10" <?php if ($_smarty_tpl->tpl_vars['Qtde']->value==10){?>checked="checked" <?php }?> /> 10
					</label> 
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Qtde']->value==20){?>active<?php }?>">
						<input type="radio" name="quantidade" id="quantidade" value="20" <?php if ($_smarty_tpl->tpl_vars['Qtde']->value==20){?>checked="checked" <?php }?> /> 20
					</label> 
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Qtde']->value==40){?>active<?php }?>">
						<input type="radio" name="quantidade" id="quantidade" value="40" <?php if ($_smarty_tpl->tpl_vars['Qtde']->value==40){?>checked="checked" <?php }?> /> 40
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<label for="param">Parametro: </label> 
			<input type="text" name="param" id="param" class="form-control" placeholder="Informe o Parametro" value="<?php echo $_smarty_tpl->tpl_vars['Param']->value;?>
">
		</div>
		<div class="form-group">
			<label for="attribute">Campo Consultado: </label> 
				<select name="attribute" id="attribute" class="form-control" placeholder="Informe o Campo Consultado">
				<option value="">[Selecione a Coluna]</option> 
				<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ListParam']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['Item']->value['attribute'];?>
" <?php if ($_smarty_tpl->tpl_vars['Item']->value['attribute']==$_smarty_tpl->tpl_vars['Attribute']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['Item']->value['value'];?>
</option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="attribute">Forma de Comparação: </label> 
			<select name="comparer" id="comparer" class="form-control" placeholder="Informe a Forma de Comparação">
				<option value="">[Selecione a Forma de Comparação]</option> 
				<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ListComparer']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
" <?php if ($_smarty_tpl->tpl_vars['Item']->value==$_smarty_tpl->tpl_vars['Comparer']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['Item']->value;?>
</option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<label for="attribute_order">Ordenar por Campo: </label> 
			<select name="attribute_order" id="attribute_order" class="form-control" placeholder="Informe o Campo para Ordem">
				<option value="">[Selecione a Campo para Ordem]</option> 
				<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['ListParam']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
				<option value="<?php echo $_smarty_tpl->tpl_vars['Item']->value['attribute'];?>
" <?php if ($_smarty_tpl->tpl_vars['Item']->value['attribute']==$_smarty_tpl->tpl_vars['AttributeOrder']->value){?>selected="selected"<?php }?>><?php echo $_smarty_tpl->tpl_vars['Item']->value['value'];?>
</option>
				<?php } ?>
			</select>
		</div>
		<div class="form-group">
			<div class="radiobox">
				<label for="qunatidade">Órdem dos Registros: </label> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Order']->value==1||$_smarty_tpl->tpl_vars['Order']->value==''){?>active<?php }?>">
						<input type="radio" name="order" id="order" value="1" <?php if ($_smarty_tpl->tpl_vars['Order']->value==1){?>checked="checked" <?php }?> /> 
						<i class="glyphicon glyphicon-arrow-up"></i> Crescente
					</label> 
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Order']->value==2){?>active<?php }?>"> 
						<input type="radio" name="order" id="order" value="2" <?php if ($_smarty_tpl->tpl_vars['Order']->value==2){?>checked="checked" <?php }?> /> 
						<i class="glyphicon glyphicon-arrow-down"></i> Decrescente
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="radiobox">
				<label for="qunatidade">Situação do registro: </label> <br />
				<div class="btn-group" data-toggle="buttons">
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Status']->value==1){?>active<?php }?>">
						<input type="radio" name="status" id="status" value="1" <?php if ($_smarty_tpl->tpl_vars['Status']->value==1){?>checked="checked" <?php }?> /> 
						<i class="glyphicon glyphicon-ok"></i> Ativo
					</label> 
					<label class="btn btn-default <?php if ($_smarty_tpl->tpl_vars['Status']->value==2){?>active<?php }?>"> 
						<input type="radio" name="status" id="status" value="2" <?php if ($_smarty_tpl->tpl_vars['Status']->value==2){?>checked="checked" <?php }?> /> 
						<i class="glyphicon glyphicon-remove"></i> Inativo
					</label>
				</div>
			</div>
		</div>
		<div class="form-group">
			<button type="submit" name="submit" class="btn btn-primary col-lg-12" value="1">
				<i class="glyphicon glyphicon-search"></i> Pesquisar
			</button>
		</div>
	</form>
</fieldset><?php }} ?>