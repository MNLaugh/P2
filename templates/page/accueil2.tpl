<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            {if $uniq_stagiaire.formation != 0}
            <div class="header">
                <h2>
                    STAGIAIRES DE LA FORMATION : {$uniq_stagiaire.formation}
                </h2>
            </div>
            <div class="body">
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Avatar</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Avatar</th>
                            <th>Nom</th>
                            <th>Prénom</th>
                            <th>Email</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        {section name=i loop=$allStagiaire}
                        <tr>
                            <td><img class="avatar-list" src="{$allStagiaire[i]['file_image']}" alt="{$allStagiaire[i]['alt_image']}"></td>
                            <td><a id="clink-stagiaire" title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}">{$allStagiaire[i]['name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}">{$allStagiaire[i]['first_name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$allStagiaire[i]['first_name']} {$allStagiaire[i]['name']}" href="./?p=viewStagiaire&id={$allStagiaire[i]['id_user']}">{$allStagiaire[i]['email']}</a></td>
                          </tr>
                      {/section}
                    </tbody>
                </table>
            </div>
            {else}
            <div class="header">
                <h2>
                    AUCUNES INFORMATIONS
                </h2>
            </div>
            {/if}
        </div>
    </div>
</div>