            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                FORMATIONS
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
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
                                <tbody id="deux">
                        {section name=key loop=$allFormation}
                            <tr>
                                <td>{$allFormation[key]['NSFORM']}</td>
                                <td>{$allFormation[key]['NLFORM']}</td>
                                <td>{$allFormation[key]['DEFORM']}</td>
                                <td>{$allFormation[key]['NIFORMA']}</td>
                                <td>{$allFormation[key]['DATEIN']}</td>
                                <td>{$allFormation[key]['DATOUT']}</td>
                                <td>{$allFormation[key]['MOFORM']}</td>
                                <td>Options</td>
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
                            <div class="row clearfix">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Acronyme de la formation" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="text" class="form-control" placeholder="Nom long de la formation" />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Input -->