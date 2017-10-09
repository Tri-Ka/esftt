<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//FR" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>

        <!-- for Facebook -->
        <meta property="og:title" content="<?php echo get_slot('page_title', 'ESFTT - La Frette sur Seine'); ?>" />
        <meta property="og:type" content="article" />
        <meta property="og:image" content="<?php echo get_slot('page_image', public_path('images/default-gallery.jpg', true)); ?>" />
        <meta property="og:url" content="<?php echo get_slot('page_url', url_for('@homepage', true)) ?>" />
        <meta property="og:description" content="<?php echo get_slot('page_description', 'ESFTT - La Frette sur Seine'); ?>" />

        <!-- for Twitter -->
        <meta name="twitter:card" content="summary" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:description" content="" />
        <meta name="twitter:image" content="" />

        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="<?php echo public_path('favicon.ico') ?>?v2" />

    </head>
    <body>

        <script>
          window.fbAsyncInit = function() {
            FB.init({
              appId      : '1659307854309814',
              xfbml      : true,
              version    : 'v2.4'
            });
          };

          (function(d, s, id){
             var js, fjs = d.getElementsByTagName(s)[0];
             if (d.getElementById(id)) {return;}
             js = d.createElement(s); js.id = id;
             js.src = "//connect.facebook.net/fr_FR/sdk.js";
             fjs.parentNode.insertBefore(js, fjs);
           }(document, 'script', 'facebook-jssdk'));
        </script>

        <header>
            <div class="container-fluid">
                <div class="container">
                    <nav class="navbar">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav">
                                <li class="visible-xs visible-lg"><a href="<?php echo url_for('homepage'); ?>" class="hvr-bounce-to-top">Accueil</a></li>
                                <li><a href="<?php echo url_for('club'); ?>" class="hvr-bounce-to-top">Le Club</a></li>
                                <li><a href="<?php echo url_for('gallery'); ?>" class="hvr-bounce-to-top">Galerie</a></li>
                                <li><a href="<?php echo url_for('infos'); ?>" class="hvr-bounce-to-top">Infos</a></li>
                                <li><a href="<?php echo url_for('contact'); ?>" class="hvr-bounce-to-top">Contact</a></li>
                                <li>
                                    <a href="<?php echo url_for('forum'); ?>" class="hvr-bounce-to-top forum-link">
                                        Privé
                                        <span class="count-container" data-url="<?php echo url_for('new_post_count'); ?>"></span>
                                    </a>
                                </li>
                            </ul>
                            <ul class="nav navbar-nav social-nav">
                                <li><a target="_blank" href="<?php echo sfConfig::get('app_url_facebook'); ?>" class="facebook hvr-bounce-in"><i class="fa fa-facebook"></i></a></li>
                                <!-- <li><a target="_blank" href="<?php echo sfConfig::get('app_url_twitter'); ?>" class="twitter hvr-bounce-in"><i class="fa fa-twitter"></i></a></li> -->
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </nav>

                    <h1>
                        <a id="logo" href="<?php echo url_for('homepage'); ?>">
                            <img src="<?php echo public_path('images/logo-new.png'); ?>" alt="esftt" title="esftt">
                        </a>
                    </h1>
                </div>
            </div>
        </header>

        <div id="main-container" class="container-fluid">
            <?php if ($sf_user->hasFlash('notice')): ?>
                <div class="flash notice">
                    <?php echo $sf_user->getFlash('notice') ?>
                </div>
            <?php endif ?>

            <?php if ($sf_user->hasFlash('error')): ?>
                <div class="flash error">
                    <?php echo $sf_user->getFlash('error') ?>
                </div>
            <?php endif ?>

            <?php if ('homepage' == $sf_params->get('module')): ?>
                <div class="row slider-full">
                    <?php include_component('homepage', 'slider'); ?>
                </div>
            <?php endif; ?>

            <div class="container">
                <?php echo $sf_content ?>
            </div>
        </div>

        <footer>
            <div class="container-fluid">
                <div class="container">
                    <div class="row">
                        <div class="col-xs-12 col-sm-4  text-center">
                            <ul class="links">
                                <li>
                                    <a target="blank" href="<?php echo sfConfig::get('app_url_fftt'); ?>">Site de la fédération</a>
                                </li>

                                <li>
                                    <a target="blank" href="<?php echo sfConfig::get('app_url_tennis_de_table'); ?>">Tennis-de-Table.com</a>
                                </li>

                                <li>
                                    <a target="blank" href="http://www.fftt-idf.com/">Ligue FFTT Ile de France</a>
                                </li>

                                <li>
                                    <a target="blank" href="http://theo384.free.fr/">Friendship Sport</a>
                                </li>

                                <li>
                                    <a target="blank" href="http://www.ville-la-frette95.fr/">Mairie de la Frette sur Seine</a>
                                </li>

                                <li>
                                    <a target="blank" href="http://www.ville-cormeilles95.fr/">Mairie de Cormeilles en Parisis</a>
                                </li>

                                <li>
                                    <a target="blank" href="http://www.cd95tt.fr/">Comité 95</a>
                                </li>
                            </ul>
                        </div>

                        <div class="col-xs-12 col-sm-4 text-center">
                            Salle Albert Marquet, <br>
                            avenue des Lilas, 95530 <br>
                            la Frette sur Seine.<br />
                            <!-- <a href="tel:0139781889"><i class="fa fa-phone"></i> 01 39 78 18 89</a><br> -->
                        </div>

                        <div class="col-xs-12 col-sm-4 text-center">
                            <iframe class="thumbnail" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2619.3882387855538!2d2.182864649212645!3d48.96513355470489!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNDjCsDU3JzU1LjciTiAywrAxMCc1NS4zIkU!5e0!3m2!1sfr!2sfr!4v1441530564349" width="100%" height="200" frameborder="0" style="margin-bottom:0"></iframe>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <span class="small">© ESFTT <?php echo date('Y'); ?> - Tous droits réservés</span>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>

    <?php include_javascripts() ?>

    <script>
        (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
        })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

        ga('create', 'UA-67115015-1', 'auto');
        ga('send', 'pageview');

    </script>

    <script type="text/javascript">
        /* * * CONFIGURATION VARIABLES * * */
        var disqus_shortname = 'esftt';

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function() {
            var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
            dsq.src = '//' + disqus_shortname + '.disqus.com/embed.js';
            (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
        })();

        /* * * DON'T EDIT BELOW THIS LINE * * */
        (function () {
            var s = document.createElement('script'); s.async = true;
            s.type = 'text/javascript';
            s.src = '//' + disqus_shortname + '.disqus.com/count.js';
            (document.getElementsByTagName('HEAD')[0] || document.getElementsByTagName('BODY')[0]).appendChild(s);
        }());
    </script>

</html>
