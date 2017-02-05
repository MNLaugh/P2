<?php
/* Smarty version 3.1.30, created on 2017-02-05 15:09:41
  from "C:\xampp\htdocs\DISII\templates\page\formation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58973225aa6992_93144405',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd590d1784610742ec3a7ae5826c25a40632eddd6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DISII\\templates\\page\\formation.tpl',
      1 => 1486303779,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58973225aa6992_93144405 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_function_html_options')) require_once 'C:\\xampp\\htdocs\\DISII\\smarties\\libs\\plugins\\function.html_options.php';
?>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FORMATIONS
                            </h2>
                        </div>
                        <div class="body">

                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#full_list" data-toggle="tab" data-tooltip="tooltip" data-placement="top" title="Liste complète">Liste complète</a></li>
                                        <li role="presentation"><a href="#add_formation" data-toggle="tab" data-tooltip="tooltip" data-placement="top" title="Ajout formation">&emsp;Ajouter&emsp;</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Tab full list -->
                                        <div role="tabpanel" class="tab-pane animated active" id="full_list">
                                            <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                                <thead>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Nom complet</th>
                                                        <th>Description</th>
                                                        <th>Niveau aquis</th>
                                                        <th>Date de début</th>
                                                        <th>Date de fin</th>
                                                        <th>Type de formation</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </thead>
                                                <tfoot>
                                                    <tr>
                                                        <th>Nom</th>
                                                        <th>Nom complet</th>
                                                        <th>Description</th>
                                                        <th>Niveau acquis</th>
                                                        <th>Date de début</th>
                                                        <th>Date de fin</th>
                                                        <th>Type de formation</th>
                                                        <th>Options</th>
                                                    </tr>
                                                </tfoot>
                                                <tbody>
                		                        <?php
$__section_key_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_key']) ? $_smarty_tpl->tpl_vars['__smarty_section_key'] : false;
$__section_key_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['allFormation']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_key_0_total = $__section_key_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_key'] = new Smarty_Variable(array());
if ($__section_key_0_total != 0) {
for ($__section_key_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] = 0; $__section_key_0_iteration <= $__section_key_0_total; $__section_key_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']++){
?>
                		                            <tr>
                		                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NSFORM'];?>
</td>
                		                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NLFORM'];?>
</td>
                		                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['DEFORM'];?>
</td>
                		                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NIFORM'];?>
</td>
                		                                <td><?php echo convert_date_USinFR($_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['DATEIN']);?>
</td>
                		                                <td><?php echo convert_date_USinFR($_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['DATOUT']);?>
</td>
                		                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['MOFORM'];?>
</td>
                		                                <td style="width: 9em;">
                											<a title="Voir <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NSFORM'];?>
" 
                												href="./?p=formation&op=view&id=<?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['IDFORM'];?>
" 
                												class="btn btn-info btn-xs waves-effect">
                											    <i class="material-icons">remove_red_eye</i>
                											</a>
                											<a title="Editer <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NSFORM'];?>
" 
                												href="./?p=formation&op=edit&id=<?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['IDFORM'];?>
" 
                												class="btn btn-success btn-xs waves-effect">
                												<i class="material-icons">mode_edit</i>
                											</a>
                											<a title="Supprimer <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NSFORM'];?>
" 
                												href="./?p=formation&op=del&id=<?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['IDFORM'];?>
" 
                												class="btn btn-danger btn-xs waves-effect">
                												<i class="material-icons">delete_forever</i>
                											</a>
                		                                </td>
                		                            </tr>
                		                        <?php
}
}
if ($__section_key_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_key'] = $__section_key_0_saved;
}
?>
                                                </tbody>
                                            </table>
                                        </div>
                                        <!-- Tab add formation -->
                                        <div role="tabpanel" class="tab-pane animated" id="add_formation">
                                            <div id="addForm" class="body">
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
                                                <form action="#addForm" method="POST">
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
                                                                    <input id="dateInForm" name="dInFormation" type="text" class="form-control date" placeholder="Ex: 30/07/2016"
                                                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dInFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_dInFormation']->value;
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
                                                                    <input id="dateOutForm" name="dOutFormation" type="text" class="form-control date" placeholder="Ex: 25/04/2017"
                                                                    value="<?php if (isset($_smarty_tpl->tpl_vars['isset_dOutFormation']->value)) {
echo $_smarty_tpl->tpl_vars['isset_dOutFormation']->value;
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
                                                        <?php if ($_smarty_tpl->tpl_vars['isset_modeFormation']->value == 'Continue') {
echo "checked";
}?> />
                                                        <label for="radio_11">Continue</label>
                                                        <input name="modeFormation" value="Alternance" type="radio" id="radio_12" class="radio-col-indigo" 
                                                        <?php if ($_smarty_tpl->tpl_vars['isset_modeFormation']->value == 'Alternance') {
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div><?php }
}
