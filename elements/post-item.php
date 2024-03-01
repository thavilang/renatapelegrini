<a href="<?php echo get_the_permalink($post->ID); ?>" class="post">
    <div><img src="<?php echo get_field('galeria', $post->ID)[0]['sizes']['thumbnail'] ?>" alt="<?php echo get_field('galeria', $post->ID)[0]['alt'] ?>"></div>
    <h2><?php echo get_the_title($post->ID) ?></h2>
</a>