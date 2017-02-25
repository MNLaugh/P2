<body class="login-page ls-closed">
    <div class="login-box">
        <center>
        <div class="logo-login center">
            <a href="javascript:void(0);"><img src="./ressources/images/GF-logo_default.png"></a>
            <small class="small-login">Gestionnaire de formation- <b>GestiForm</b></small>
        </div>
        </center>
        <div class="card card-login">
            <div class="body">
                <form id="sign_in" method="POST" novalidate="novalidate">
                    <div class="msg">Vous devez disposer d'identifiants de connexion pour accéder au site.</div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="username" placeholder="Nom d'utilisateur" required="" autofocus="" aria-required="true" type="text">
                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                        <div class="form-line">
                            <input class="form-control" name="password" placeholder="Mot de passe" required="" aria-required="true" type="password">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5">
                            <button class="btn btn-block bg-grey waves-effect" type="submit" name="login">CONNEXION</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Jquery Core Js -->
    <script src="./ressources/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap Core Js -->
    <script src="./ressources/plugins/bootstrap/js/bootstrap.js"></script>
    <!-- Waves Effect Plugin Js -->
    <script src="./ressources/plugins/node-waves/waves.js"></script>
    <!-- Validation Plugin Js -->
    <script src="./ressources/plugins/jquery-validation/jquery.validate.js"></script>
    <!-- Custom Js -->
    <script src="./ressources/js/admin.js"></script>
    <script src="./ressources/js/pages/examples/sign-in.js"></script>