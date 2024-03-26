<?php
$imagem = get_field('galeria', $post->ID);
if (!empty($imagem)) {
    $imagem = $imagem[0];
} // if-empty $imagem
$link_blog = get_field('link_blog', $post->ID);
?>
<div class="post mansory-item vertical" gsap-aparecer-fade>
    <a class="efeito-aparecer" href="<?php echo $link_blog; ?>" target="_blank">
        <div class="post__img"><img loading="lazy" src="<?php echo $imagem['sizes']['medium'] ?? get_image('placeholder.jpg');?>" alt="<?php echo $imagem['alt'] ?>"></div>
        <h2><?php echo get_the_title($post->ID) ?></h2>
    </a>
</div> 