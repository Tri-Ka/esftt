<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a href="<?php echo url_for('@homepage'); ?>" class="navbar-brand">ESFTT - La Frette sur Seine</a>
            <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Photos</a></li>
                <li><a href="<?php echo url_for('informations'); ?>">Informations</a></li>
                <li><a href="<?php echo url_for('results_show'); ?>">Résultats</a></li>
                <li><a href="<?php echo url_for('forum'); ?>">Forum</a></li>
                <li><a href="#">Contact</a></li>
            </ul>
        </div>
      </div>
</nav>

<header class="header">

    <section class="slice visible-tablet  visible-desktop">
        <section class="container">
            <div id="carousel" class="carousel slide col-md-5" data-interval="5000" data-ride="carousel">
                <!-- Carousel indicators -->
                <ol class="carousel-indicators">
                    <li data-target="#carousel" data-slide-to="0" class="active"></li>
                    <li data-target="#carousel" data-slide-to="1"></li>
                    <li data-target="#carousel" data-slide-to="2"></li>
                </ol>
                <!-- Carousel items -->
                <div class="carousel-inner">
                    <div class="item active">
                        <div>
                            <img src="/images/pongiste.png">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="/images/photo-home.png">
                        </div>
                    </div>
                    <div class="item">
                        <div>
                            <img src="/images/new-ws2.png">
                        </div>
                    </div>
                </div>
                <!-- Carousel nav -->
                <!-- <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left"></span>
                </a>
                <a class="carousel-control right" href="#myCarousel" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right"></span>
                </a> -->
            </div>

            <div class="col-md-5 logo-col hidden-phone">
                <!-- <div class="logo">
                    <h1>ESFTT</h1>
                    <p>La Frette Tennis de Table</p>
                </div> -->
                <div class="logo">
                    <img src="/images/logo-new2.png">
                </div>
            </div>

        </section>
    </section><!--end slice desktop-->
    <!-- <section class="slice mobile visible-phone">
        <section class="container">
            <h2>Portfolio de Benjamin</h2>
            <h3>Développeur web</h3>
        </section>
    </section> -->
</header>