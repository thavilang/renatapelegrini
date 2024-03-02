<?php
// Template Name: Projetos
?>

<?php get_header(); ?>

<main>
    <h1 class="hidden-text"><?php the_title(); ?></h1>
    <section class="bloco-acoes-colaborativas">
        <div class="container">
            <h2 class="txtupper fs32"><?php echo get_the_title(pll_get_post(1031, pll_current_language())); ?></h2>
            <div js-swiper="acoes-colaborativas">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'posts_per_page'   => 6,
                        'post_type'        => 'acao-colaborativa',
                        'post_status'      => 'publish',
                    );
                    $acoes_colaborativas = get_posts($args);
                    foreach ($acoes_colaborativas as $post) { ?>
                        <div class="swiper-slide">
                            <?php include 'elements/post-item.php'; ?>
                        </div>
                    <?php } // foreach ($acoes_colaborativas as $post)
                    wp_reset_postdata();
                    ?>
                    <div class="swiper-slide">
                        <a class="ver-mais" href="<?php echo get_the_permalink(pll_get_post(1031, pll_current_language())) ?>">+ ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bloco-blog">
        <div class="container">
            <h2 class="txtupper fs32"><?php echo get_the_title(pll_get_post(1033, pll_current_language())); ?></h2>
            <div js-swiper="blog">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'posts_per_page'   => 6,
                        'post_type'        => 'postagem',
                        'post_status'      => 'publish',
                    );
                    $blog = get_posts($args);
                    foreach ($blog as $post) { ?>
                        <div class="swiper-slide">
                            <?php include 'elements/post-item.php'; ?>
                        </div>
                    <?php } // foreach ($blog as $post)
                    wp_reset_postdata();
                    ?>
                    <div class="swiper-slide">
                        <a class="ver-mais" href="<?php echo get_the_permalink(pll_get_post(1033, pll_current_language())) ?>">+ ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="bloco-publicacao">
        <div class="container">
            <h2 class="txtupper fs32"><?php echo get_the_title(pll_get_post(1035, pll_current_language())); ?></h2>
            <div js-swiper="publicacao">
                <div class="swiper-wrapper">
                    <?php
                    $args = array(
                        'posts_per_page'   => 6,
                        'post_type'        => 'publicacao',
                        'post_status'      => 'publish',
                    );
                    $publicacoes = get_posts($args);
                    foreach ($publicacoes as $post) { ?>
                        <div class="swiper-slide">
                            <?php include 'elements/post-item.php'; ?>
                        </div>
                    <?php } // foreach ($publicacoes as $post)
                    wp_reset_postdata();
                    ?>
                    <div class="swiper-slide">
                        <a class="ver-mais" href="<?php echo get_the_permalink(pll_get_post(1035, pll_current_language())) ?>">+ ver mais</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<?php get_footer(); ?>