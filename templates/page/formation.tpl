            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FORMATIONS{if isset($uniq_form.long_name)}:&emsp;{$uniq_form.long_name}{/if}
                            </h2>
                        </div>
                        <div class="body">
                            <div class="row clearfix">
                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                    {if isset($view) == 1}
                                        {$uniq_form|print_r}
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li class="active"><a href="#formation" data-toggle="tab" data-tooltip="tooltip" data-placement="top" title="La formation">&emsp;{$uniq_form.short_name}&emsp;</a></li>
                                        <li><a href="#update_formation" data-toggle="tab" data-tooltip="tooltip" data-placement="top" title="Ajout formation">&emsp;Modifier {$uniq_form.short_name}&emsp;</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Tab full list -->
                                        <div role="tabpanel" class="tab-pane animated active" id="formation">
                                            <div id="updateForm" class="body">
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
                                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">
                                                        <p>Type de formation : 
                                                        {if $uniq_form.mode == 0}
                                                            <span class="label bg-blue-grey">Continue</span>
                                                        {else}
                                                            <span class="label bg-grey">Alternance</span>
                                                        {/if}
                                                        </p>
                                                    </div>
                                                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-2">    
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
                                            </div>
                                        </div>
                                        <div role="tabpanel" class="tab-pane animated" id="update_formation">
                                            <div id="updateForm" class="body">
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
                                                                    value="{if isset($isset_sNameFormation)}{$isset_sNameFormation}{else}{$uniq_form.short_name}{/if}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <input name="lNameFormation" type="text" class="form-control" placeholder="Nom complet de la formation"
                                                                    value="{if isset($isset_lNameFormation)}{$isset_lNameFormation}{else}{$uniq_form.long_name}{/if}" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <h2 class="card-inside-title">Description</h2>
                                                    <div class="row clearfix">
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <div class="form-line">
                                                                    <textarea name="descFormation" rows="2" class="form-control no-resize" maxlength="250" placeholder="Description de la formation (200 caractères maximum)...">{if isset($isset_descFormation)}{$isset_descFormation}{else}{$uniq_form.description}{/if}</textarea>
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
                                                                    <input id="dateInForm" name="dInFormation" type="text" class="form-control date" placeholder="30/07/2016"
                                                                    value="{if isset($isset_dInFormation)}{$isset_dInFormation}{else}{convert_date_USinFR($uniq_form.date_in)}{/if}">
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
                                                                    <input id="dateOutForm" name="dOutFormation" type="text" class="form-control date" placeholder="25/04/2017"
                                                                    value="{if isset($isset_dOutFormation)}{$isset_dOutFormation}{else}{convert_date_USinFR($uniq_form.date_out)}{/if}">
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Mode de formation -->
                                                    <div class="row clearfix">
                                                        <div class="col-sm-6">
                                                        <label>Mode de formation</label><br>
                                                        <input name="modeFormation" value="Continue" type="radio" id="radio_11" class="radio-col-indigo" 
                                                        {if $isset_modeFormation=='Continue'}{"checked"}{elseif $uniq_form.mode == 0}{"checked"}{/if} />
                                                        <label for="radio_11">Continue</label>
                                                        <input name="modeFormation" value="Alternance" type="radio" id="radio_12" class="radio-col-indigo" 
                                                        {if $isset_modeFormation=='Alternance'}{"checked"}{elseif $uniq_form.mode == 1}{"checked"}{/if} />
                                                        <label for="radio_12">Alternance</label>
                                                        </div>
                                                    </div>
                                                    <!-- bouton d'envoi -->
                                                    <div class="row clearfix">
                                                        <div class="col-sm-6">
                                                            <input type="hidden" name="idFormation" value="{if isset($isset_idFormation)}{$isset_idtFormation}{else}{$uniq_form.id_formation}{/if}">
                                                            <input name="updateFormation" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                                                        </div>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    {else}
                                    <!-- Nav tabs -->
                                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                                        <li role="presentation" class="active"><a href="#full_list" data-toggle="tab" data-tooltip="tooltip" data-placement="top" title="Liste complète">Liste complète</a></li>
                                        <li role="presentation"><a href="#add_formation" data-toggle="tab" data-tooltip="tooltip" data-placement="top" title="Ajout formation">&emsp;Ajouter&emsp;</a></li>
                                    </ul>
                                    <div class="tab-content">
                                        <!-- Tab full list -->
                                        <div role="tabpanel" class="tab-pane animated active" id="full_list">
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
                		                                <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=formation&op=view&id={$allFormation[key]['id_formation']}">{$allFormation[key]['short_name']}</a></td>
                		                                <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=formation&op=view&id={$allFormation[key]['id_formation']}">{$allFormation[key]['long_name']}</a</td>
                		                                <td><a id="clink-formation" title="Voir {$allFormation[key]['short_name']}" href="./?p=formation&op=view&id={$allFormation[key]['id_formation']}">{$allFormation[key]['description']}</a</td>
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
                												href="./?p=formation&op=view&id={$allFormation[key]['id_formation']}" 
                												class="btn btn-info btn-xs waves-effect">
                											    <i class="material-icons">remove_red_eye</i>
                											</a>
                											<a title="Editer {$allFormation[key]['short_name']}" 
                												href="./?p=formation&op=edit&id={$allFormation[key]['id_formation']}" 
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
                                        <!-- Tab add formation -->
                                        <div role="tabpanel" class="tab-pane animated" id="add_formation">
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
                                                                    <textarea name="descFormation" rows="4" class="form-control no-resize" maxlength="200" placeholder="Description de la formation (200 caractères maximum)...">{if isset($isset_descFormation)}{$isset_descFormation}{/if}</textarea>
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
                                                        <input name="modeFormation" value="0" type="radio" id="radio_11" class="radio-col-indigo" 
                                                        {if $isset_modeFormation==0}{"checked"}{/if} />
                                                        <label for="radio_11">Continue</label>
                                                        <input name="modeFormation" value="1" type="radio" id="radio_12" class="radio-col-indigo" 
                                                        {if $isset_modeFormation==1}{"checked"}{/if} />
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
                                    {/if}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>