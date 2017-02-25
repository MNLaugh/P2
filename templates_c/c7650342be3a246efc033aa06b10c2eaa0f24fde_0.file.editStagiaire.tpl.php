<?php
/* Smarty version 3.1.30, created on 2017-02-25 16:28:23
  from "C:\wamp\www\DISII\templates\page\stagiaire\editStagiaire.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b1a297b412e1_23750678',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c7650342be3a246efc033aa06b10c2eaa0f24fde' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\stagiaire\\editStagiaire.tpl',
      1 => 1487869494,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b1a297b412e1_23750678 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\function.html_options.php';
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    EDITION DE<?php if (isset($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['name']) && isset($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['first_name'])) {?>:&emsp;<?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['name'];?>
&emsp;<?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['first_name'];
}?>
                </h2>
            </div>
            <div class="body">
            <!-- 
            Liste des variables post utilisées dans la page
            Input list POST var : 
                - 'dateBirth'         : date de naissance
                - 'adresse1'          : Adresse 1
                - 'adresse2'          : Adresse 2
                - 'adresse3'          : Adresse 3
                - 'codePostal'       : Code postal
                - 'ville'             : Ville
                - 'phone'         : Telephone
                - 'level'            : Niveau de diplome
                - 'formation'         : Formation
                - 'image'             : Avatar
                - 'editStagiaire'     : Bouton envoyer
             -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <h2 class="card-inside-title">Nom</h2>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['name'])) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['name'];
}?>"  disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="card-inside-title">Prénom</h2>
                            <div class="form-group">
                                <div class="form-line">
                                   <input type="text" class="form-control" value="<?php if (isset($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['first_name'])) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['first_name'];
}?>"  disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="card-inside-title">Adresse</h2>
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="adresse1" class="form-control" maxlength="38" placeholder="Entrée, tour, bâtiment, immeuble, résidence, zone industrielle (Optionnel)" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_adresse1']->value)) {
echo $_smarty_tpl->tpl_vars['isset_adresse1']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_1'] != null) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_1'];
}?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="adresse2" class="form-control" maxlength="38" placeholder="Numéro et libellé de la voie ou lieu dit (Obligatoire)" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_adresse2']->value)) {
echo $_smarty_tpl->tpl_vars['isset_adresse2']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_2'] != null) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_2'];
}?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="adresse3" class="form-control" maxlength="38" placeholder="Boite Postale, Tri Spécial Arrivée… (Optionnel)" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_adresse3']->value)) {
echo $_smarty_tpl->tpl_vars['isset_adresse3']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_3'] != null) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['adresse_3'];
}?>"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="codePostal" class="form-control" maxlength="5" placeholder="Code postal" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_codePostal']->value)) {
echo $_smarty_tpl->tpl_vars['isset_codePostal']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['code_postal'] != 0) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['code_postal'];
}?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="ville" class="form-control" maxlength="100" placeholder="Ville" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_ville']->value)) {
echo $_smarty_tpl->tpl_vars['isset_ville']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['ville'] != null) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['ville'];
}?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="card-inside-title">Date de naissance & Téléphone</h2>
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" name="dateBirth" class="form-control" placeholder="Date de naissance" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dateBirth']->value)) {
echo $_smarty_tpl->tpl_vars['isset_dateBirth']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['date_naissance'] != 0) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['date_naissance'];
}?>"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="phone" class="form-control" placeholder="Téléphone" maxlength="10" value="<?php if (isset($_smarty_tpl->tpl_vars['isset_phone']->value)) {
echo $_smarty_tpl->tpl_vars['isset_phone']->value;
} elseif ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['telephone'] != 0) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['telephone'];
}?>"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <b>Avatar du stagiaire</b>
                            <div class="form-group">
                                <img src="<?php if (isset($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['file_image'])) {
echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['file_image'];
}?>" width="48">
                                <label class="btn bg-teal btn-circle btn-file waves-circle waves-float waves-light">
                                  <i class="material-icons">publish</i>
                                  <input type="file" name="userfile" style="display: none;">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <b>Niveau d'étude</b>
                                <select class="form-control show-tick" name="level">
                                    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['levelStagiairen_values']->value,'selected'=>$_smarty_tpl->tpl_vars['levelStagiaire_selected']->value,'output'=>$_smarty_tpl->tpl_vars['levelStagiairen_output']->value,'class'=>"btn btn-default btn-list"),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <b>Formation</b>
                                <select class="form-control show-tick" name="formation">
                                    <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['formation_values']->value,'selected'=>$_smarty_tpl->tpl_vars['formation_selected']->value,'output'=>$_smarty_tpl->tpl_vars['formation_output']->value),$_smarty_tpl);?>

                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- bouton d'envoi -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <input type="hidden" name="fullProfile" value="<?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['full_profile'];?>
" />
                            <input type="hidden" name="idStagiaire" value="<?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['id_user'];?>
" />
                            <input name="editStagiaire" type="submit" class="btn bg-indigo waves-effect" value="Modifier" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php }
}
