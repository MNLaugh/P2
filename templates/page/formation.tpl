            <!-- Exportable Table -->
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
                                <td>{$allFormation[key]['NSFORM']}</td>
                                <td>{$allFormation[key]['NLFORM']}</td>
                                <td>{$allFormation[key]['DEFORM']}</td>
                                <td>{$allFormation[key]['NIFORM']}</td>
                                <td>{$allFormation[key]['DATEIN']}</td>
                                <td>{$allFormation[key]['DATOUT']}</td>
                                <td>{$allFormation[key]['MOFORM']}</td>
                                <td style="width: 9em;">
									<a title="Voir {$allFormation[key]['NSFORM']}" 
										href="./?p=formation&op=view&id={$allFormation[key]['IDFORM']}" 
										class="btn btn-info btn-xs waves-effect">
									    <i class="material-icons">remove_red_eye</i>
									</a>
									<a title="Editer {$allFormation[key]['NSFORM']}" 
										href="./?p=formation&op=edit&id={$allFormation[key]['IDFORM']}" 
										class="btn btn-success btn-xs waves-effect">
										<i class="material-icons">mode_edit</i>
									</a>
									<a title="Supprimer {$allFormation[key]['NSFORM']}" 
										href="./?p=formation&op=del&id={$allFormation[key]['IDFORM']}" 
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




            <!-- Input -->
            <div class="row clearfix"> <!-- 2 3 5 -->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                               FORMATION
                                <small>Ajout</small>
                            </h2>
                        </div>
                        <div id="addForm" class="body">

                        <!-- 
                        Liste des variables post utilisées dans la page
                        Input list POST var : 
                        	- Nom court : sNameFormation
                        	- Nom long : lNameFormation
                        	- Niveau : levelFormation
                        	- Date de début : dInFormation
                        	- Date de fin : dOutFormation
                        	- Mode de formation : modeFormation
                        	- Bouton envoyer : addFormation
                         -->

                            <form action="#addForm" method="POST">
                                <!-- Nom de la formation 2 champs "Nom court" / "Nom complet" -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="sNameFormation" type="text" class="form-control" placeholder="Acronyme de la formation" 
                                                value="{if isset($isset_sNameFormation)}{$isset_sNameFormation}{/if}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="lNameFormation" type="text" class="form-control" placeholder="Nom complet de la formation"
                                                value="{if isset($isset_lNameFormation)}{$isset_lNameFormation}{/if}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

	                            <h2 class="card-inside-title">Description</h2>
	                            <div class="row clearfix">
	                                <div class="col-sm-12">
	                                    <div class="form-group">
	                                        <div class="form-line">
	                                            <textarea name="descFormation" rows="4" class="form-control no-resize">{if isset($isset_descFormation)}{$isset_descFormation}{else}{"Description de la formation..."}{/if}</textarea>
	                                        </div>
	                                    </div>
	                                </div>
	                            </div>

                                <!-- Niveau diploment -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-6">
							                    <select class="form-control show-tick" name="levelFormation">
							                        {html_options values=$levelFormation_values selected=$levelFormation_selected output=$levelFormation_output class="btn btn-default btn-list"}
							                    </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Date d'entrée et de sortie -->
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <b>Date de début</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input id="dateInForm" name="dInFormation" type="text" class="form-control date" placeholder="Ex: 30/07/2016"
                                                value="{if isset($isset_dInFormation)}{$isset_dInFormation}{/if}">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <b>Date de fin</b>
                                        <div class="input-group">
                                            <span class="input-group-addon">
                                                <i class="material-icons">date_range</i>
                                            </span>
                                            <div class="form-line">
                                                <input id="dateOutForm" name="dOutFormation" type="text" class="form-control date" placeholder="Ex: 25/04/2017"
                                                value="{if isset($isset_dOutFormation)}{$isset_dOutFormation}{/if}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Mode de formation -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                    <label>Mode de formation</label><br>
                                    <input name="modeFormation" value="Continue" type="radio" id="radio_11" class="radio-col-indigo" 
                                    {if $isset_modeFormation=='Continue'}{"checked"}{/if} />
                                    <label for="radio_11">Continue</label>
                                    <input name="modeFormation" value="Alternance" type="radio" id="radio_12" class="radio-col-indigo" 
                                    {if $isset_modeFormation=='Alternance'}{"checked"}{/if} />
                                    <label for="radio_12">Alternance</label>
                                    </div>
                                </div>
                                <!-- bouton d'envoi -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <input name="addFormation" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->