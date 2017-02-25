<?php
/* Smarty version 3.1.30, created on 2017-02-21 01:07:12
  from "C:\wamp\www\DISII\templates\page\login.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58ab84b0792665_56709517',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c4512ff846bab7e956763783aade1e1985a13da6' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\login.tpl',
      1 => 1487635607,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58ab84b0792665_56709517 (Smarty_Internal_Template $_smarty_tpl) {
?>
<body class="login-page ls-closed">
    <div class="login-box">
        <center>
        <div class="logo-login center">
            <a href="javascript:void(0);"><img src="./ressources/images/GF-logo_default.png"></a>
            <small class="small-login">Gestionnaire de formation- <b>GestiForm</b></small>
        </div>
        </center>
        <div class="card card-login">
            <div class="body">
                <form id="sign_in" method="POST" novalidate="novalidate">
                    <div class="msg">Vous devez disposer d'identifiants de connexion pour accéder au site.</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="username" placeholder="Nom d'utilisateur" required="" autofocus="" aria-required="true" type="text">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="password" placeholder="Mot de passe" required="" aria-required="true" type="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5">
                            <button class="btn btn-block bg-grey waves-effect" type="submit" name="login">CONNEXION</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <?php echo '<script'; ?>
 src="./ressources/plugins/jquery/jquery.min.js"><?php echo '</script'; ?>
>
    <!-- Bootstrap Core Js -->
    <?php echo '<script'; ?>
 src="./ressources/plugins/bootstrap/js/bootstrap.js"><?php echo '</script'; ?>
>
    <!-- Waves Effect Plugin Js -->
    <?php echo '<script'; ?>
 src="./ressources/plugins/node-waves/waves.js"><?php echo '</script'; ?>
>
    <!-- Validation Plugin Js -->
    <?php echo '<script'; ?>
 src="./ressources/plugins/jquery-validation/jquery.validate.js"><?php echo '</script'; ?>
>
    <!-- Custom Js -->
    <?php echo '<script'; ?>
 src="./ressources/js/admin.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="./ressources/js/pages/examples/sign-in.js"><?php echo '</script'; ?>
><?php }
}
