<?php
/* Smarty version 3.1.30, created on 2017-01-25 10:23:00
  from "C:\xampp\htdocs\DISII\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58886e74238f87_59362932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1c3ddfbb187c9d2ec81af3fc285a1e8fc568d02b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DISII\\templates\\index.tpl',
      1 => 1485215174,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:top_bar.tpl' => 1,
    'file:left_bar.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58886e74238f87_59362932 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "global.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'Manager'), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:top_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('title'=>'Manager'), 0, false);
?>

<?php $_smarty_tpl->_subTemplateRender("file:left_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <section class="content">
        <div class="container-fluid">
        	<div class="block-header">
        		<?php echo $_smarty_tpl->tpl_vars['arianna']->value;?>

            </div>
            
            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['page']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

        </div>
    </section>

<?php $_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
