<?php
/* Smarty version 3.1.30, created on 2017-02-25 16:14:53
  from "C:\wamp\www\DISII\templates\page\formation\viewFormation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b19f6d4ea069_44272908',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '950671c22bb4edc11e2a3ef559f5ff77159be276' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\formation\\viewFormation.tpl',
      1 => 1488033745,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b19f6d4ea069_44272908 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
        <div class="card">
            <div class="header">
                <h2>
                    FORMATIONS<?php if (isset($_smarty_tpl->tpl_vars['uniq_form']->value['long_name'])) {?>:&emsp;<?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['long_name'];
}?>
                </h2>
            </div>
            <div class="body clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h4><?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['long_name'];?>
</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h4><?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['short_name'];?>
</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p><?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['description'];?>
</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <p>Type de formation : 
                        <?php if ($_smarty_tpl->tpl_vars['uniq_form']->value['mode'] == 0) {?>
                            <span class="label bg-blue-grey">Continue</span>
                        <?php } else { ?>
                            <span class="label bg-grey">Alternance</span>
                        <?php }?>
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">    
                        <p> Niveau diplomant : <span class="label bg-blue-grey"><?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['level_name'];?>
</span></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <p>Début : <?php echo convert_date_USinFR($_smarty_tpl->tpl_vars['uniq_form']->value['date_in']);?>
</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">    
                        <p> Fin : <?php echo convert_date_USinFR($_smarty_tpl->tpl_vars['uniq_form']->value['date_out']);?>
</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <?php if (isset($_smarty_tpl->tpl_vars['DateContentFormation']->value)) {?>
                        <?php echo $_smarty_tpl->tpl_vars['DateContentFormation']->value;?>

                    <?php }?>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a title="Editer <?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['short_name'];?>
" 
                        href="./?p=editFormation&id=<?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['id_formation'];?>
" 
                        class="btn btn-success btn-xs waves-effect">
                        <i class="material-icons">mode_edit</i>
                    </a>
                    <a title="Supprimer <?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['short_name'];?>
" 
                        href="./?p=formation&op=del&id=<?php echo $_smarty_tpl->tpl_vars['uniq_form']->value['id_formation'];?>
" 
                        class="btn btn-danger btn-xs waves-effect">
                        <i class="material-icons">delete_forever</i>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    STAGIAIRES (<?php echo $_smarty_tpl->tpl_vars['nbstag']->value;?>
)
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?><th>ID</th><?php }?>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Niveau</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Avatar</th>
                            <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?><th>ID</th><?php }?>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Code postal</th>
                            <th>Ville</th>
                            <th>Niveau</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['allStagiaire']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <tr>
                            <td><img class="avatar-list" src="<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['file_image'];?>
" alt="<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['alt_image'];?>
"></td>
                            <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?><th><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
</th><?php }?>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</a></td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
</a></td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['code_postal'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['ville'];?>
</td>
                            <td><?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['level_name'];?>
</td>
                            <td>
                            <?php if ($_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['full_profile'] == 0) {?>
                                <a class="btn bg-teal btn-block btn-xs waves-effect" href="./?p=editStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
">Profile incomplet</a>
                            <?php } else { ?>
                                <a title="Voir <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" 
                                    href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
" 
                                    class="btn btn-info btn-xs waves-effect">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                                <a title="Editer <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" 
                                    href="./?p=editStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
" 
                                    class="btn btn-success btn-xs waves-effect">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?>
                                <a title="Supprimer <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" 
                                    href="./?p=stagiaire&op=del&id=<?php echo $_smarty_tpl->tpl_vars['allStagiaire']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
" 
                                    class="btn btn-danger btn-xs waves-effect">
                                    <i class="material-icons">delete_forever</i>
                                </a>
                                <?php }?>
                            <?php }?>
                            </td>
                          </tr>
                      <?php
}
}
if ($__section_i_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_0_saved;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php }
}
