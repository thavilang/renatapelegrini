<?php
// Template Name: Trabalhos
?>

<?php
get_header();
?>

<main class="trabalhos">
    <h1 class="hidden-text"><?php echo get_the_title(); ?></h1>
    <div class="container">
        <div class="ajaxScrooling" data-posts_per_page="6" data-post_type="trabalho" data-post_status="publish" data-element_item="post-item">
            <div class="box-mansory content">
                <?php
                $args = array(
                    'posts_per_page'   => 6,
                    'post_type'        => 'trabalho',
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

<?php get_footer() ?>