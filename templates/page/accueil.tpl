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
                    {* bold and title are read from the config file *}
                        {if #bold#}<b>{/if}
                            {* capitalize the first letters of each word of the title *}
                    Title: {#title#|capitalize}   {ldelim}#title#|capitalize{rdelim}
                            {if #bold#}</b>{/if}

                        The current date and time is {$smarty.now|date_format:"%Y-%m-%d %H:%M:%S"}
                        The value of global assigned variable $SCRIPT_NAME is {$SCRIPT_NAME}
                        Example of accessing server environment variable SERVER_NAME: {$smarty.server.SERVER_NAME}
                        The value of {ldelim}$Name{rdelim} is <b>{$Name}</b>

                        variable modifier example of {ldelim}$Name|upper{rdelim}

                    <b>{$Name|upper}</b>

        testing strip tags
        {strip}
<table border=0>
    <tr>
        <td>
            <A HREF="{$SCRIPT_NAME}">
                <font color="red">This is a test </font>
            </A>
        </td>
    </tr>
</table>
    {/strip}
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
                        {section name=outer loop=$FirstName}
                            <tr>
                                {if $smarty.section.outer.index is odd by 2}
                                    <th scope="row">{$smarty.section.outer.rownum}</th>
                                    <td>{$FirstName[outer]}</td>
                                    <td>{$LastName[outer]}</td>
                                    <td>_</td>
                                {else}
                                    <th scope="row">{$smarty.section.outer.rownum}</th>
                                    <td>{$FirstName[outer]}</td>
                                    <td>{$LastName[outer]}</td>
                                    <td>*</td>
                                {/if}
                                {sectionelse}
                                none
                            </tr>
                        {/section}
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
                        {section name=outer loop=$menu.menu_nom}
                        {if $menu.menu_link[outer]|is_array}

                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">{$menu.menu_icon[outer]}</i>
                            <span>{$menu.menu_nom[outer]}</span>
                        </a>
                        <ul class="ml-menu">
                            {assign var="smenu" value=$menu.menu_link[outer]}
                            {section name=i loop=$smenu.smenu_nom}
                            <li>
                                <a href="{$smenu.smenu_link[i]}">
                                    <span>{$smenu.smenu_nom[i]}</span>
                                    
                                </a>
                            </li>
                            {/section}
                        </ul>

                        {else}
                            <tr>
                               <th scope="row">
                                    <i class="material-icons">
                                        {$menu.menu_icon[outer]}
                                    </i>
                                    {$menu.menu_icon[outer]}
                                </th>
                               <th>{$menu.menu_nom[outer]}</th>
                               <th>{$menu.menu_link[outer]}</th>
                               <th>{$menu.menu_perm[outer]}</th>
                            </tr>
                        {/if}
                        {/section}
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
                    {html_select_date start_year=1998 end_year=2010 class="btn btn-default btn-list"}
                </form>

                This is an example of the html_select_time function:

                <form>
                    {html_select_time use_24_hours=false class="btn btn-default btn-list"}
                </form>

                This is an example of the html_options function:

                <form>
                    <select name=states style="width: 100px;">
                        {html_options values=$option_values selected=$option_selected output=$option_output class="btn btn-default btn-list"}
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
                    <pre>{ldelim} $smarty->assign("contacts", array("phone" => "555-4444", "fax" => "555-3333", "double" => "760-1234"))); {rdelim}</pre>
                    <footer>Tableau simple</footer><br><br>
                    <pre>{ldelim} $smarty->assign("contacts", array(array("phone" => "1", "fax" => "2", "double" => "760-1234"),array("phone" => "555-4444", "fax" => "555-3333", "double" => "760-1234"))); {rdelim}</pre>
                    <footer>Tableau deux volumes, dont des clefs doublons (phone, fax, double)</footer>
            </blockquote>
            </p>
            <blockquote>
                <h4>Vue html</h4>
                <p class="m-b-30">
<pre><xmp>  
    <tbody>
        {ldelim}section name=sec1 loop=$contacts{rdelim}
            <tr>
                <th scope="row">{ldelim}$contacts[sec1].phone{rdelim}</th>
                <th>{ldelim}$contacts[sec1].fax{rdelim}</th>
                <th>{ldelim}$contacts[sec1].double{rdelim}</th>
            </tr>
        {ldelim}/section{rdelim}
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
                                {section name=sec1 loop=$contacts}
                                    <tr>
                                        <th scope="row">{$contacts[sec1].phone}</th>
                                        <th>{$contacts[sec1].fax}</th>
                                        <th>{$contacts[sec1].double}</th>
                                    </tr>
                                {/section}
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
                    <xmp><p>La variable contient : {ldelim}$global_info_dev.page{rdelim}</p></xmp>
                    <footer>La variable contient : {$global_info_dev.page}</footer>
                </blockquote>
            </p>

            <p class="m-b-30">
                <h5>Menu_list</h5>
                <br>
                <blockquote></blockquote>
                <pre>
                    {ldelim}$global_info_dev.menu_list|print_r{rdelim}
                    {$global_info_dev.menu_list|print_r}
                </pre>
            </p>


            <p class="m-b-30">
                <h5>Utilisateur</h5>
                {ldelim}$global_info_dev.user|print_r{rdelim}<br>
                <pre>
                    {$global_info_dev.user|print_r}
                </pre>
            </p>
            <p class="m-b-30">
                <h5>Smarty</h5>
                {ldelim}$global_info_dev.smarty|print_r{rdelim}<br>
                <pre>
                    {$global_info_dev.smarty|print_r}
                </pre>
            </p>
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
            <!-- #END# Multi Select -->