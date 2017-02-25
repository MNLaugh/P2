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
                            <th>Description</th>
                            <th>Niveau aquis</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Type de formation</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nom</th>
                            <th>Nom complet</th>
                            <th>Description</th>
                            <th>Niveau acquis</th>
                            <th>Date de début</th>
                            <th>Date de fin</th>
                            <th>Type de formation</th>
                            <th>Options</th>
                        </tr>
                    </tfoot>
                    <tbody>
    		          {section name=key loop=$allFormation}
    		              <tr>
    		                  <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=viewFormation&id={$allFormation[key]['id_formation']}">{$allFormation[key]['short_name']}</a></td>
    		                  <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=viewFormation&id={$allFormation[key]['id_formation']}">{$allFormation[key]['long_name']}</a</td>
    		                  <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=viewFormation&id={$allFormation[key]['id_formation']}">{$allFormation[key]['description']}</a</td>
    		                  <td>{$allFormation[key]['level_name']}</td>
    		                  <td>{convert_date_USinFR($allFormation[key]['date_in'])}</td>
    		                  <td>{convert_date_USinFR($allFormation[key]['date_out'])}</td>
    		                  <td>
                            {if $allFormation[key]['mode'] == 0}
                                Continue
                            {else}
                                Alternance
                            {/if}
                            </td>
    		                  <td style="width: 9em;">
    							<a title="Voir {$allFormation[key]['short_name']}" 
    								href="./?p=viewFormation&id={$allFormation[key]['id_formation']}" 
    								class="btn btn-info btn-xs waves-effect">
    							    <i class="material-icons">remove_red_eye</i>
    							</a>
    							<a title="Editer {$allFormation[key]['short_name']}" 
    								href="./?p=editFormation&id={$allFormation[key]['id_formation']}" 
    								class="btn btn-success btn-xs waves-effect">
    								<i class="material-icons">mode_edit</i>
    							</a>
    							<a title="Supprimer {$allFormation[key]['short_name']}" 
    								href="./?p=formation&op=del&id={$allFormation[key]['id_formation']}" 
    								class="btn btn-danger btn-xs waves-effect">
    								<i class="material-icons">delete_forever</i>
    							</a>
    		                  </td>
    		              </tr>
    		          {/section}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>