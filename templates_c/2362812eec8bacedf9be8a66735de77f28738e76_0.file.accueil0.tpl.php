<?php
/* Smarty version 3.1.30, created on 2017-02-25 16:27:39
  from "C:\wamp\www\DISII\templates\page\accueil0.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b1a26b1e1119_71049732',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '2362812eec8bacedf9be8a66735de77f28738e76' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\accueil0.tpl',
      1 => 1488036412,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b1a26b1e1119_71049732 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">playlist_add_check</i>
        </div>
        <div class="content">
            <div class="text">FORMATIONS</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $_smarty_tpl->tpl_vars['nbFormation']->value;?>
" data-speed="1000" data-fresh-interval="20"><?php echo $_smarty_tpl->tpl_vars['nbFormation']->value;?>
</div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text">STAGIAIRES</div>
            <div class="number count-to" data-from="0" data-to="<?php echo $_smarty_tpl->tpl_vars['nbStagiaire']->value;?>
" data-speed="1000" data-fresh-interval="20"><?php echo $_smarty_tpl->tpl_vars['nbStagiaire']->value;?>
</div>
        </div>
    </div>
</div>
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
                            <th>Niveau aquis</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                            <th>Nombre d'étudiant</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Niveau acquis</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                            <th>Nombre d'étudiant</th>
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
                              <td><a id="clink-formation" title="Voir <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['short_name'];?>
" href="./?p=viewFormation&id=<?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['id_formation'];?>
"><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['short_name'];?>
</a></td>
                              <td><a id="clink-formation" title="Voir <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['short_name'];?>
" href="./?p=viewFormation&id=<?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['id_formation'];?>
"><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['long_name'];?>
</a</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['level_name'];?>
</td>
                              <td><?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['status'];?>
</td>
                              <td>
                            <?php if ($_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['mode'] == 0) {?>
                                Continue
                            <?php } else { ?>
                                Alternance
                            <?php }?>
                            </td>
                              <td style="width: 9em;">
                                <?php echo $_smarty_tpl->tpl_vars['allFormation']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['nbstagiaire'];?>

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
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    UTILISATEURS
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?><th>ID</th><?php }?>
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?><th>ID</th><?php }?>
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
$__section_i_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['listUser']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_i_1_total = $__section_i_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_1_total != 0) {
for ($__section_i_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_1_iteration <= $__section_i_1_total; $__section_i_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <tr>
                            <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?><th><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
</th><?php }?>
                            <td><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['login'];?>
</td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
</a></td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
</a></td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['listUser']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['power'];?>
</td>
                          </tr>
                      <?php
}
}
if ($__section_i_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_1_saved;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div><?php }
}
