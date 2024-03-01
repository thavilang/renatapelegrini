<div class="swiper-slide">
    <span class="txtupper fw400"><?php echo get_the_title($post->ID) ?></span>
    <img src="<?php echo get_field('galeria', $post->ID)[0]['sizes']['large'] ?>" alt="<?php echo get_field('galeria', $post->ID)[0]['alt'] ?>">
</div>