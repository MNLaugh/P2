<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    MISE A JOUR FORMATIONS{if isset($uniq_form.long_name)}:&emsp;{$uniq_form.long_name}{/if}
                </h2>
            </div>
            <div class="body">
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
                <form action="" method="POST">
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
                        {if isset($isset_modeFormation) && $isset_modeFormation=='Continue'}{"checked"}{elseif $uniq_form.mode == 0}{"checked"}{/if} />
                        <label for="radio_11">Continue</label>
                        <input name="modeFormation" value="Alternance" type="radio" id="radio_12" class="radio-col-indigo" 
                        {if isset($isset_modeFormation) && $isset_modeFormation=='Alternance'}{"checked"}{elseif $uniq_form.mode == 1}{"checked"}{/if} />
                        <label for="radio_12">Alternance</label>
                        </div>
                    </div>
                    <!-- bouton d'envoi -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <input type="hidden" name="idFormation" value="{$uniq_form.id_formation}">
                            <input name="updateFormation" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>