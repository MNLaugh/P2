<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    EDITION DE{if isset($uniq_stagiaire.name) && isset($uniq_stagiaire.first_name)}:&emsp;{$uniq_stagiaire.name}&emsp;{$uniq_stagiaire.first_name}{/if}
                </h2>
            </div>
            <div class="body">
            <!-- 
            Liste des variables post utilisées dans la page
            Input list POST var : 
                - 'dateBirth'         : date de naissance
                - 'adresse1'          : Adresse 1
                - 'adresse2'          : Adresse 2
                - 'adresse3'          : Adresse 3
                - 'codePostal'       : Code postal
                - 'ville'             : Ville
                - 'phone'         : Telephone
                - 'level'            : Niveau de diplome
                - 'formation'         : Formation
                - 'image'             : Avatar
                - 'editStagiaire'     : Bouton envoyer
             -->
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <h2 class="card-inside-title">Nom</h2>
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" class="form-control" value="{if isset($uniq_stagiaire.name)}{$uniq_stagiaire.name}{/if}"  disabled />
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <h2 class="card-inside-title">Prénom</h2>
                            <div class="form-group">
                                <div class="form-line">
                                   <input type="text" class="form-control" value="{if isset($uniq_stagiaire.first_name)}{$uniq_stagiaire.first_name}{/if}"  disabled />
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="card-inside-title">Adresse</h2>
                    <div class="row clearfix">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="adresse1" class="form-control" maxlength="38" placeholder="Entrée, tour, bâtiment, immeuble, résidence, zone industrielle (Optionnel)" value="{if isset($isset_adresse1)}{$isset_adresse1}{elseif $uniq_stagiaire.adresse_1!=null}{$uniq_stagiaire.adresse_1}{/if}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="adresse2" class="form-control" maxlength="38" placeholder="Numéro et libellé de la voie ou lieu dit (Obligatoire)" value="{if isset($isset_adresse2)}{$isset_adresse2}{elseif $uniq_stagiaire.adresse_2!=null}{$uniq_stagiaire.adresse_2}{/if}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="text" name="adresse3" class="form-control" maxlength="38" placeholder="Boite Postale, Tri Spécial Arrivée… (Optionnel)" value="{if isset($isset_adresse3)}{$isset_adresse3}{elseif $uniq_stagiaire.adresse_3!=null}{$uniq_stagiaire.adresse_3}{/if}"/>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="codePostal" class="form-control" maxlength="5" placeholder="Code postal" value="{if isset($isset_codePostal)}{$isset_codePostal}{elseif $uniq_stagiaire.code_postal!=0}{$uniq_stagiaire.code_postal}{/if}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="ville" class="form-control" maxlength="100" placeholder="Ville" value="{if isset($isset_ville)}{$isset_ville}{elseif $uniq_stagiaire.ville!=null}{$uniq_stagiaire.ville}{/if}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h2 class="card-inside-title">Date de naissance & Téléphone</h2>
                    <div class="row clearfix">
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input type="date" name="dateBirth" class="form-control" placeholder="Date de naissance" value="{if isset($isset_dateBirth)}{$isset_dateBirth}{elseif $uniq_stagiaire.date_naissance!=0}{$uniq_stagiaire.date_naissance}{/if}"/>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <div class="form-line">
                                    <input name="phone" class="form-control" placeholder="Téléphone" maxlength="10" value="{if isset($isset_phone)}{$isset_phone}{elseif $uniq_stagiaire.telephone!=0}{$uniq_stagiaire.telephone}{/if}"/>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row clearfix">
                        <div class="col-sm-2">
                            <b>Avatar du stagiaire</b>
                            <div class="form-group">
                                <img src="{if isset($uniq_stagiaire.file_image)}{$uniq_stagiaire.file_image}{/if}" width="48">
                                <label class="btn bg-teal btn-circle btn-file waves-circle waves-float waves-light">
                                  <i class="material-icons">publish</i>
                                  <input type="file" name="userfile" style="display: none;">
                                </label>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <b>Niveau d'étude</b>
                                <select class="form-control show-tick" name="level">
                                    {html_options values=$levelStagiairen_values selected=$levelStagiaire_selected output=$levelStagiairen_output class="btn btn-default btn-list"}
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-3">
                            <div class="form-group">
                                <b>Formation</b>
                                <select class="form-control show-tick" name="formation">
                                    {html_options values=$formation_values selected=$formation_selected output=$formation_output}
                                </select>
                            </div>
                        </div>
                    </div>
                    <!-- bouton d'envoi -->
                    <div class="row clearfix">
                        <div class="col-sm-6">
                            <input type="hidden" name="fullProfile" value="{$uniq_stagiaire.full_profile}" />
                            <input type="hidden" name="idStagiaire" value="{$uniq_stagiaire.id_user}" />
                            <input name="editStagiaire" type="submit" class="btn bg-indigo waves-effect" value="Modifier" />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>