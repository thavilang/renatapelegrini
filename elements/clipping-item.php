<?php
setup_postdata($post);
$titulo = get_the_title($post->ID);
$imagem = get_field('imagem', $post->ID);
?>

<div class="efeito-aparecer mansory-item clipping-item col-6 col-md-4 col-lg-3">
    <a href="<?php echo get_field('link', $post->ID) ?>" target="_blank" gsap-aparecer-fade>
        <?php if (!empty($imagem)) { ?>
            <img src="<?php echo $imagem['sizes']['thumbnail'] ?>" alt="<?php echo $titulo ?>">
        <?php } // if-empty $imagem 
        ?>
        <div>
            <h2 class="fw400"><?php echo $titulo ?></h2>
            <p class="fs16"><?php echo get_field('fonte', $post->ID) ?></p>
        </div>
    </a>
</div>