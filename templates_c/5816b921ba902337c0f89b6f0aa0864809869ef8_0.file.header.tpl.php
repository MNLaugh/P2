<?php
/* Smarty version 3.1.30, created on 2017-02-26 01:43:23
  from "C:\wamp\www\DISII\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b224ab47d462_86187071',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5816b921ba902337c0f89b6f0aa0864809869ef8' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\header.tpl',
      1 => 1488045771,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b224ab47d462_86187071 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\modifier.capitalize.php';
?>
<!DOCTYPE html>
<HTML>
<HEAD>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title><?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {
echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['pageName']->value);?>
 | <?php }
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
</title>
    <!-- Favicon-->
    <link rel="icon" href="ressources/images/GF-favicon.ico" type="image/x-icon">
    <!-- Google Fonts -->
    <link href="ressources/fonts/cyrillic.css" rel="stylesheet" type="text/css">
    <link href="ressources/materialIcones/material_icones.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap Core Css -->
    <link href="ressources/plugins/bootstrap/css/bootstrap.css" rel="stylesheet">
    <!-- Waves Effect Css -->
    <link href="ressources/plugins/node-waves/waves.css" rel="stylesheet" />
    <!-- Animation Css -->
    <link href="ressources/plugins/animate-css/animate.css" rel="stylesheet" />
    <!-- Preloader Css -->
    <link href="ressources/plugins/material-design-preloader/md-preloader.css" rel="stylesheet" />
    <!-- Morris Chart Css-->
    <link href="ressources/plugins/morrisjs/morris.css" rel="stylesheet" />
    <!-- Custom Css -->
    <link href="ressources/css/style.css" rel="stylesheet">
    <link href="ressources/css/custom.css" rel="stylesheet">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="ressources/css/themes/theme-indigo.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
 
</HEAD><?php }
}
