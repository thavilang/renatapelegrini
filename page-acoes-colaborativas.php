<?php
// Template Name: Ações Colaborativas
?>

<?php get_header(); ?>

<main>
    <h1 class="hidden-text"><?php the_title(); ?></h1>
    <div class="container">
        <?php
        wp_nav_menu(array(
            'theme_location' => 'projetos',
            'container' => false,
            'depth' => '0',
        ));
        ?>
        <div class="ajaxScrooling" data-posts_per_page="9" data-post_type="acao-colaborativa" data-post_status="publish" data-element_item="projeto-item">
            <div class="grid-exposicoes content">
                <?php
                $args = array(
                    'posts_per_page'   => 9,
                    'post_type'        => 'acao-colaborativa',
                    'post_status'      => 'publish',
                );
                $textos = get_posts($args);
                foreach ($textos as $post) {
                    include 'elements/projeto-item.php';
                } // foreach ($textos as $post)
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>