<?php
$galeria = get_field('galeria', $post->ID);
$count = count($galeria);
$orientacaoImagem = $galeria[0]['width'] > $galeria[0]['height'] ? 'horizontal' : 'quadrado';
$orientacaoImagem = $galeria[0]['width'] < $galeria[0]['height'] ? 'vertical' : $orientacaoImagem;
$formatoPagina = $count == 1 && $orientacaoImagem == 'vertical' ? 'coluna' : 'linha';
?>

<main class="<?php echo $formatoPagina; ?>">
    <div class="container">
        <a class="breadcrumb" href="<?php echo get_the_permalink(pll_get_post($back, pll_current_language())) ?>">
            <?php include 'assets/images/seta.svg'; ?>
            <span><?php echo get_the_title(pll_get_post($back, pll_current_language())); ?></span>
        </a>
        <h1 class="txtupper fs32 fw400"><?php echo get_the_title($post->ID) ?></h1>
        <?php if ($post->post_type == 'trabalho') { ?>
            <p class="fs28 categoria"><?php echo get_field('tipo_trabalho', $post->ID)->name ?></p>
        <?php } // if $post->post_type == 'trabalho' 
        ?>
        <?php if ($formatoPagina == 'linha') { ?>
            <div class="navegacao-swiper__bloco">
                <div class="row justify-content-end">
                    <div class="col-auto">
                        <div class="navegacao-swiper">
                            <button class="swiper-button-galeria-prev"></button>
                            <button class="swiper-button-galeria-next"></button>
                        </div>
                    </div>
                </div>
            </div>
        <?php } // $formatoPagina == 'linha' 
        ?>
        <div class="content">
            <div class="content__imagem">
                <div class="swiper" js-swiper-galeria>
                    <div class="swiper-wrapper">
                        <?php foreach ($galeria as $imagem) : ?>
                            <div class="swiper-slide">
                                <a href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery">
                                    <img src="<?php echo $imagem['sizes']['medium']; ?>" alt="<?php echo $imagem['alt']; ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div class="content__texto">
                <div class="editor texto">
                    <?php echo get_field('texto', $post->ID) ?>
                </div>
                <div class="editor descricao">
                    <?php echo get_field('descricao', $post->ID) ?>
                </div>
            </div>
        </div>
    </div>
</main>