<?php
/* Smarty version 3.1.30, created on 2017-02-26 01:43:23
  from "C:\wamp\www\DISII\templates\left_bar.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58b224ab64bec3_28260705',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a7b283ae1b5b0250b510ce0b8f6ac2c74f57ccee' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\left_bar.tpl',
      1 => 1488031762,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58b224ab64bec3_28260705 (Smarty_Internal_Template $_smarty_tpl) {
?>
    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 2) {?>style="height: auto;"<?php }?>>

        <?php if ($_smarty_tpl->tpl_vars['loggedin']->value == true) {?>
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo $_smarty_tpl->tpl_vars['user_img']->value;?>
" width="48" height="48" alt="<?php echo $_smarty_tpl->tpl_vars['user_img_alt']->value;?>
" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_smarty_tpl->tpl_vars['user_login']->value;?>
</div>
                    <div class="email"><?php echo $_smarty_tpl->tpl_vars['user_email']->value;?>
</div>
                    <div class="power"><?php echo $_smarty_tpl->tpl_vars['user_textuel_power']->value;?>
</div>
                    <div class="today"><?php echo $_smarty_tpl->tpl_vars['today']->value;?>
</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="./?p=viewStagiaire&id=<?php echo $_smarty_tpl->tpl_vars['id_user']->value;?>
"><i class="material-icons">person</i>Ma fiche</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="./?logged=out"><i class="material-icons">input</i>Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
        <?php }?>
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <?php if ($_smarty_tpl->tpl_vars['user_power']->value != 2) {?>
                    <li class="header">MENU NAVIGATION</li>
                    <?php if (isset($_smarty_tpl->tpl_vars['left_menu']->value)) {
echo $_smarty_tpl->tpl_vars['left_menu']->value;
}?>
                    <?php }?>
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" <?php if ($_smarty_tpl->tpl_vars['user_power']->value == 2) {?>style="top: 81%;"<?php }?>>
                <div class="copyright">
                    &copy; DISII 2016/2017 <a href="javascript:void(0);">- GestiForm</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section><?php }
}
