<?php
/* Smarty version 3.1.30, created on 2017-02-25 14:37:22
  from "C:\wamp\www\DISII\templates\page\accueil2.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b18892b637c2_69661493',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3f8f6f503c1f73548a0b4d8a0e6662d672a09cbc' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\accueil2.tpl',
      1 => 1488029049,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b18892b637c2_69661493 (Smarty_Internal_Template $_smarty_tpl) {
?>
<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <?php if ($_smarty_tpl->tpl_vars['uniq_stagiaire']->value['formation'] != 0) {?>
            <div class="header">
                <h2>
                    STAGIAIRES DE LA FORMATION : <?php echo $_smarty_tpl->tpl_vars['uniq_stagiaire']->value['formation'];?>

                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Avatar</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
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
            <?php } else { ?>
            <div class="header">
                <h2>
                    AUCUNES INFORMATIONS
                </h2>
            </div>
            <?php }?>
        </div>
    </div>
</div><?php }
}
