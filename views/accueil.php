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
            <div class="carousel-page">
                <img src="<?php echo $path['img']; ?>slider1.jpg" class="img-responsive" style="margin:0px auto;" />
            </div> 
            <div class="carousel-caption">Trouvez votre bonheur dans le sport</div>
        </div>   
        <!-- Page 2 -->
        <div class="item"> 
            <div class="carousel-page">
                <img src="<?php echo $path['img']; ?>slider2.jpg" class="img-responsive" style="margin:0px auto;"  />
            </div> 
        <div class="carousel-caption">Dépassez vos limites</div>
        </div>  
        <!-- Page 3 -->
        <div class="item">  
            <div class="carousel-page">
                <img src="<?php echo $path['img']; ?>slider3.jpg" class="img-responsive img-rounded" style="margin:0px auto;"  />
            </div>  
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