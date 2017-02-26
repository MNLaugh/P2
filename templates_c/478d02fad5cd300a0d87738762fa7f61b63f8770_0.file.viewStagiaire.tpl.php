<?php
/* Smarty version 3.1.30, created on 2017-02-26 01:39:45
  from "C:\wamp\www\DISII\templates\page\stagiaire\viewStagiaire.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b223d1709734_29198336',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '478d02fad5cd300a0d87738762fa7f61b63f8770' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\stagiaire\\viewStagiaire.tpl',
      1 => 1488033261,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b223d1709734_29198336 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
        <div class="card">
            <div class="header">
                <h2>
                    STAGIAIRE :&emsp;<?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['name'];?>
 <?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['first_name'];?>

                </h2>
            </div>
            <div class="body clearfix">
                <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['stag_img']->value;?>
" alt="<?php echo $_smarty_tpl->tpl_vars['stag_img_alt']->value;?>
" width="150"/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['date_naissance'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['telephone'];?>
</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_1'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_2'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_3'];?>
</p>
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['code_postal'];?>
 <?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['ville'];?>
</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <p>Formation : 
                            <span class="label bg-blue-grey"><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['formation'];?>
</span>
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">    
                        <p> Niveau d'étude : <span class="label bg-blue-grey"><?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['level_name'];?>
</span></p>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['password'] != null) {?>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <button class="btn bg-blue-grey waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample">
                        Voir mes identifiant de connexion
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <p>Nom d'utilisateur : <?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['login'];?>
</p>
                            <p>Mot de passe : <?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['password'];?>
</p>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
</div><?php }
}
