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
                                <td>{$allFormation[key]['NIFORMA']}</td>
                                <td>{$allFormation[key]['DATEIN']}</td>
                                <td>{$allFormation[key]['DATOUT']}</td>
                                <td>{$allFormation[key]['MOFORM']}</td>
                                <td style="width: 8em;">
<a title="Voir {$allFormation[key]['NSFORM']}" href="./?p=formation&op=view&id={$allFormation[key]['IDFORM']}" class="btn btn-info btn-xs waves-effect">
    <i class="material-icons">remove_red_eye</i>
</a>
                                    <a title="Editer" class="btn btn-success btn-xs waves-effect"><i class="material-icons">mode_edit</i></a>
                                    <a title="Supprimer" class="btn btn-danger btn-xs waves-effect"><i class="material-icons">delete_forever</i></a>
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
                        <div class="body">
                            <form action="" method="POST">
                                <!-- Nom de la formation 2 champs "Nom court" / "Nom complet" -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="sName-formation" type="text" class="form-control" placeholder="Acronyme de la formation" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="form-line">
                                                <input name="lName-formation" type="text" class="form-control" placeholder="Nom long de la formation" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Niveau diploment -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <div class="form-group">
                                            <div class="col-sm-6">
                                                <select class="form-control show-tick" name="niv-formation">
                                                    <option value="">-- Niveau diploment --</option>
                                                    <option value="10">10</option>
                                                    <option value="20">20</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Date d'entrée et de sortie -->
                                <div class="row clearfix">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="date_in">Date de début</label><br>
                                            <input id="date_in" name="dIn_formation" type="date" class="form-control" placeholder="jj/mm/aaaa" />
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label for="date_out">Date de fin</label><br>
                                            <input id="date_out" name="dOut_formation" type="date" class="form-control" placeholder="jj/mm/aaaa" />
                                        </div>
                                    </div>
                                </div>
                                <!-- Mode de formation -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                    <label>Mode de formation</label><br>
                                    <input name="mode_formation" type="radio" id="radio_11" class="radio-col-indigo" />
                                    <label for="radio_11">Continue</label>

                                    <input name="mode_formation" type="radio" id="radio_12" class="radio-col-indigo" />
                                    <label for="radio_12">Alternance</label>
                                    </div>
                                </div>
                                <!-- bouton d'envoi -->
                                <div class="row clearfix">
                                    <div class="col-sm-6">
                                        <input type="submit" class="btn bg-indigo waves-effect" value="Envoyer" />
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->