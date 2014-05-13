<?php /* Smarty version Smarty-3.1.13, created on 2014-05-10 18:44:02
         compiled from "D:\PHPProjects\AppDoc\app\lib\application\modulos\Area\template\visualizar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:16707536e93d114bf86-24672232%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '52240142c5a5277ae80c7ea00121137f3d48e26c' => 
    array (
      0 => 'D:\\PHPProjects\\AppDoc\\app\\lib\\application\\modulos\\Area\\template\\visualizar.tpl',
      1 => 1399758236,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '16707536e93d114bf86-24672232',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e93d160eca3_27661648',
  'variables' => 
  array (
    'Obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e93d160eca3_27661648')) {function content_536e93d160eca3_27661648($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/site/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/navegacao.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container-fluid">
	<div class="row">
		<div class="col-xs-12 col-md-12">
			<fieldset>
				<legend>Visualização do Registro: <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getId()){?>#<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getId();?>
<?php }?></legend>
			</fieldset>
			<input type="hidden" name="identificador" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getIdentificador();?>
" />
		</div>
		<!-- col-md-12 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-xs-12 col-md-2">
			<label>Área Principal: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-xs-12 col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->AreaPrincipal;?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-xs-12 col-md-2">
			<label>Título: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-xs-12 col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getTitulo();?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-xs-12 col-md-2">
			<label>Descrição: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-xs-12 col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getDescricao();?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<?php echo $_smarty_tpl->getSubTemplate ("layout/site/statusView.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div>
<!-- container -->
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>