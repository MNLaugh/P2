<?php
/* Smarty version 3.1.30, created on 2017-02-01 08:12:21
  from "C:\wamp\www\DISII\templates\page\formation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58918a55b07ed0_59637880',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2b2b6a4cc3ff27eee8b86a8050a906f4beb73fa' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\formation.tpl',
      1 => 1485933140,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58918a55b07ed0_59637880 (Smarty_Internal_Template $_smarty_tpl) {
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
                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NIFORMA'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['DATEIN'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['DATOUT'];?>
</td>
                                <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['MOFORM'];?>
</td>
                                <td style="width: 8em;">
<a title="Voir <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['NSFORM'];?>
" href="./?p=formation&op=view&id=<?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['IDFORM'];?>
" class="btn btn-info btn-xs waves-effect">
    <i class="material-icons">remove_red_eye</i>
</a>
                                    <a title="Editer" class="btn btn-success btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                    <a title="Supprimer" class="btn btn-danger btn-xs waves-effect"><i class="material-icons">delete_forever</i></a>
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
                    </div>
                </div>
            </div>




            <!-- Input -->
            <div class="row clearfix"> <!-- 2 3 5 -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               FORMATION
                                <small>Ajout</small>
                            </h2>
                        </div>
                        <div class="body">
                            <form action="" method="POST">
                                <!-- Nom de la formation 2 champs "Nom court" / "Nom complet" -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="sName-formation" type="text" class="form-control" placeholder="Acronyme de la formation" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="lName-formation" type="text" class="form-control" placeholder="Nom long de la formation" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Niveau diploment -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="niv-formation">
                                                    <option value="">-- Niveau diploment --</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Date d'entrée et de sortie -->
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="date_in">Date de début</label><br>
                                            <input id="date_in" name="dIn_formation" type="date" class="form-control" placeholder="jj/mm/aaaa" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="date_out">Date de fin</label><br>
                                            <input id="date_out" name="dOut_formation" type="date" class="form-control" placeholder="jj/mm/aaaa" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Mode de formation -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                    <label>Mode de formation</label><br>
                                    <input name="mode_formation" type="radio" id="radio_11" class="radio-col-indigo" />
                                    <label for="radio_11">Continue</label>

                                    <input name="mode_formation" type="radio" id="radio_12" class="radio-col-indigo" />
                                    <label for="radio_12">Alternance</label>
                                    </div>
                                </div>
                                <!-- bouton d'envoi -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input --><?php }
}
