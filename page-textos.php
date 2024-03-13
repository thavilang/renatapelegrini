<?php
// Template Name: Textos
?>

<?php
$args = array(
    'posts_per_page'   => -1,
    'post_type'        => 'texto',
    'post_status'      => 'publish',
);
$textos = get_posts($args); ?>

<?php get_header(); ?>

<main>
    <h1 class="hidden-text"><?php echo get_the_title($post->ID) ?></h1>
    <div class="container">
        <div class="d-none d-lg-block">
            <div js-bloco-ativo class="inativo">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="bloco-botoes">
                            <?php
                            foreach ($textos as $key => $post) {
                                setup_postdata($post); ?>
                                <button js-btn-bloco="<?php echo $key + 1 ?>">
                                    <h2 class="fs22"><?php echo get_the_title($post->ID) ?></h2>
                                    <p><?php echo get_field('autor', $post->ID) ?> | <?php echo get_field('ano', $post->ID) ?></p>
                                </button>
                            <?php
                            } // foreach ($textos as $post)
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="bloco-textos">
                            <?php
                            foreach ($textos as $key => $post) {
                                setup_postdata($post); ?>
                                <div js-bloco="<?php echo $key + 1 ?>">
                                    <div class="editor">
                                        <p><strong><?php echo get_the_title($post->ID) ?></strong></p>
                                        <?php echo get_field('conteudo', $post->ID) ?>                                        
                                        <p style="text-align: right;"><em><?php echo get_field('autor', $post->ID) ?></em></p>
                                    </div>
                                </div>
                            <?php
                            } // foreach ($textos as $post)
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bloco-botoes d-lg-none">
            <?php
            foreach ($textos as $key => $post) {
                setup_postdata($post); ?>
                <a href="<?php echo get_post_permalink($post->ID) ?>">
                    <h2 class="txtupper fs22"><?php echo get_the_title($post->ID) ?></h2>
                    <p class="txtupper fw400"><?php echo get_field('autor', $post->ID) ?></p>
                </a>
            <?php
            } // foreach ($textos as $post)
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>