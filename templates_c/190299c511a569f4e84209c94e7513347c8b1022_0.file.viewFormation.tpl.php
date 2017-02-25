<?php
/* Smarty version 3.1.30, created on 2017-02-19 11:02:27
  from "C:\wamp64\www\DISII\templates\page\formation\viewFormation.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58a97b43c69513_64178054',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '190299c511a569f4e84209c94e7513347c8b1022' => 
    array (
      0 => 'C:\\wamp64\\www\\DISII\\templates\\page\\formation\\viewFormation.tpl',
      1 => 1487501014,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58a97b43c69513_64178054 (Smarty_Internal_Template $_smarty_tpl) {
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
</div><?php }
}
