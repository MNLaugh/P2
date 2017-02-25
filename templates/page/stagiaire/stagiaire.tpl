<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    STAGIAIRES
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
                            <th>Formation</th>
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
                            <th>Formation</th>
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
                            <td>{$allStagiaire[i]['id_formation']}</td>
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