<?php
$imagem = get_field('galeria', $post->ID)[0];
$orientacaoImagem = $imagem['width'] > $imagem['height'] ? 'horizontal' : 'quadrado';
$orientacaoImagem = $imagem['width'] < $imagem['height'] ? 'vertical' : $orientacaoImagem;
?>
<div class="post <?php echo $orientacaoImagem ?>" gsap-aparecer-fade>
    <a href="<?php echo get_the_permalink($post->ID); ?>">
        <div class="post__img"><img src="<?php echo $imagem['sizes']['medium'] ?>" alt="<?php echo $imagem['alt'] ?>"></div>
        <h2>
            <?php if ($post->post_type == 'exposicao') { ?>            
                [<?php echo get_field('status', $post->ID) ?>] 
            <?php } // if $post->post_type == 'exposicao' ?>
            <?php echo get_the_title($post->ID) ?>
        </h2>
    </a>
</div>