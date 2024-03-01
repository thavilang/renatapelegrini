<?php
// Template Name: Projetos
?>

<?php get_header(); ?>

<main id="projetos">
    <div class="container">
        <h1 class="hidden-text"><?php the_title(); ?></h1>
        <div class="grid model-1">
            <h2 class="txtupper fs32 fw400"><?php echo get_the_title(1031) ?></h2>
            <!-- Swiper -->
            <div class="swiper-projetos">
                <div class="swiper-wrapper">
                    <?php
                    $args = array( 
                        'posts_per_page'   => 6,
                        'post_type'        => 'acao-colaborativa',
                        'post_status'      => 'publish',
                    );
                    $textos = get_posts($args);
                    foreach ($textos as $post) {
                        include 'elements/colaborativa-item.php';
                    } // foreach ($textos as $post)
                    wp_reset_postdata();
                    ?>
                    <div class="swiper-slide">
                        <a class="txtupper" href="<?php echo get_the_permalink(1031) ?>">
                            <p>+</p>
                            <span>
                                veja mais
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid model-2">
            <h2 class="txtupper fs32 fw400"><?php echo get_the_title(1033) ?></h2>
            <!-- Swiper -->
            <div class="swiper-projetos">
                <div class="swiper-wrapper">
                    <?php
                    $args = array( 
                        'posts_per_page'   => 6,
                        'post_type'        => 'postagem',
                        'post_status'      => 'publish',
                    );
                    $textos = get_posts($args);
                    foreach ($textos as $post) {
                        include 'elements/colaborativa-item.php';
                    } // foreach ($textos as $post)
                    wp_reset_postdata();
                    ?>
                    <div class="swiper-slide">
                        <a class="txtupper" href="<?php echo get_the_permalink(1033) ?>">
                            <span>+</span>
                            <span>
                                veja mais
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="grid model-3">
            <h2 class="txtupper fs32 fw400"><?php echo get_the_title(1035) ?></h2>
            <!-- Swiper -->
            <div class="swiper-projetos">
                <div class="swiper-wrapper">
                    <?php
                    $args = array( 
                        'posts_per_page'   => 6,
                        'post_type'        => 'publicacao',
                        'post_status'      => 'publish',
                    );
                    $textos = get_posts($args);
                    foreach ($textos as $post) {
                        include 'elements/colaborativa-item.php';
                    } // foreach ($textos as $post)
                    wp_reset_postdata();
                    ?>
                    <div class="swiper-slide">
                        <a class="txtupper" href="<?php echo get_the_permalink(1035) ?>">
                            <span>+</span>
                            <span>
                                veja mais
                            </span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>