<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/assets/images/favicon.png" type="image/png">
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>
    <?php include '_loader.php'; ?>
    <div id="skip-to-main">
        <a href="#main-content">Skip to main content</a>
    </div>
    <div class="no-overflow">
        <header>
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a href="<?php echo pll_home_url() ?>" class="logo"><?php include 'assets/images/logo.svg'; ?></a>
                    </div>
                    <div class="col-auto">
                        <div class="d-flex align-items-center">
                            <nav class="aberto">
                                <?php
                                wp_nav_menu(array(
                                    'theme_location' => 'header-menu',
                                    'container' => false,
                                    'depth' => '0',
                                ));
                                ?>
                            </nav>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'linguagem',
                                'container' => false,
                                'depth' => '0',
                            ));
                            ?>
                            <button class="toggle-menu" js-button-menu>
                                MENU
                                <canvas></canvas>
                                <canvas></canvas>
                                <canvas></canvas>
                            </button>
                        </div>
                        <nav class="fechado" js-menu>
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'header-menu',
                                'container' => false,
                                'depth' => '0',
                            ));
                            ?>
                        </nav>
                    </div>
                </div>
            </div>
        </header>