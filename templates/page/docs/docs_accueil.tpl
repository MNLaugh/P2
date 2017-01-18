<div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                LANGAGE
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled">
                                <li>HTML</li>
                                    <ul>
                                        <li>Bootstrap</li>
                                    </ul>
                                <li>CSS</li>
                                    <ul>
                                        <li>Bootstrap</li>
                                    </ul>
                                <li>JavaScript</li>
                                    <ul>
                                        <li>jQuery</li>
                                        <li>Bootstrap</li>
                                    </ul>
                                <li>SQL</li>
                                    <ul>
                                        <li>MySQL</li>
                                    </ul>
                                <li>
                                    PHP
                                    <ul>
                                        <li>Smarty</li>
                                        <li>Class php</li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card">
                        <div class="header">
                            <h2>
                                MODULES
                            </h2>
                        </div>
                        <div class="body">
                            <ul class="list-unstyled">
                            {foreach $modulesList as $val}
                                <li><pre>{$val|print_r}</pre></li>
                            {/foreach}
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                PRESENTATION
                            </h2>
                        </div>
                        <div class="body">
                            <p>Présentation...</p>
                        </div>
                    </div>
                </div>
            </div>