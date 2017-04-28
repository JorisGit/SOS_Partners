<div id="bjn-carousel" class="carousel slide" data-ride="carousel">
    <!-- Bulles -->
    <ol class="carousel-indicators">
        <li data-target="#bjn-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#bjn-carousel" data-slide-to="1"></li>
        <li data-target="#bjn-carousel" data-slide-to="2"></li>
    </ol>
    <!-- Slides -->
    <div class="carousel-inner">
        <!-- Page 1 -->
        <div class="item active">
            <img src="<?php echo $path['img']; ?>slider1.jpg" class="img-responsive" style="width: 100%;"/>
            <div class="carousel-caption">Trouvez votre bonheur dans le sport</div>
        </div>
        <!-- Page 2 -->
        <div class="item">
            <img src="<?php echo $path['img']; ?>slider2.jpg"  class="img-responsive" style="width: 100%;"/>
             <div class="carousel-caption">Dépassez vos limites</div>
        </div>
        <!-- Page 3 -->
        <div class="item">
            <img src="<?php echo $path['img']; ?>slider3.jpg" style="width: 100%;"/>
            <div class="carousel-caption">Trouvez votre partenaire de sport</div>
        </div>
    </div>
    <!-- Contrôles -->
    <a class="left carousel-control" href="#bjn-carousel" data-slide="prev">
        <span class="glyphicon glyphicon-chevron-left"></span>
    </a>
    <a class="right carousel-control" href="#bjn-carousel" data-slide="next">
        <span class="glyphicon glyphicon-chevron-right"></span>
    </a>
</div>
<section id="bienvenue" class="container-fluid">
    <div class="heading">
        <h1>Bienvenue sur SOS Partner!</h1>
        <h3>Le site où vous trouverez votre partenaire</h3>
        <a href="inscription.php" class="bouton1">Inscrivez-vous</a>
    </div>
</section>