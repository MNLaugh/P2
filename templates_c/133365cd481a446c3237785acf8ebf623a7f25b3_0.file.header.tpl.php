<?php
/* Smarty version 3.1.30, created on 2017-02-14 08:21:30
  from "C:\Wamp64\www\DISII\templates\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a2be0a3a9588_27006281',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '133365cd481a446c3237785acf8ebf623a7f25b3' => 
    array (
      0 => 'C:\\Wamp64\\www\\DISII\\templates\\header.tpl',
      1 => 1487060368,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a2be0a3a9588_27006281 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\Wamp64\\www\\DISII\\smarties\\libs\\plugins\\modifier.capitalize.php';
?>
<!DOCTYPE html>
<HTML>

<HEAD>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <TITLE><?php if (isset($_smarty_tpl->tpl_vars['page']->value)) {
echo smarty_modifier_capitalize($_smarty_tpl->tpl_vars['pageName']->value);?>
 | <?php }
echo $_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title');?>
</TITLE>
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
</HEAD>
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
    <!-- #END# Overlay For Sidebars --><?php }
}
