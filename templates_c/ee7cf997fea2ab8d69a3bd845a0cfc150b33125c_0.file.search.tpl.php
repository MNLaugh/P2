<?php
/* Smarty version 3.1.30, created on 2017-02-26 01:42:04
  from "C:\wamp\www\DISII\templates\page\search.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b2245c444a29_19806865',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ee7cf997fea2ab8d69a3bd845a0cfc150b33125c' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\search.tpl',
      1 => 1488069217,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b2245c444a29_19806865 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    RECHERCHE
                </h2>
            </div>
            <div class="body">
            <?php if (isset($_smarty_tpl->tpl_vars['result']->value)) {?>
            	<?php if (isset($_smarty_tpl->tpl_vars['result']->value['user'])) {?>
                <table class="table table-bordered table-striped table-hover dataTable">
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
$__section_i_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['result']->value['user']) ? count($_loop) : max(0, (int) $_loop));
$__section_i_0_total = $__section_i_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_0_total != 0) {
for ($__section_i_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_0_iteration <= $__section_i_0_total; $__section_i_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                        <tr>
                        <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 0) {?>
                            <th>
                            	<a id="clink-stagiaire" 
                            		title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
"
                            		href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
">
                            	<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>

                            	</a>
                            </th>
                            <td>
                            	<a id="clink-stagiaire" 
                            		title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
"
                            		href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
">
                            	<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['login'];?>

                            	</a>
                            </td>
                        <?php }?>
                            <td>
                            	<a id="clink-stagiaire" 
                            		title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
"
                            		href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
">
                            	<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>

                            	</a>
                            </td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
</a></td>
                            <td><a id="clink-stagiaire" title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['first_name'];?>
 <?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['name'];?>
" href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['id_user'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['email'];?>
</a></td>
                            <td><?php echo $_smarty_tpl->tpl_vars['result']->value['user'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)]['power'];?>
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
				<?php }?>
				<?php if (isset($_smarty_tpl->tpl_vars['result']->value['formation'])) {?>
            	<h2>Formation trouvée(s)</h2>
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      <?php
$__section_key_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_key']) ? $_smarty_tpl->tpl_vars['__smarty_section_key'] : false;
$__section_key_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['result']->value['formation']) ? count($_loop) : max(0, (int) $_loop));
$__section_key_1_total = $__section_key_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_key'] = new Smarty_Variable(array());
if ($__section_key_1_total != 0) {
for ($__section_key_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] = 0; $__section_key_1_iteration <= $__section_key_1_total; $__section_key_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']++){
?>
                          <tr>
                              <td><a id="clink-formation" title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['short_name'];?>
" href="./?p=viewFormation&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['id_formation'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['short_name'];?>
</a></td>
                              <td><a id="clink-formation" title="Voir <?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['short_name'];?>
" href="./?p=viewFormation&id=<?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['id_formation'];?>
"><?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['long_name'];?>
</a></td>
                              <td><?php echo $_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['status'];?>
</td>
                              <td>
                            <?php if ($_smarty_tpl->tpl_vars['result']->value['formation'][(isset($_smarty_tpl->tpl_vars['__smarty_section_key']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_key']->value['index'] : null)]['mode'] == 0) {?>
                                Continue
                            <?php } else { ?>
                                Alternance
                            <?php }?>
                            </td>
                          </tr>
                      <?php
}
}
if ($__section_key_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_key'] = $__section_key_1_saved;
}
?>
                    </tbody>
                </table>
            	<?php }?>
            <?php } else { ?>
            	<h5>Aucun résultat trouvé.</h5>
            <?php }?>
            </div>
        </div>
    </div>
</div><?php }
}
