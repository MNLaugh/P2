<?php
/* Smarty version 3.1.30, created on 2017-01-25 10:23:30
  from "C:\xampp\htdocs\DISII\templates\page\docs\docs_accueil.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58886e92da9b73_36084093',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '272b07be59f0844adf84beb7b2293a1d0796655c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\DISII\\templates\\page\\docs\\docs_accueil.tpl',
      1 => 1484619152,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58886e92da9b73_36084093 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LANGAGE
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled">
                                <li>HTML</li>
                                    <ul>
                                        <li>Bootstrap</li>
                                    </ul>
                                <li>CSS</li>
                                    <ul>
                                        <li>Bootstrap</li>
                                    </ul>
                                <li>JavaScript</li>
                                    <ul>
                                        <li>jQuery</li>
                                        <li>Bootstrap</li>
                                    </ul>
                                <li>SQL</li>
                                    <ul>
                                        <li>MySQL</li>
                                    </ul>
                                <li>
                                    PHP
                                    <ul>
                                        <li>Smarty</li>
                                        <li>Class php</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                MODULES
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled">
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['modulesList']->value, 'val');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['val']->value) {
?>
                                <li><pre><?php echo print_r($_smarty_tpl->tpl_vars['val']->value);?>
</pre></li>
                            <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PRESENTATION
                            </h2>
                        </div>
                        <div class="body">
                            <p>Présentation...</p>
                        </div>
                    </div>
                </div>
            </div><?php }
}
