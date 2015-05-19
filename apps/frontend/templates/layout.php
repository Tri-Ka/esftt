<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <?php include_http_metas() ?>
        <?php include_metas() ?>
        <?php include_title() ?>
        <?php include_stylesheets() ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="shortcut icon" href="/favicon.ico" />
    </head>
    <body>

        <header>
            <div class="container-fluid">
                <div class="container text-center">
                    <a id="logo" href="<?php echo url_for('homepage'); ?>">
                        <img src="<?php echo public_path('images/logo.png'); ?>">
                    </a>
                </div>
            </div>
        </header>

        <div id="main-container" class="container-fluid">

            <div class="container">
                <?php echo $sf_content ?>
            </div>

        </div>

        <footer>
            <div class="container-fluid">
                <div class="container">
                    eeee
                </div>
            </div>
        </footer>

    </body>


    <?php include_javascripts() ?>

</html>
