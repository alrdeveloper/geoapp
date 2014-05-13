<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:22:56
         compiled from "D:\PHPProjects\AppDoc\app\lib\application\modulos\AreaFuncionario\template\principal.tpl" */ ?>
<?php /*%%SmartyHeaderCode:176555371415cced925-99700697%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'b372df843cc619142b012d0577b6b0771c4beb01' => 
    array (
      0 => 'D:\\PHPProjects\\AppDoc\\app\\lib\\application\\modulos\\AreaFuncionario\\template\\principal.tpl',
      1 => 1399933374,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '176555371415cced925-99700697',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_5371415d608121_79565657',
  'variables' => 
  array (
    'Link' => 0,
    'Obj' => 0,
    'Item' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5371415d608121_79565657')) {function content_5371415d608121_79565657($_smarty_tpl) {?><?php echo $_smarty_tpl->getSubTemplate ("layout/site/topo.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
 
<?php echo $_smarty_tpl->getSubTemplate ("layout/site/navegacao.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>

<div class="container-fluid">
<div class="row">
    <div class="col-sm-3">
        <?php echo $_smarty_tpl->getSubTemplate ("layout/site/search.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
		
    </div>
    <!-- /.col-sm-3 -->
    <div class="col-sm-9">
        <fieldset>
            <legend>
                Listagem de Registros  
            </legend>
			<div class="btn-group">
				<a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['add'];?>
" class="btn btn-success" target="_blank">
        		   	<i class='glyphicon glyphicon-plus'></i> Adicionar Registro
    	        </a>
				<a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['list'];?>
" class="btn btn-default" target="_blank">
            		<i class="glyphicon glyphicon-search"></i> Listar Registros
            	</a>
			</div> <!-- btn-group -->	
            <div class="table-responsive top-20">
                <table class="table table-hover">
                    <tbody>
                        <tr>
                            <th>Id</th>
                            <th>Nome</th>
                            <th>Status</th>
                            <th>Opções</th>
                        </tr>
						<tr>
						<?php if ($_smarty_tpl->tpl_vars['Obj']->value==''){?>
						<tr>
							<td colspan="4">
								<div class="top-10">
									<label class="label label-warning"><i class="glyphicon glyphicon-exclamation-sign"></i> Nenhum registro foi localizado</label>
								</div>
							</td>
						</tr>                        
						<?php }else{ ?>
						<?php  $_smarty_tpl->tpl_vars['Item'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Item']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['Obj']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Item']->key => $_smarty_tpl->tpl_vars['Item']->value){
$_smarty_tpl->tpl_vars['Item']->_loop = true;
?>
						<tr>
                            <td><?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['Item']->value->getNome();?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['Item']->value->Status;?>
</td>
                            <td>
                                <div class="btn-group">
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['view'];?>
<?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Visualizar - <?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
"><i class="glyphicon glyphicon-search"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['edit'];?>
<?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Alterar - <?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
"><i class="glyphicon glyphicon-edit"></i></a>
                                    <a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value['delete'];?>
<?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
" class="btn btn-default" data-toggle="tooltip" data-placement="top" title="Excluir - <?php echo $_smarty_tpl->tpl_vars['Item']->value->getId();?>
"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </td>
						</tr>
                        <?php } ?>
						<?php }?>
                    </tbody>
                </table>
            </div> <!-- table -->
            <?php echo $_smarty_tpl->getSubTemplate ("layout/site/pagination.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<!-- pagination-->
        </fieldset>
    </div><!-- /.col-sm-9 -->
</div><!-- /.row -->
</div><!-- /.row -->

    <script>
        $(document).ready(function() {
            $("[data-toggle='tooltip']").tooltip();
        });
    </script>

<?php echo $_smarty_tpl->getSubTemplate ("layout/site/rodape.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, null, null, array(), 0);?>
<?php }} ?>