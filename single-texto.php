<?php get_header(); ?>

<main class="texto">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <a class="breadcrumb" href="<?php echo get_the_permalink(pll_get_post(61, pll_current_language())) ?>">
                    <?php include 'assets/images/seta.svg'; ?>
                    <span><?php echo get_the_title(pll_get_post(61, pll_current_language())); ?></span>
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