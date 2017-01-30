<?php
/* Smarty version 3.1.30, created on 2017-01-25 14:54:09
  from "C:\xampp\htdocs\DISII\templates\page\formation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5888ae0101ff69_21311283',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd590d1784610742ec3a7ae5826c25a40632eddd6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DISII\\templates\\page\\formation.tpl',
      1 => 1485352118,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5888ae0101ff69_21311283 (Smarty_Internal_Template $_smarty_tpl) {
?>
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
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
                                <td>Options</td>
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
<?php }
}
