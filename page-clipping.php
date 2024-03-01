<?php
// Template Name: Clipping
?>

<?php
get_header();
?>

<main>
    <h1 class="hidden-text"><?php echo get_the_title(); ?></h1>
    <div class="container">
        <div class="grid-clipping ajaxScrooling" data-posts_per_page="9" data-post_type="clipping" data-post_status="publish" data-element_item="clipping-item">
            <?php
            $args = array( 
                'posts_per_page'   => 9,
                'post_type'        => 'clipping',
                'post_status'      => 'publish',
            );
            $textos = get_posts($args);
            foreach ($textos as $post) {
                include 'elements/clipping-item.php';
            } // foreach ($textos as $post)
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer() ?>