<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:17:45
         compiled from "D:\PHPProjects\AppDoc\app\lib\application\modulos\AreaFuncionario\template\gerenciar.tpl" */ ?>
<?php /*%%SmartyHeaderCode:147395371416a20f629-26801909%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '317fab8b250e7837d15956409a2e46ae1dedfd07' => 
    array (
      0 => 'D:\\PHPProjects\\AppDoc\\app\\lib\\application\\modulos\\AreaFuncionario\\template\\gerenciar.tpl',
      1 => 1399933064,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '147395371416a20f629-26801909',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5371416a831c93_03142123',
  'variables' => 
  array (
    'Obj' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5371416a831c93_03142123')) {function content_5371416a831c93_03142123($_smarty_tpl) {?><?php if (!is_callable('smarty_modifier_date_format')) include 'D:\\PHPProjects\\AppDoc\\vendor\\smarty\\smarty\\libs\\plugins\\modifier.date_format.php';
?><?php echo $_smarty_tpl->getSubTemplate ("layout/site/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/navegacao.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<?php echo $_smarty_tpl->getSubTemplate ("layout/site/gerenciar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<form method="post">
	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<fieldset>
					<legend>Gerenciar Registro: <?php if ($_smarty_tpl->tpl_vars['Obj']->value->getId()){?>#<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getId();?>
<?php }?></legend>
				</fieldset>
				<input type="hidden" name="identificador" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getIdentificador();?>
" />
			</div><!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="nome" class="col-sm-2 control-label top-20">Nome *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="nome" class="form-control top-10" id="nome" placeholder="Inserir o nome do funcionário" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getNome();?>
" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="cpf" class="col-sm-2 control-label top-20">CPF *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="cpf" class="form-control top-10" id="cpf" placeholder="Inserir o CPF" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getCpf();?>
" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="rg" class="col-sm-2 control-label top-20">RG *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="rg" class="form-control top-10" id="rg" placeholder="Inserir o RG" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getRg();?>
" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="cnh" class="col-sm-2 control-label top-20">CNH *: </label>
				    <div class="col-sm-10">
				      <input type="text" name="cnh" class="form-control top-10 bottom-10" id="cnh" placeholder="Inserir a CNH" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getCnh();?>
" />
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<div class="row">
			<div class="col-sm-12">
				<div class="form-group">
					<label for="data_nascimento" class="col-sm-2 control-label top-10">Data de Nascimento: </label>
				    <div class="col-sm-4">
						<div class='input-group datetimepicker date'>
							<input name="data_nascimento" class="form-control data data_nascimento" id="data_nascimento" placeholder="Inserir a data de nascimento" value="<?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['Obj']->value->getDataNascimento(),"%d/%m/%Y");?>
" />
        	            	<span class="input-group-addon"><span class="glyphicon glyphicon-calendar"></span></span>
					    </div>
				    </div>
				</div> <!-- form-group -->
			</div> <!-- span12 -->
		</div><!-- row -->
		<input type="hidden" name="data_cadastro" value="<?php echo $_smarty_tpl->tpl_vars['Obj']->value->getDataCadastro();?>
" />
		<?php echo $_smarty_tpl->getSubTemplate ("layout/site/status.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

	</div>
	<!-- container-fluid -->
</form>
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>