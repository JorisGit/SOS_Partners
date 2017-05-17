<header>
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluide">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo $link['accueil']; ?>">SOS Partner</a>
            </div>
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li><a href="<?php echo $link['accueil']; ?>">Accueil</a></li>
                    <li><a href="<?php echo $link['annonces']; ?>">Annonces</a></li>
                 </ul>
                 <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Login</b> <span class="caret"></span></a>
<<<<<<< HEAD
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="col-md-12">
                                        <form class="form" role="form" method="post" action="#" accept-charset="UTF-8" id="login-nav">
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputEmail2">Email</label>
                                                <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" required>
                                            </div>
                                            <div class="form-group">
                                                <label class="sr-only" for="exampleInputPassword2">Mot de passe</label>
                                                <input type="password" class="form-control" id="exampleInputPassword2" name="mdp" placeholder="Mot de passe" required>
                                                <div class="help-block text-right"><a href="#">Mot de passe oublié ?</a></div>
                                            </div>
                                            <div class="form-group">
                                                <button type="submit" name="valider" class="btn btn-primary btn-block">Connexion</button>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                <input type="checkbox" name="souvenir"> Se souvenir de moi
                                                </label>
                                            </div> 
                                        </form>
=======
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputEmail2">Email</label>
                                                    <input type="email" class="form-control" id="exampleInputEmail2" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="exampleInputPassword2">Mot de passe</label>
                                                    <input type="password" class="form-control" id="exampleInputPassword2" name="mdp" placeholder="Mot de passe" required>
                                                    <div class="help-block text-right"><a href="#">Mot de passe oublié ?</a></div>
                                                </div>
                                                <div class="form-group">    
                                                    <button type="submit" name="valider" class="btn btn-primary btn-block">Connexion</button>
                                                </div>
                                                <div class="checkbox">
                                                    <label>
                                                    <input type="checkbox" name="souvenir"> Se souvenir de moi
                                                    </label>
                                                </div> 
                                            </form>
                                        </div>
                                        <?php 
                                            if(substr_compare($_SERVER['REQUEST_URI'], $link['inscription'], strlen($link['inscription'])*-1, strlen($link['inscription']))) {
                                        ?>
                                        <div class="bottom text-center">
                                           Pas encore inscrit ? <a href="<?php echo $page['inscription']; ?>"><b>Inscription</b></a>
                                        </div>
                                        <?php
                                            }
                                        ?>
>>>>>>> d950c5c24b06f2c9f2d14f29ed591eb2af73f5eb
                                    </div>
                                    <?php 
                                        if(substr_compare($_SERVER['REQUEST_URI'], $link['inscription'], strlen($link['inscription'])*-1, strlen($link['inscription']))) {
                                    ?>
                                    <div class="bottom text-center">
                                        Pas encore inscrit ? <a href="<?php echo $page['inscription']; ?>"><b>Inscription</b></a>
                                    </div>
                                    <?php
                                        }
                                    ?>
                                </div>
                            </li>
                        </ul>   
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>