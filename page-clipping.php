<?php
get_header();
?>

<main>
    <h1 class="hidden-text"><?php echo get_the_title(); ?></h1>
    <div class="container">
        <div class="grid-clipping">
            <?php
            $args = array(
                'posts_per_page'   => 9,
                'post_type'        => 'clipping',
                'post_status'      => 'publish',
            );
            $textos = get_posts($args);
            foreach ($textos as $post) {
                setup_postdata($post);
                $titulo = get_the_title($post->ID);
                $count = mb_strlen($titulo);
                $classe = $count < 30 ? 'pequeno' : 'medio';
                $classe = $count > 99 ? 'grande' : $classe; ?>
                <div class="<?php echo $classe ?>">
                    <a href="<?php echo get_field('link', $post->ID) ?>" target="_blank">
                        <h2 class="fw400 fs32 txtupper"><?php echo $titulo ?></h2>
                        <p class="fs22"><?php echo get_field('fonte', $post->ID) ?></p>
                    </a>
                </div>
            <?php
            } // foreach ($textos as $post)
            wp_reset_postdata();
            ?>
        </div>
    </div>
</main>

<?php get_footer() ?>