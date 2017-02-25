<?php
/* Smarty version 3.1.30, created on 2017-02-18 17:13:17
  from "C:\wamp64\www\DISII\templates\page\stagiaire.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a880ad344941_63920552',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '36bfba64cc46f92035227ec520d7aabc9a8e786b' => 
    array (
      0 => 'C:\\wamp64\\www\\DISII\\templates\\page\\stagiaire.tpl',
      1 => 1487414510,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a880ad344941_63920552 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\wamp64\\www\\DISII\\smarties\\libs\\plugins\\function.html_options.php';
?>
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    FORMATIONS<?php if (isset($_smarty_tpl->tpl_vars['uniq_form']->value['long_name'])) {?>:&emsp;<?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['long_name'];
}?>
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="updateForm" class="body">
                        <!-- 
                        Liste des variables post utilisées dans la page
                        Input list POST var : 
                            - Nom : name
                            - Prénom : firstname
                            - Email : email
                            - Permission : power
                         -->
                            <form action="#addUser" method="POST">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="name" type="text" class="form-control" placeholder="Nom" 
                                                value="<?php if (isset($_smarty_tpl->tpl_vars['isset_name']->value)) {
echo $_smarty_tpl->tpl_vars['isset_name']->value;
}?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="firstname" type="text" class="form-control" placeholder="Prénom"
                                                value="<?php if (isset($_smarty_tpl->tpl_vars['isset_firstname']->value)) {
echo $_smarty_tpl->tpl_vars['isset_firstname']->value;
}?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="email" type="email" class="form-control" placeholder="Adresse mail"
                                                value="<?php if (isset($_smarty_tpl->tpl_vars['isset_email']->value)) {
echo $_smarty_tpl->tpl_vars['isset_email']->value;
}?>" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Niveau diploment -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="levelFormation">
                                                    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['power_values']->value,'selected'=>$_smarty_tpl->tpl_vars['power_selected']->value,'output'=>$_smarty_tpl->tpl_vars['power_output']->value,'class'=>"btn btn-default btn-list"),$_smarty_tpl);?>

                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- bouton d'envoi -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <input name="adduser" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><?php }
}
