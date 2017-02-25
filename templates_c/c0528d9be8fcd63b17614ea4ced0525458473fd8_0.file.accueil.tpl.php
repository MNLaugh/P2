<?php
/* Smarty version 3.1.30, created on 2017-02-20 19:30:59
  from "C:\wamp\www\DISII\templates\page\accueil.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ab35e3b36a71_81076733',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0528d9be8fcd63b17614ea4ced0525458473fd8' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\accueil.tpl',
      1 => 1487615458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ab35e3b36a71_81076733 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">playlist_add_check</i>
        </div>
        <div class="content">
            <div class="text">FORMATIONS</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $_smarty_tpl->tpl_vars['nbFormation']->value;?>
" data-speed="1000" data-fresh-interval="20"><?php echo $_smarty_tpl->tpl_vars['nbFormation']->value;?>
</div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text">STAGIAIRES</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $_smarty_tpl->tpl_vars['nbStagiaire']->value;?>
" data-speed="1000" data-fresh-interval="20"><?php echo $_smarty_tpl->tpl_vars['nbStagiaire']->value;?>
</div>
        </div>
    </div>
</div><?php }
}
