<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mount Blanco</title>
    <?php wp_head(); ?>
</head>
<body>

    <section class="pre-header">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 left">
                    <?php dynamic_sidebar('pre-header-left'); ?>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 right">
                    <?php dynamic_sidebar('pre-header-right'); ?>
                </div>
            </div>
        </div>
    </section>

    <header class="header">
        <div class="container">
            <div class="row">
                <nav class="navbar">
                    <button class="navbar-toggler order-2" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-bars"></i>
                    </button>
                    <?php the_custom_logo(); ?>
                    <div class="nav navbar-collapse collapse order-3" id="navbarSupportedContent">
                        <?php wp_nav_menu(
                            array(
                                'theme_location' => 'header-menu',
                            )
                        );
                        ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>