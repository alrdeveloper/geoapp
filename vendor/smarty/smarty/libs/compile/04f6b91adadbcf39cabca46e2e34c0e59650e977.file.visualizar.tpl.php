<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:15:17
         compiled from "D:\PHPProjects\AppDoc\app\lib\application\modulos\AreaFuncionario\template\visualizar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:2068653714221024fe0-04865326%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '04f6b91adadbcf39cabca46e2e34c0e59650e977' => 
    array (
      0 => 'D:\\PHPProjects\\AppDoc\\app\\lib\\application\\modulos\\AreaFuncionario\\template\\visualizar.tpl',
      1 => 1399932869,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '2068653714221024fe0-04865326',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5371422142c4d0_14274805',
  'variables' => 
  array (
    'Obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5371422142c4d0_14274805')) {function content_5371422142c4d0_14274805($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\PHPProjects\\AppDoc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("layout/site/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/navegacao.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
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
		<div class="col-md-2">
			<label>Nome: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getNome();?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>CPF: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getCpf();?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>RG: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getRg();?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>CNH: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getCnh();?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>Data de Nascimento: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Obj']->value->getDataNascimento(),"%d/%m/%Y");?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<div class="row">
		<div class="col-md-2">
			<label>Data de Nascimento: </label>
		</div>
		<!-- col-md-2 -->
		<div class="col-md-10">
			<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Obj']->value->getDataCadastro(),"%d/%m/%Y");?>

		</div>
		<!-- col-md-10 -->
	</div>
	<!-- row -->
	<?php echo $_smarty_tpl->getSubTemplate ("layout/site/statusView.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

</div><!-- container -->
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php }} ?>