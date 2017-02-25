<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-cyan hover-expand-effect">
        <div class="icon">
            <i class="material-icons">playlist_add_check</i>
        </div>
        <div class="content">
            <div class="text">FORMATIONS</div>
            <div class="number count-to" data-from="0" data-to="{$nbFormation}" data-speed="1000" data-fresh-interval="20">{$nbFormation}</div>
        </div>
    </div>
</div>
<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
    <div class="info-box bg-orange hover-expand-effect">
        <div class="icon">
            <i class="material-icons">person_add</i>
        </div>
        <div class="content">
            <div class="text">STAGIAIRES</div>
            <div class="number count-to" data-from="0" data-to="{$nbStagiaire}" data-speed="1000" data-fresh-interval="20">{$nbStagiaire}</div>
        </div>
    </div>
</div>
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    FORMATIONS
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Niveau aquis</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                            <th>Nombre d'étudiant</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Niveau acquis</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                            <th>Nombre d'étudiant</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      {section name=key loop=$allFormation}
                          <tr>
                              <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=viewFormation&id={$allFormation[key]['id_formation']}">{$allFormation[key]['short_name']}</a></td>
                              <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=viewFormation&id={$allFormation[key]['id_formation']}">{$allFormation[key]['long_name']}</a</td>
                              <td>{$allFormation[key]['level_name']}</td>
                              <td>{$allFormation[key]['status']}</td>
                              <td>
                            {if $allFormation[key]['mode'] == 0}
                                Continue
                            {else}
                                Alternance
                            {/if}
                            </td>
                              <td style="width: 9em;">
                                {$allFormation[key]['nbstagiaire']}
                              </td>
                          </tr>
                      {/section}
                    </tbody>
                </table>
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
                    UTILISATEURS
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                    <thead>
                        <tr>
                            {if $user_power==0}<th>ID</th>{/if}
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            {if $user_power==0}<th>ID</th>{/if}
                            <th>Nom d'utilisateur</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                            <th>Rôle</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {section name=i loop=$listUser}
                        <tr>
                            {if $user_power==0}<th>{$listUser[i]['id_user']}</th>{/if}
                            <td>{$listUser[i]['login']}</td>
                            <td><a id="clink-stagiaire" title="Voir {$listUser[i]['first_name']} {$listUser[i]['name']}" href="./?p=viewStagiaire&id={$listUser[i]['id_user']}">{$listUser[i]['name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$listUser[i]['first_name']} {$listUser[i]['name']}" href="./?p=viewStagiaire&id={$listUser[i]['id_user']}">{$listUser[i]['first_name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$listUser[i]['first_name']} {$listUser[i]['name']}" href="./?p=viewStagiaire&id={$listUser[i]['id_user']}">{$listUser[i]['email']}</a></td>
                            <td>{$listUser[i]['power']}</td>
                          </tr>
                      {/section}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>