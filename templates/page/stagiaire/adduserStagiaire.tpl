<!-- Exportable Table -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    AJOUTER UN UTILISATEUR
                </h2>
            </div>
            <div class="body">
                <div class="row clearfix">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <div id="updateForm" class="body">
                        <!-- 
                        Liste des variables post utilisées dans la page
                        Input list POST var : 
                            - Nom : name
                            - Prénom : firstname
                            - Email : email
                            - Permission : power
                         -->
                            <form action="" method="POST">
                                <div class="row clearfix">
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="name" type="text" class="form-control" placeholder="Nom" 
                                                value="{if isset($isset_name)}{$isset_name}{/if}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="firstname" type="text" class="form-control" placeholder="Prénom"
                                                value="{if isset($isset_firstname)}{$isset_firstname}{/if}" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="email" type="email" class="form-control" placeholder="Adresse mail"
                                                value="{if isset($isset_email)}{$isset_email}{/if}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Niveau diploment -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="power">
                                                    {html_options values=$power_values selected=$power_selected output=$power_output class="btn btn-default btn-list"}
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- bouton d'envoi -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <input name="adduser" type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>