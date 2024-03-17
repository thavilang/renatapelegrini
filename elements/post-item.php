<?php
$imagem = get_field('galeria', $post->ID);
if (!empty($imagem)) {
    $imagem = $imagem[0];
    $orientacaoImagem = $imagem['width'] > $imagem['height'] ? 'horizontal' : 'quadrado';
    $orientacaoImagem = $imagem['width'] < $imagem['height'] ? 'vertical' : $orientacaoImagem;    
} // if-empty $imagem
$local = get_field('local', $post->ID);
?>
<div class="post mansory-item <?php echo $orientacaoImagem == 'horizontal' ? 'col-12 col-lg-8 horizontal' : 'col-7 col-sm-6 col-lg-4 vertical'; ?>" gsap-aparecer-fade>
    <a class="efeito-aparecer" href="<?php echo get_the_permalink($post->ID); ?>">
        <div class="post__img"><img loading="lazy" src="<?php echo $imagem['sizes']['medium'] ?? get_image('placeholder.jpg');?>" alt="<?php echo $imagem['alt'] ?>"></div>
        <h2><?php echo get_the_title($post->ID) ?></h2>
        <?php if ($post->post_type == 'exposicao') { ?>
            <p><?php echo get_field('ano_exposicao', $post->ID)->name ?></p>
            <p><?php echo $local ?></p>
        <?php } ?>
    </a>
</div> 