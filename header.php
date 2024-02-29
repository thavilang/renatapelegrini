<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class() ?>>

    <div id="skip-to-main">
        <a href="#main-content">Skip to main content</a>
    </div>
    <div class="no-overflow">
        <header>
            <div class="container-fluid">
                <div class="row justify-content-between align-items-center">
                    <div class="col-auto">
                        <a href="<?php echo site_url() ?>" class="logo">CLIQUE PARA IR PARA A HOME<?php include 'assets/images/logo.svg'; ?></a>
                    </div>
                    <div class="col-auto">
                        <nav class="aberto">
                            <?php
                            wp_nav_menu(array(
                                'theme_location' => 'header-menu',
                                'container' => false,
                                'depth' => '0',
                            ));
                            ?>
                        </nav>
                        <button class="toggle-menu" js-button-menu>
                            MENU
                            <canvas></canvas>
                            <canvas></canvas>
                            <canvas></canvas>
                        </button>
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