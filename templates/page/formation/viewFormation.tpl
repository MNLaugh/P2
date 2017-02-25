<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
        <div class="card">
            <div class="header">
                <h2>
                    FORMATIONS{if isset($uniq_form.long_name)}:&emsp;{$uniq_form.long_name}{/if}
                </h2>
            </div>
            <div class="body clearfix">
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h4>{$uniq_form.long_name}</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <h4>{$uniq_form.short_name}</h4>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <p>{$uniq_form.description}</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <p>Type de formation : 
                        {if $uniq_form.mode == 0}
                            <span class="label bg-blue-grey">Continue</span>
                        {else}
                            <span class="label bg-grey">Alternance</span>
                        {/if}
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">    
                        <p> Niveau diplomant : <span class="label bg-blue-grey">{$uniq_form.level_name}</span></p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                        <p>Début : {convert_date_USinFR($uniq_form.date_in)}</p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">    
                        <p> Fin : {convert_date_USinFR($uniq_form.date_out)}</p>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    {if isset($DateContentFormation)}
                        {$DateContentFormation}
                    {/if}
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <a title="Editer {$uniq_form.short_name}" 
                        href="./?p=editFormation&id={$uniq_form.id_formation}" 
                        class="btn btn-success btn-xs waves-effect">
                        <i class="material-icons">mode_edit</i>
                    </a>
                    <a title="Supprimer {$uniq_form.short_name}" 
                        href="./?p=formation&op=del&id={$uniq_form.id_formation}" 
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
                    STAGIAIRES ({$nbstag})
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            {if $user_power==0}<th>ID</th>{/if}
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
                            {if $user_power==0}<th>ID</th>{/if}
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
                        {section name=i loop=$allStagiaire}
                        <tr>
                            <td><img class="avatar-list" src="{$allStagiaire[i]['file_image']}" alt="{$allStagiaire[i]['alt_image']}"></td>
                            {if $user_power==0}<th>{$allStagiaire[i]['id_user']}</th>{/if}
                            <td><a id="clink-stagiaire" title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}">{$allStagiaire[i]['name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}">{$allStagiaire[i]['first_name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}">{$allStagiaire[i]['email']}</a></td>
                            <td>{$allStagiaire[i]['code_postal']}</td>
                            <td>{$allStagiaire[i]['ville']}</td>
                            <td>{$allStagiaire[i]['level_name']}</td>
                            <td>
                            {if $allStagiaire[i]['full_profile'] == 0}
                                <a class="btn bg-teal btn-block btn-xs waves-effect" href="./?p=editStagiaire&id={$allStagiaire[i]['id_user']}">Profile incomplet</a>
                            {else}
                                <a title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" 
                                    href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}" 
                                    class="btn btn-info btn-xs waves-effect">
                                    <i class="material-icons">remove_red_eye</i>
                                </a>
                                <a title="Editer {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" 
                                    href="./?p=editStagiaire&id={$allStagiaire[i]['id_user']}" 
                                    class="btn btn-success btn-xs waves-effect">
                                    <i class="material-icons">mode_edit</i>
                                </a>
                                {if $user_power==0}
                                <a title="Supprimer {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" 
                                    href="./?p=stagiaire&op=del&id={$allStagiaire[i]['id_user']}" 
                                    class="btn btn-danger btn-xs waves-effect">
                                    <i class="material-icons">delete_forever</i>
                                </a>
                                {/if}
                            {/if}
                            </td>
                          </tr>
                      {/section}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>