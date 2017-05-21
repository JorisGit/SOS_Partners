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
                 <?php if(isset($_SESSION['pseudo'])){?>
                    <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b><?php echo $_SESSION['pseudo'] ?></b> <span class="caret"></span></a>
                        <ul id="login-dp" class="dropdown-menu">
                            <li>
                                <div class="row">
                                    <div class="avatarHeader">
                                        <img src="<?php echo $path['img'].'avatars/'.$_SESSION['avatar'];?>" class="avatar img-circle img-thumbnail" alt="avatar" style="width:35%;margin-left:34%;">
                                    </div>
                                    <div class="bottom text-center">
                                        <span class="glyphicon glyphicon-user" aria-hidden="true"> </span>
                                        <a href=""><b>Profil</b></a>
                                    </div>
                                    <div class="bottom text-center">
                                        <span class="glyphicon glyphicon-off" aria-hidden="true"> </span>
                                        <a href="<?php echo $link['deconnexion']; ?>"><b>Se deconnecter</b></a>
                                    </div>
                                </div>
                            </li>
                        </ul>   
                    </li>
                </ul>
                 <?php } else {?>
                 <ul class="nav navbar-nav navbar-right">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><b>Se connecter</b> <span class="caret"></span></a>
                            <ul id="login-dp" class="dropdown-menu">
                                <li>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <form class="form" role="form" method="post" action="" accept-charset="UTF-8" id="login-nav">
                                                <div class="form-group">
                                                    <label class="sr-only" for="emailLog">Email</label>
                                                    <input type="email" class="form-control" id="emailLog" name="email" placeholder="Email" required>
                                                </div>
                                                <div class="form-group">
                                                    <label class="sr-only" for="mdpLog">Mot de passe</label>
                                                    <input type="password" class="form-control" id="mdpLog" name="mdp" placeholder="Mot de passe" required>
                                                    <div class="help-block center"><a href="#">Mot de passe oublié ?</a></div>
                                                </div>
                                                <div class="form-group">    
                                                    <button type="submit" name="valider" class="btn btn-primary btn-block">Connexion</button>
                                                </div>
                                                <div class="checkbox center">
                                                    <label><input type="checkbox" name="souvenir">Se souvenir de moi</label>
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
                                    </div>
                                </li>
                            </ul>   
                    </li>
                </ul>
                 <?php }?>
            </div>
        </div>
    </nav>
</header>