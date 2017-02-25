<?php
/* Smarty version 3.1.30, created on 2017-02-25 16:32:36
  from "C:\wamp\www\DISII\templates\index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b1a394c7af55_44807743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '743c7b096df24518e899493baaa0da5a3ccd37ad' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\index.tpl',
      1 => 1488036261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:header.tpl' => 1,
    'file:top_bar.tpl' => 1,
    'file:left_bar.tpl' => 1,
    'file:page/login.tpl' => 1,
    'file:footer.tpl' => 1,
  ),
),false)) {
function content_58b1a394c7af55_44807743 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "global.conf", "setup", 0);
?>

<?php $_smarty_tpl->_subTemplateRender("file:header.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php if ($_smarty_tpl->tpl_vars['loggedin']->value == true) {?>
	<?php $_smarty_tpl->_subTemplateRender("file:top_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<?php $_smarty_tpl->_subTemplateRender("file:left_bar.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

	<BODY class="theme-indigo">
	    <!-- Page Loader -->
	    <div class="page-loader-wrapper">
	        <div class="loader">
	            <div class="md-preloader pl-size-md">
	                <svg viewbox="0 0 75 75">
	                    <circle cx="37.5" cy="37.5" r="33.5" class="pl-red" stroke-width="4" />
	                </svg>
	            </div>
	            <p>Please wait...</p>
	        </div>
	    </div>
	    <!-- #END# Page Loader -->
	    <!-- Overlay For Sidebars -->
	    <div class="overlay"></div>
	    <!-- #END# Overlay For Sidebars -->
	    <section class="content">
	        <div class="container-fluid">
	        	<div class="block-header">
	        		<?php if (isset($_smarty_tpl->tpl_vars['arianna']->value)) {
echo $_smarty_tpl->tpl_vars['arianna']->value;
}?>
	            </div>
	            
	            <?php $_smarty_tpl->_subTemplateRender(((string)$_smarty_tpl->tpl_vars['page']->value).".tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

	        </div>
	    </section>
<?php } else { ?>
	<?php $_smarty_tpl->_subTemplateRender("file:page/login.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
$_smarty_tpl->_subTemplateRender("file:footer.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<?php }
}
