<?php
/* Smarty version 3.1.30, created on 2017-02-25 16:32:36
  from "C:\wamp\www\DISII\templates\top_bar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b1a394e4c588_78584977',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c1332ecdb10610c43304d2e9100af1e6272bdeb8' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\top_bar.tpl',
      1 => 1487701540,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b1a394e4c588_78584977 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\modifier.capitalize.php';
?>
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <div class="logo"><img src="./ressources/images/GF-logo_default.png" alt="Logo" /></div>
                <a class="navbar-brand" href="./"><?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {
echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['pageName']->value);?>
 | <?php }
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                <?php if ($_smarty_tpl->tpl_vars['user_power']->value != 2) {?>
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                <?php }?>
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar --><?php }
}
