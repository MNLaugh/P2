<?php
/* Smarty version 3.1.30, created on 2017-02-19 09:55:05
  from "C:\wamp64\www\DISII\templates\page\formation\editFormation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a96b79cfa3a9_02270491',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd524d0b153c02a666dea8336504f10d61bbfb3d4' => 
    array (
      0 => 'C:\\wamp64\\www\\DISII\\templates\\page\\formation\\editFormation.tpl',
      1 => 1487498101,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a96b79cfa3a9_02270491 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\wamp64\\www\\DISII\\smarties\\libs\\plugins\\function.html_options.php';
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    MISE A JOUR FORMATIONS<?php if (isset($_smarty_tpl->tpl_vars['uniq_form']->value['long_name'])) {?>:&emsp;<?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['long_name'];
}?>
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
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="sNameFormation" type="text" class="form-control" placeholder="Acronyme de la formation" 
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_sNameFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_sNameFormation']->value;
} else {
echo $_smarty_tpl->tpl_vars['uniq_form']->value['short_name'];
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
} else {
echo $_smarty_tpl->tpl_vars['uniq_form']->value['long_name'];
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
                                    <textarea name="descFormation" rows="2" class="form-control no-resize" maxlength="250" placeholder="Description de la formation (200 caractères maximum)..."><?php if (isset($_smarty_tpl->tpl_vars['isset_descFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_descFormation']->value;
} else {
echo $_smarty_tpl->tpl_vars['uniq_form']->value['description'];
}?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
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
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <b>Date de début</b>
                            <div class="input-group">
                                <span class="input-group-addon">
                                    <i class="material-icons">date_range</i>
                                </span>
                                <div class="form-line">
                                    <input id="dateInForm" name="dInFormation" type="text" class="form-control date" placeholder="30/07/2016"
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dInFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_dInFormation']->value;
} else {
echo convert_date_USinFR($_smarty_tpl->tpl_vars['uniq_form']->value['date_in']);
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
                                    <input id="dateOutForm" name="dOutFormation" type="text" class="form-control date" placeholder="25/04/2017"
                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dOutFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_dOutFormation']->value;
} else {
echo convert_date_USinFR($_smarty_tpl->tpl_vars['uniq_form']->value['date_out']);
}?>">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mode de formation -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                        <label>Mode de formation</label><br>
                        <input name="modeFormation" value="Continue" type="radio" id="radio_11" class="radio-col-indigo" 
                        <?php if (isset($_smarty_tpl->tpl_vars['isset_modeFormation']->value) && $_smarty_tpl->tpl_vars['isset_modeFormation']->value == 'Continue') {
echo "checked";
} elseif ($_smarty_tpl->tpl_vars['uniq_form']->value['mode'] == 0) {
echo "checked";
}?> />
                        <label for="radio_11">Continue</label>
                        <input name="modeFormation" value="Alternance" type="radio" id="radio_12" class="radio-col-indigo" 
                        <?php if (isset($_smarty_tpl->tpl_vars['isset_modeFormation']->value) && $_smarty_tpl->tpl_vars['isset_modeFormation']->value == 'Alternance') {
echo "checked";
} elseif ($_smarty_tpl->tpl_vars['uniq_form']->value['mode'] == 1) {
echo "checked";
}?> />
                        <label for="radio_12">Alternance</label>
                        </div>
                    </div>
                    <!-- bouton d'envoi -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <input type="hidden" name="idFormation" value="<?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['id_formation'];?>
">
                            <input name="updateFormation" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div><?php }
}
