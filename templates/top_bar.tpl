    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <form action="" method="post">
        <input id="search" type="text" name="search" placeholder="RECHERCHE..." onkeyup="searchAutoComplete(this)">
        </form>
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
        <div id="result">
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <div class="logo"><img src="./ressources/images/GF-logo_default.png" alt="Logo" /></div>
                <a class="navbar-brand" href="./">{if isset($page)}{$pageName|capitalize} | {/if}{#title#}</a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                {if $user_power!=2}
                    <li><a href="javascript:void(0);" class="js-search" data-close="true"><i class="material-icons">search</i></a></li>
                {/if}
                </ul>
            </div>
        </div>
    </nav>
    <!-- #Top Bar -->