<?php /* Smarty version Smarty-3.1.13, created on 2014-05-12 19:09:56
         compiled from "layout\site\navegacao.tpl" */ ?>
<?php /*%%SmartyHeaderCode:8257536e1f68d55603-51521116%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '4665a33a0aacfe84e12c838bd7393727159cac90' => 
    array (
      0 => 'layout\\site\\navegacao.tpl',
      1 => 1399932595,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '8257536e1f68d55603-51521116',
  'function' => 
  array (
  ),
  'version' => 'Smarty-3.1.13',
  'unifunc' => 'content_536e1f69185fd5_26171856',
  'variables' => 
  array (
    'Nav' => 0,
    'Link' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_536e1f69185fd5_26171856')) {function content_536e1f69185fd5_26171856($_smarty_tpl) {?><div class="container-fluid">
	<div class='row'>
        <div class='col-sm-12'>
            <ul class="breadcrumb">
                <?php  $_smarty_tpl->tpl_vars['Link'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['Link']->_loop = false;
 $_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
 $_from = $_smarty_tpl->tpl_vars['Nav']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['Link']->key => $_smarty_tpl->tpl_vars['Link']->value){
$_smarty_tpl->tpl_vars['Link']->_loop = true;
 $_smarty_tpl->tpl_vars['key']->value = $_smarty_tpl->tpl_vars['Link']->key;
?>
                    <li>
                        <?php if ($_smarty_tpl->tpl_vars['Link']->value[1]!=''){?> 
                            <a href="<?php echo $_smarty_tpl->tpl_vars['Link']->value[1];?>
" title="<?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
"><?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
</a>
                        <?php }else{ ?> 
                            <span><?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
</span> 
                        <?php }?>
                    </li> 
                <?php } ?>
                <li>
                    <a href="javascript:history.go(-1)" title="<?php echo $_smarty_tpl->tpl_vars['Link']->value[0];?>
" title="Voltar"><i class='icon-circle-arrow-left'></i> voltar</a>
                </li>
            </ul>
        </div>
    </div>
</div><?php }} ?>