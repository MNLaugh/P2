<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    RECHERCHE
                </h2>
            </div>
            <div class="body">
            {if isset($result)}
            	{if isset($result['user'])}
                <table class="table table-bordered table-striped table-hover dataTable">
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
                        {section name=i loop=$result['user']}
                        <tr>
                        {if $user_power==0}
                            <th>
                            	<a id="clink-stagiaire" 
                            		title="Voir {$result['user'][i]['first_name']} {$result['user'][i]['name']}"
                            		href="./?p=viewStagiaire&id={$result['user'][i]['id_user']}">
                            	{$result['user'][i]['id_user']}
                            	</a>
                            </th>
                            <td>
                            	<a id="clink-stagiaire" 
                            		title="Voir {$result['user'][i]['first_name']} {$result['user'][i]['name']}"
                            		href="./?p=viewStagiaire&id={$result['user'][i]['id_user']}">
                            	{$result['user'][i]['login']}
                            	</a>
                            </td>
                        {/if}
                            <td>
                            	<a id="clink-stagiaire" 
                            		title="Voir {$result['user'][i]['first_name']} {$result['user'][i]['name']}"
                            		href="./?p=viewStagiaire&id={$result['user'][i]['id_user']}">
                            	{$result['user'][i]['name']}
                            	</a>
                            </td>
                            <td><a id="clink-stagiaire" title="Voir {$result['user'][i]['first_name']} {$result['user'][i]['name']}" href="./?p=viewStagiaire&id={$result['user'][i]['id_user']}">{$result['user'][i]['first_name']}</a></td>
                            <td><a id="clink-stagiaire" title="Voir {$result['user'][i]['first_name']} {$result['user'][i]['name']}" href="./?p=viewStagiaire&id={$result['user'][i]['id_user']}">{$result['user'][i]['email']}</a></td>
                            <td>{$result['user'][i]['power']}</td>
                        </tr>
                      {/section}
                    </tbody>
                </table>
				{/if}
				{if isset($result['formation'])}
            	<h2>Formation trouvée(s)</h2>
                <table class="table table-bordered table-striped table-hover dataTable">
                    <thead>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Status</th>
                            <th>Type de formation</th>
                        </tr>
                    </tfoot>
                    <tbody>
                      {section name=key loop=$result['formation']}
                          <tr>
                              <td><a id="clink-formation" title="Voir {$result['formation'][key]['short_name']}" href="./?p=viewFormation&id={$result['formation'][key]['id_formation']}">{$result['formation'][key]['short_name']}</a></td>
                              <td><a id="clink-formation" title="Voir {$result['formation'][key]['short_name']}" href="./?p=viewFormation&id={$result['formation'][key]['id_formation']}">{$result['formation'][key]['long_name']}</a></td>
                              <td>{$result['formation'][key]['status']}</td>
                              <td>
                            {if $result['formation'][key]['mode'] == 0}
                                Continue
                            {else}
                                Alternance
                            {/if}
                            </td>
                          </tr>
                      {/section}
                    </tbody>
                </table>
            	{/if}
            {else}
            	<h5>Aucun résultat trouvé.</h5>
            {/if}
            </div>
        </div>
    </div>
</div>