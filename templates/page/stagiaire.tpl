            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                EXPORTABLE TABLE
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
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Adresse du stagiaire</th>
                                        <th>Code postal</th>
                                        <th>Ville</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Niveau scolaire</th>
                                    </tr>
                                </thead>

                                <tfoot>
                                    <tr>
                                        <th>Nom</th>
                                        <th>Prénom</th>
                                        <th>Date de naissance</th>
                                        <th>Adresse du stagiaire</th>
                                        <th>Code postal</th>
                                        <th>Ville</th>
                                        <th>Numéro de téléphone</th>
                                        <th>Niveau scolaire</th>
                                    </tr>
                                </tfoot>
                                <tbody>
                        {section name=key loop=$allStagiaire}
                            <tr>
                                <td>{$allStagiaire[key]['NMSTAGI']}</td>
                                <td>{$allStagiaire[key]['PRSTAG']}</td>
                                <td>{$allStagiaire[key]['DNASTA']}</td>
                                <td>{$allStagiaire[key]['ASTAGI']}</td>
                                <td>{$allStagiaire[key]['CPSTAG']}</td>
                                <td>{$allStagiaire[key]['VSTAGI']}</td>
                                <td>{$allStagiaire[key]['TSTAGI']}</td>
                                <td>{$allStagiaire[key]['NDIPLO']}</td>
                                <td>Options</td>
                            </tr>
                        {/section}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
