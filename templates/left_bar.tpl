    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar" {if $user_power==2}style="height: auto;"{/if}>

        {if $loggedin==true}
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="{$user_img}" width="48" height="48" alt="{$user_img_alt}" />
                </div>
                <div class="info-container">
                    <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">{$user_login}</div>
                    <div class="email">{$user_email}</div>
                    <div class="power">{$user_textuel_power}</div>
                    <div class="today">{$today}</div>
                    <div class="btn-group user-helper-dropdown">
                        <i class="material-icons" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">keyboard_arrow_down</i>
                        <ul class="dropdown-menu pull-right">
                            <li><a href="./?p=viewStagiaire&id={$id_user}"><i class="material-icons">person</i>Ma fiche</a></li>
                            <li role="seperator" class="divider"></li>
                            <li><a href="./?logged=out"><i class="material-icons">input</i>Déconnexion</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <!-- #User Info -->
        {/if}
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    {if $user_power!=2}
                    <li class="header">MENU NAVIGATION</li>
                    {if isset($left_menu)}{$left_menu}{/if}
                    {/if}
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal" {if $user_power==2}style="top: 81%;"{/if}>
                <div class="copyright">
                    &copy; DISII 2016/2017 <a href="javascript:void(0);">- GestiForm</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
    </section>