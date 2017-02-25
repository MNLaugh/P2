<?php
/* Smarty version 3.1.30, created on 2017-02-25 16:28:30
  from "C:\wamp\www\DISII\templates\page\formation\addFormation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b1a29e5f68a5_29400934',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '15f23cb43bdc5e36f8008084bf6d53b636a7c7a2' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\formation\\addFormation.tpl',
      1 => 1487498530,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b1a29e5f68a5_29400934 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\function.html_options.php';
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    AJOUTER UNE FORMATION
                </h2>
            </div>
            <div class="body">
            <!-- 
            Liste des variables post utilisées dans la page
            Input list POST var : 
                - Nom court : sNameFormation
                - Nom long : lNameFormation
                - Niveau : levelFormation
                - Date de début : dInFormation
                - Date de fin : dOutFormation
                - Mode de formation : modeFormation
                - Bouton envoyer : addFormation
             -->
                <form action="" method="POST">
                    <!-- Nom de la formation 2 champs "Nom court" / "Nom complet" -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="sNameFormation" type="text" class="form-control" placeholder="Acronyme de la formation" 
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_sNameFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_sNameFormation']->value;
}?>" />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="lNameFormation" type="text" class="form-control" placeholder="Nom complet de la formation"
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_lNameFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_lNameFormation']->value;
}?>" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <h2 class="card-inside-title">Description</h2>
                    <div class="row clearfix">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <textarea name="descFormation" rows="4" class="form-control no-resize" maxlength="200" placeholder="Description de la formation (200 caractères maximum)..."><?php if (isset($_smarty_tpl->tpl_vars['isset_descFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_descFormation']->value;
}?></textarea>
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
                                        <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['levelFormation_values']->value,'selected'=>$_smarty_tpl->tpl_vars['levelFormation_selected']->value,'output'=>$_smarty_tpl->tpl_vars['levelFormation_output']->value,'class'=>"btn btn-default btn-list"),$_smarty_tpl);?>

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Date d'entrée et de sortie -->
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <b>Date de début</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input id="dateInForm" name="dInFormation" type="date" class="form-control date" placeholder="Ex: 30/07/2016"
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dInFormation']->value)) {
echo convert_date_USinFR($_smarty_tpl->tpl_vars['isset_dInFormation']->value);
}?>">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <b>Date de fin</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input id="dateOutForm" name="dOutFormation" type="date" class="form-control date" placeholder="Ex: 25/04/2017"
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dOutFormation']->value)) {
echo convert_date_USinFR($_smarty_tpl->tpl_vars['isset_dOutFormation']->value);
}?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mode de formation -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                        <label>Mode de formation</label><br>
                        <input name="modeFormation" value="0" type="radio" id="radio_11" class="radio-col-indigo" 
                        <?php if (isset($_smarty_tpl->tpl_vars['isset_modeFormation']->value) && $_smarty_tpl->tpl_vars['isset_modeFormation']->value == 0) {
echo "checked";
}?> />
                        <label for="radio_11">Continue</label>
                        <input name="modeFormation" value="1" type="radio" id="radio_12" class="radio-col-indigo" 
                        <?php if (isset($_smarty_tpl->tpl_vars['isset_modeFormation']->value) && $_smarty_tpl->tpl_vars['isset_modeFormation']->value == 1) {
echo "checked";
}?> />
                        <label for="radio_12">Alternance</label>
                        </div>
                    </div>
                    <!-- bouton d'envoi -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <input name="addFormation" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php }
}
