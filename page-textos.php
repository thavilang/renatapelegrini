<?php
$args = array(
    'posts_per_page'   => -1,
    'post_type'        => 'texto',
    'post_status'      => 'publish',
);
$textos = get_posts($args); ?>

<?php get_header(); ?>

<main id="textos">
    <h1 class="hidden-text"><?php echo get_the_title($post->ID) ?></h1>
    <div class="container">
        <div js-bloco-ativo class="inativo">
            <div class="row">
                <div class="col-lg-5">
                    <?php
                    foreach ($textos as $key => $post) {
                        setup_postdata($post); ?>
                        <button js-btn-bloco="<?php echo $key + 1 ?>">
                            <h2 class="txtupper fs24"><?php echo get_the_title($post->ID) ?></h2>
                            <p class="txtupper"><?php echo get_field('autor', $post->ID) ?></p>
                        </button>
                    <?php
                    } // foreach ($textos as $post)
                    wp_reset_postdata();
                    ?>
                </div>
                <div class="col-lg-7">
                    <?php
                    foreach ($textos as $key => $post) {
                        setup_postdata($post); ?>
                        <div js-bloco="<?php echo $key + 1 ?>">
                            <div class="editor">
                                <?php echo get_field('conteudo', $post->ID) ?>
                            </div>
                        </div>
                    <?php
                    } // foreach ($textos as $post)
                    wp_reset_postdata();
                    ?>
                </div>
            </div>
        </div>
        
        <div class="btn-mobile d-lg-none d-flex">
            <?php
            foreach ($textos as $key => $post) {
                setup_postdata($post); ?>
                <a class="box" href="<?php echo get_post_permalink($post->ID) ?>">
                    <h2 class="txtupper fs24"><?php echo get_the_title($post->ID) ?></h2>
                    <p class="txtupper"><?php echo get_field('autor', $post->ID) ?></p>
                </a>
            <?php
            } // foreach ($textos as $post)
            wp_reset_postdata();
            ?>
        </div>
        
    </div>

</main>

<?php get_footer(); ?>