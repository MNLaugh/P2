<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12 clearfix">
        <div class="card">
            <div class="header">
                <h2>
                    STAGIAIRE :&emsp;{$uniq_stagiaire.name} {$uniq_stagiaire.first_name}
                </h2>
            </div>
            <div class="body clearfix">
                <div class="col-xs-6 col-sm-6 col-md-2 col-lg-2">
                    <img src="{$stag_img}" alt="{$stag_img_alt}" width="150"/>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <p>{$uniq_stagiaire.date_naissance}</p>
                    <p>{$uniq_stagiaire.telephone}</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <p>{$uniq_stagiaire.adresse_1}</p>
                    <p>{$uniq_stagiaire.adresse_2}</p>
                    <p>{$uniq_stagiaire.adresse_3}</p>
                    <p>{$uniq_stagiaire.code_postal} {$uniq_stagiaire.ville}</p>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
                        <p>Formation : 
                            <span class="label bg-blue-grey">{$uniq_stagiaire.formation}</span>
                        </p>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">    
                        <p> Niveau d'étude : <span class="label bg-blue-grey">{$uniq_stagiaire.level_name}</span></p>
                    </div>
                </div>
                {if $uniq_stagiaire.password!=null}
                <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <button class="btn bg-blue-grey waves-effect m-b-15" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false"
                            aria-controls="collapseExample">
                        Voir mes identifiant de connexion
                    </button>
                    <div class="collapse" id="collapseExample">
                        <div class="well">
                            <p>Nom d'utilisateur : {$uniq_stagiaire.login}</p>
                            <p>Mot de passe : {$uniq_stagiaire.password}</p>
                        </div>
                    </div>
                </div>
                {/if}
            </div>
        </div>
    </div>
</div>