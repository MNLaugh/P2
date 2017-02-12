<?php
/* Smarty version 3.1.30, created on 2017-02-11 20:31:32
  from "C:\wamp\www\DISII\templates\page\accueil.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_589f6694969279_09732237',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c0528d9be8fcd63b17614ea4ced0525458473fd8' => 
    array (
      0 => 'C:\\wamp\\www\\DISII\\templates\\page\\accueil.tpl',
      1 => 1485941312,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_589f6694969279_09732237 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_capitalize')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\modifier.capitalize.php';
if (!is_callable('smarty_modifier_date_format')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\modifier.date_format.php';
if (!is_callable('smarty_function_html_select_date')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\function.html_select_date.php';
if (!is_callable('smarty_function_html_select_time')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\function.html_select_time.php';
if (!is_callable('smarty_function_html_options')) require_once 'C:\\wamp\\www\\DISII\\smarties\\libs\\plugins\\function.html_options.php';
?>
<div class="row clearfix">


<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Smarty exemples
            </h2>
        </div>
        <div class="body">
            <p class="m-b-30">
                <pre>
                    
                        <?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bold')) {?><b><?php }?>
                            
                    Title: <?php echo smarty_modifier_capitalize($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'title'));?>
   {#title#|capitalize}
                            <?php if ($_smarty_tpl->smarty->ext->configLoad->_getConfigVariable($_smarty_tpl, 'bold')) {?></b><?php }?>

                        The current date and time is <?php echo smarty_modifier_date_format(time(),"%Y-%m-%d %H:%M:%S");?>

                        The value of global assigned variable $SCRIPT_NAME is <?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>

                        Example of accessing server environment variable SERVER_NAME: <?php echo $_SERVER['SERVER_NAME'];?>

                        The value of {$Name} is <b><?php echo $_smarty_tpl->tpl_vars['Name']->value;?>
</b>

                        variable modifier example of {$Name|upper}

                    <b><?php echo mb_strtoupper($_smarty_tpl->tpl_vars['Name']->value, 'UTF-8');?>
</b>

        testing strip tags
        <table border=0><tr><td><A HREF="<?php echo $_smarty_tpl->tpl_vars['SCRIPT_NAME']->value;?>
"><font color="red">This is a test </font></A></td></tr></table>
                    An example of a section loop:
                </pre>
            </p>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
                Table exemple
            </h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>FIRST NAME</th>
                            <th>LAST NAME</th>
                            <th>FUN</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$__section_outer_0_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_outer']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer'] : false;
$__section_outer_0_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['FirstName']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_outer_0_total = $__section_outer_0_loop;
$_smarty_tpl->tpl_vars['__smarty_section_outer'] = new Smarty_Variable(array());
if ($__section_outer_0_total != 0) {
for ($__section_outer_0_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] = 0; $__section_outer_0_iteration <= $__section_outer_0_total; $__section_outer_0_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum'] = $__section_outer_0_iteration;
?>
                            <tr>
                                <?php if ((1 & (isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null) / 2)) {?>
                                    <th scope="row"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum'] : null);?>
</th>
                                    <td><?php echo $_smarty_tpl->tpl_vars['FirstName']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LastName']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</td>
                                    <td>_</td>
                                <?php } else { ?>
                                    <th scope="row"><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum'] : null);?>
</th>
                                    <td><?php echo $_smarty_tpl->tpl_vars['FirstName']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</td>
                                    <td><?php echo $_smarty_tpl->tpl_vars['LastName']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</td>
                                    <td>*</td>
                                <?php }?>
                                <?php }} else {
 ?>
                                none
                            </tr>
                        <?php
}
if ($__section_outer_0_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_outer'] = $__section_outer_0_saved;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
               Table Liens interne
            </h2>
        </div>
        <div class="body">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>ICON</th>
                            <th>NOM</th>
                            <th>URL</th>
                            <th>PERM</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
$__section_outer_1_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_outer']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer'] : false;
$__section_outer_1_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['menu']->value['menu_nom']) ? count($_loop) : max(0, (int) $_loop));
$__section_outer_1_total = $__section_outer_1_loop;
$_smarty_tpl->tpl_vars['__smarty_section_outer'] = new Smarty_Variable(array());
if ($__section_outer_1_total != 0) {
for ($__section_outer_1_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] = 0; $__section_outer_1_iteration <= $__section_outer_1_total; $__section_outer_1_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']++){
$_smarty_tpl->tpl_vars['__smarty_section_outer']->value['rownum'] = $__section_outer_1_iteration;
?>
                        <?php if (is_array($_smarty_tpl->tpl_vars['menu']->value['menu_link'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)])) {?>

                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons"><?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_icon'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</i>
                            <span><?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_nom'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</span>
                        </a>
                        <ul class="ml-menu">
                            <?php $_smarty_tpl->_assignInScope('smenu', $_smarty_tpl->tpl_vars['menu']->value['menu_link'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)]);
?>
                            <?php
$__section_i_2_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_i']) ? $_smarty_tpl->tpl_vars['__smarty_section_i'] : false;
$__section_i_2_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['smenu']->value['smenu_nom']) ? count($_loop) : max(0, (int) $_loop));
$__section_i_2_total = $__section_i_2_loop;
$_smarty_tpl->tpl_vars['__smarty_section_i'] = new Smarty_Variable(array());
if ($__section_i_2_total != 0) {
for ($__section_i_2_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] = 0; $__section_i_2_iteration <= $__section_i_2_total; $__section_i_2_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']++){
?>
                            <li>
                                <a href="<?php echo $_smarty_tpl->tpl_vars['smenu']->value['smenu_link'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
">
                                    <span><?php echo $_smarty_tpl->tpl_vars['smenu']->value['smenu_nom'][(isset($_smarty_tpl->tpl_vars['__smarty_section_i']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_i']->value['index'] : null)];?>
</span>
                                    
                                </a>
                            </li>
                            <?php
}
}
if ($__section_i_2_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_i'] = $__section_i_2_saved;
}
?>
                        </ul>

                        <?php } else { ?>
                            <tr>
                               <th scope="row">
                                    <i class="material-icons">
                                        <?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_icon'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>

                                    </i>
                                    <?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_icon'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>

                                </th>
                               <th><?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_nom'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</th>
                               <th><?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_link'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</th>
                               <th><?php echo $_smarty_tpl->tpl_vars['menu']->value['menu_perm'][(isset($_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_outer']->value['index'] : null)];?>
</th>
                            </tr>
                        <?php }?>
                        <?php
}
}
if ($__section_outer_1_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_outer'] = $__section_outer_1_saved;
}
?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
               Item de formulaire avec smarty
            </h2>
        </div>
        <div class="body">
            <p class="m-b-30">
                This is an example of the html_select_date function:

                <form>
                    <?php echo smarty_function_html_select_date(array('start_year'=>1998,'end_year'=>2010,'class'=>"btn btn-default btn-list"),$_smarty_tpl);?>

                </form>

                This is an example of the html_select_time function:

                <form>
                    <?php echo smarty_function_html_select_time(array('use_24_hours'=>false,'class'=>"btn btn-default btn-list"),$_smarty_tpl);?>

                </form>

                This is an example of the html_options function:

                <form>
                    <select name=states style="width: 100px;">
                        <?php echo smarty_function_html_options(array('values'=>$_smarty_tpl->tpl_vars['option_values']->value,'selected'=>$_smarty_tpl->tpl_vars['option_selected']->value,'output'=>$_smarty_tpl->tpl_vars['option_output']->value,'class'=>"btn btn-default btn-list"),$_smarty_tpl);?>

                    </select>
                </form>
                </pre>
            </p>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
               Gestion des doublons de clef d'un tableau
            </h2>
        </div>
        <div class="body">
            <h4>Modèle php</h4>
            <p>
                Pour pallier au problème de clef récursive Smarty ne s'occupe pas de la clef d'un tableau pour l'afficher et concidère toutes les lignes de celui-ci.<br>
                <p class="font-bold col-red m-b-10 m-t-10">
                    Donc faire ATTENTION au DOUBLONS avant même d'afficher un tableau.
                </p>
                <blockquote>
                    <pre>{ $smarty->assign("contacts", array("phone" => "555-4444", "fax" => "555-3333", "double" => "760-1234"))); }</pre>
                    <footer>Tableau simple</footer><br><br>
                    <pre>{ $smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "double" => "760-1234"),array("phone" => "555-4444", "fax" => "555-3333", "double" => "760-1234"))); }</pre>
                    <footer>Tableau deux volumes, dont des clefs doublons (phone, fax, double)</footer>
            </blockquote>
            </p>
            <blockquote>
                <h4>Vue html</h4>
                <p class="m-b-30">
<pre><xmp>  
    <tbody>
        {section name=sec1 loop=$contacts}
            <tr>
                <th scope="row">{$contacts[sec1].phone}</th>
                <th>{$contacts[sec1].fax}</th>
                <th>{$contacts[sec1].double}</th>
            </tr>
        {/section}
    </tbody></xmp></pre>
                </p>
                <footer>
                    <h4>Vue finale</h4>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>PHONE</th>
                                    <th>FAX</th>
                                    <th class="col-red">DOUBLONS</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
$__section_sec1_3_saved = isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1'] : false;
$__section_sec1_3_loop = (is_array(@$_loop=$_smarty_tpl->tpl_vars['contacts']->value) ? count($_loop) : max(0, (int) $_loop));
$__section_sec1_3_total = $__section_sec1_3_loop;
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = new Smarty_Variable(array());
if ($__section_sec1_3_total != 0) {
for ($__section_sec1_3_iteration = 1, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] = 0; $__section_sec1_3_iteration <= $__section_sec1_3_total; $__section_sec1_3_iteration++, $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']++){
?>
                                    <tr>
                                        <th scope="row"><?php echo $_smarty_tpl->tpl_vars['contacts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['phone'];?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['contacts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['fax'];?>
</th>
                                        <th><?php echo $_smarty_tpl->tpl_vars['contacts']->value[(isset($_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index']) ? $_smarty_tpl->tpl_vars['__smarty_section_sec1']->value['index'] : null)]['double'];?>
</th>
                                    </tr>
                                <?php
}
}
if ($__section_sec1_3_saved) {
$_smarty_tpl->tpl_vars['__smarty_section_sec1'] = $__section_sec1_3_saved;
}
?>
                            </tbody>
                        </table>
                    </div>
                </footer>
            </blockquote>
        </div>
    </div>
</div>

<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
        <div class="header">
            <h2>
               Variables globales
            </h2>
        </div>
        <div class="body">
            <p class="m-b-30">
                <h4>Variables page et menu_list</h4>
                <h5>Page</h5>
                <p>
                    Comme son nom l'indique la variable page ou variable "p" en paramètre _GET (url) concerne les pages du site, plus précisément la page sur laquelle nous somme.<br>
                    <p class="font-bold col-red m-b-10 m-t-10">
                        Par defaut cette variable vaut "accueil".
                    </p>
                </p>
                <p>Vue html:</p>
                <blockquote>
                    <xmp><p>La variable contient : {$global_info_dev.page}</p></xmp>
                    <footer>La variable contient : <?php echo $_smarty_tpl->tpl_vars['global_info_dev']->value['page'];?>
</footer>
                </blockquote>
            </p>

            <p class="m-b-30">
                <h5>Menu_list</h5>
                <br>
                <blockquote></blockquote>
                <pre>
                    {$global_info_dev.menu_list|print_r}
                    <?php echo print_r($_smarty_tpl->tpl_vars['global_info_dev']->value['menu_list']);?>

                </pre>
            </p>


            <p class="m-b-30">
                <h5>Utilisateur</h5>
                {$global_info_dev.user|print_r}<br>
                <pre>
                    <?php echo print_r($_smarty_tpl->tpl_vars['global_info_dev']->value['user']);?>

                </pre>
            </p>
            <p class="m-b-30">
                <h5>Smarty</h5>
                {$global_info_dev.smarty|print_r}<br>
                <pre>
                    <?php echo print_r($_smarty_tpl->tpl_vars['global_info_dev']->value['smarty']);?>

                </pre>
            </p>
        </div>
    </div>
</div>
</div>
            <!-- Multi Select
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                MULTI-SELECT
                                <small>Taken from <a href="https://github.com/lou/multi-select/" target="_blank">github.com/lou/multi-select</a></small>
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
                            <select id="optgroup" class="ms" multiple="multiple">
                                <optgroup label="Alaskan/Hawaiian Time Zone">
                                    <option value="AK">Alaska</option>
                                    <option value="HI">Hawaii</option>
                                </optgroup>
                                <optgroup label="Pacific Time Zone">
                                    <option value="CA">California</option>
                                    <option value="NV">Nevada</option>
                                    <option value="OR">Oregon</option>
                                    <option value="WA">Washington</option>
                                </optgroup>
                                <optgroup label="Mountain Time Zone">
                                    <option value="AZ">Arizona</option>
                                    <option value="CO">Colorado</option>
                                    <option value="ID">Idaho</option>
                                    <option value="MT">Montana</option>
                                    <option value="NE">Nebraska</option>
                                    <option value="NM">New Mexico</option>
                                    <option value="ND">North Dakota</option>
                                    <option value="UT">Utah</option>
                                    <option value="WY">Wyoming</option>
                                </optgroup>
                                <optgroup label="Central Time Zone">
                                    <option value="AL">Alabama</option>
                                    <option value="AR">Arkansas</option>
                                    <option value="IL">Illinois</option>
                                    <option value="IA">Iowa</option>
                                    <option value="KS">Kansas</option>
                                    <option value="KY">Kentucky</option>
                                    <option value="LA">Louisiana</option>
                                    <option value="MN">Minnesota</option>
                                    <option value="MS">Mississippi</option>
                                    <option value="MO">Missouri</option>
                                    <option value="OK">Oklahoma</option>
                                    <option value="SD">South Dakota</option>
                                    <option value="TX">Texas</option>
                                    <option value="TN">Tennessee</option>
                                    <option value="WI">Wisconsin</option>
                                </optgroup>
                                <optgroup label="Eastern Time Zone">
                                    <option value="CT">Connecticut</option>
                                    <option value="DE">Delaware</option>
                                    <option value="FL">Florida</option>
                                    <option value="GA">Georgia</option>
                                    <option value="IN">Indiana</option>
                                    <option value="ME">Maine</option>
                                    <option value="MD">Maryland</option>
                                    <option value="MA">Massachusetts</option>
                                    <option value="MI">Michigan</option>
                                    <option value="NH">New Hampshire</option>
                                    <option value="NJ">New Jersey</option>
                                    <option value="NY">New York</option>
                                    <option value="NC">North Carolina</option>
                                    <option value="OH">Ohio</option>
                                    <option value="PA">Pennsylvania</option>
                                    <option value="RI">Rhode Island</option>
                                    <option value="SC">South Carolina</option>
                                    <option value="VT">Vermont</option>
                                    <option value="VA">Virginia</option>
                                    <option value="WV">West Virginia</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Multi Select --><?php }
}
