<?php
// Template Name: Texto
?>

<?php get_header(); ?>

<main class="texto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="breadcrumb" href="https://renatapelegrini.thavi.dev/textos/">
                    <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M-2.84124e-07 6.5L6 0.870834L6 12.1292L-2.84124e-07 6.5Z" fill="#B6B6B6" />
                    </svg>
                    <span>Textos</span>
                </a>
                <div class="box">
                    <h1 class="txtupper fs22"><?php echo get_the_title($post->ID) ?></h1>
                    <p class="txtupper fw400"><?php echo get_field('autor', $post->ID) ?></p>
                </div>
                <div class="content">
                    <div class="editor">
                        <?php echo get_field('conteudo', $post->ID) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>