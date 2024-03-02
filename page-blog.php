<?php
// Template Name: Blog
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
        <div class="ajaxScrooling" data-posts_per_page="9" data-post_type="publicacao" data-post_status="publish" data-element_item="post-item">
            <div class="grid-listagens content">
                <?php
                $args = array(
                    'posts_per_page'   => 9,
                    'post_type'        => 'postagem',
                    'post_status'      => 'publish',
                );
                $textos = get_posts($args);
                foreach ($textos as $post) {
                    include 'elements/post-item.php';
                } // foreach ($textos as $post)
                wp_reset_postdata();
                ?>
            </div>
        </div>
    </div>
</main>

<?php get_footer(); ?>