<?php

setup_postdata($post);
$titulo = get_the_title($post->ID);
$count = mb_strlen($titulo);
$classe = $count < 30 ? 'pequeno' : 'medio';
$classe = $count > 99 ? 'grande' : $classe; ?>

<div class="<?php echo $classe ?> efeito-aparecer">
    <a href="<?php echo get_field('link', $post->ID) ?>" target="_blank" gsap-aparecer-fade>
        <h2 class="fw400 fs24 txtupper"><?php echo $titulo ?></h2>
        <p><?php echo get_field('fonte', $post->ID) ?></p>
    </a>
</div>
