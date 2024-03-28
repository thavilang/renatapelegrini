<?php $galeria = get_field('galeria', $post->ID) ?>
<?php
get_header();
$categoria = get_field('categoria');
$local = get_field('local', $post->ID);
$imagem_lateral = get_field('imagem_lateral', $post->ID);
$texto = get_field('texto', $post->ID);
$descricao = get_field('descricao', $post->ID);
$bloco = get_field('bloco', $post->ID);
?>

<main class="linha">
    <?php if (!empty($bloco)) { ?>
        <h1 class="hidden-text"><?php echo get_the_title($post->ID) ?></h1>
    <?php } // if-empty $bloco 
    ?>
    <div class="container">
        <div class="row justify-content-between">
            <?php
            $next_post = get_next_post(true, '', 'categoria');
            $prev_post = get_previous_post(true, '', 'categoria');
            ?>
            <div class="col-auto">
                <?php if (is_a($next_post, 'WP_Post')) { ?>
                    <a class="breadcrumb" class="navegacao-obra navegacao-obra--prev" href="<?php echo get_permalink($next_post->ID); ?>"><?php include 'assets/images/seta.svg'; ?><?php echo pll__('anterior'); ?></a>
                <?php } //if (is_a($next_post, 'WP_Post')) 
                ?>
            </div>
            <div class="col-auto">
                <?php if (is_a($prev_post, 'WP_Post')) { ?>
                    <a class="breadcrumb proximo" class="navegacao-obra navegacao-obra--next" href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo pll__('próximo'); ?><?php include 'assets/images/seta.svg'; ?></a>
                <?php } //if (is_a($next_post, 'WP_Post')) 
                ?>
            </div>
        </div>
        <h1 class="fs32 fw400"><?php echo get_the_title($post->ID) ?></h1>
        <?php if (!empty($descricao) || !empty($texto)) { ?>
            <div class="content">
                <div class="content__texto">
                    <div class="editor texto">
                        <p class="fs28 categoria"><?php echo get_field('ano_exposicao', $post->ID)->name ?><?php echo $local ? ' | ' . $local : '' ?></p>
                        <?php if (!empty($imagem_lateral)) { ?>
                            <p><img class="d-md-none" src="<?php echo $imagem_lateral['sizes']['thumbnail'] ?>" alt="<?php echo $imagem_lateral['alt'] ?>"></p>
                        <?php } // if-empty $imagem_lateral 
                        ?>
                        <?php echo $texto ?>
                    </div>
                    <div class="editor texto2">
                        <?php if (!empty($imagem_lateral)) { ?>
                            <img class="d-none d-md-block" src="<?php echo $imagem_lateral['sizes']['thumbnail'] ?>" alt="<?php echo $imagem_lateral['alt'] ?>">
                        <?php } // if-empty $imagem_lateral 
                        ?>
                        <div>
                            <?php echo $descricao ?>
                        </div>
                    </div>
                </div>
                <div class="navegacao-swiper__bloco d-lg-none">
                    <div class="row justify-content-end">
                        <div class="col-auto">
                            <div class="navegacao-swiper">
                                <button class="swiper-button-galeria-prev"></button>
                                <button class="swiper-button-galeria-next"></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-lg-none content__imagem">
                    <div class="swiper" js-swiper-galeria>
                        <div class="swiper-wrapper">
                            <?php foreach ($galeria as $imagem) : ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery-swiper">
                                        <img src="<?php echo $imagem['sizes']['medium']; ?>" alt="<?php echo $imagem['alt']; ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php } // if-empty $descricao 
        ?>
        <div class="grid-mansory row" js-quebra-mansory="991">
            <?php foreach ($galeria as $imagem) {
                $orientacaoImagem = $imagem['width'] > $imagem['height'] ? 'horizontal' : 'quadrado';
                $orientacaoImagem = $imagem['width'] < $imagem['height'] ? 'vertical' : $orientacaoImagem; ?>
                <a class="grid-mansory__img <?php echo $orientacaoImagem == 'horizontal' ? 'col-md-6' : 'col-md-3' ?>" href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery" gsap-aparecer-fade>
                    <div><img loading="lazy" src="<?php echo $imagem['sizes']['thumbnail']; ?>" alt="<?php echo $imagem['alt']; ?>"></div>
                </a>
            <?php } // foreach get_field('galeria') 
            ?>
        </div>
        <?php if (!empty($bloco)) { ?>
            <div js-bloco-ativo="1">
                <div js-bloco-navegacao class="menu-categorias">
                    <?php foreach ($bloco as $key => $aba) { ?>
                        <button js-btn-bloco="<?php echo $key + 1 ?>"><?php echo $aba['titulo_aba'] ?></button>
                    <?php } // foreach $bloco 
                    ?>
                </div>
                <?php foreach ($bloco as $key => $aba) { ?>
                    <div js-bloco="<?php echo $key + 1 ?>">
                        <div class="content">
                            <div class="content__texto">
                                <div class="editor texto">
                                    <p class="fs28 categoria"><?php echo $aba['titulo'] ?></p>
                                    <?php echo $aba['texto'] ?>
                                </div>
                                <div class="editor texto2">
                                    <?php if (!empty($aba['imagem_lateral'])) { ?>
                                        <img src="<?php echo $aba['imagem_lateral']['sizes']['thumbnail'] ?>" alt="<?php echo $aba['imagem_lateral']['alt'] ?>">
                                    <?php } // if-empty $aba['imagem_lateral'] 
                                    ?>
                                    <div>
                                        <?php echo $aba['descricao'] ?>
                                    </div>
                                </div>
                            </div>
                            <?php if (!empty($aba['galeria'])) { ?>
                                <div class="navegacao-swiper__bloco d-lg-none">
                                    <div class="row justify-content-end">
                                        <div class="col-auto">
                                            <div class="navegacao-swiper">
                                                <button class="swiper-button-galeria-prev"></button>
                                                <button class="swiper-button-galeria-next"></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-lg-none content__imagem">
                                    <div class="swiper" js-swiper-galeria>
                                        <div class="swiper-wrapper">
                                            <?php foreach ($aba['galeria'] as $imagem) : ?>
                                                <div class="swiper-slide">
                                                    <a href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery-swiper-<?php echo $key + 2 ?>">
                                                        <img src="<?php echo $imagem['sizes']['medium']; ?>" alt="<?php echo $imagem['alt']; ?>">
                                                    </a>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } // if-empty $aba['galeria'] 
                            ?>
                        </div>
                        <?php if (!empty($aba['galeria'])) { ?>
                            <div class="grid-mansory row" js-quebra-mansory="991">
                                <?php foreach ($aba['galeria'] as $imagem) {
                                    $orientacaoImagem = $imagem['width'] > $imagem['height'] ? 'horizontal' : 'quadrado';
                                    $orientacaoImagem = $imagem['width'] < $imagem['height'] ? 'vertical' : $orientacaoImagem; ?>
                                    <a class="grid-mansory__img <?php echo $orientacaoImagem == 'horizontal' ? 'col-md-6' : 'col-md-3' ?>" href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery-<?php echo $key + 2 ?>">
                                        <div><img loading="lazy" src="<?php echo $imagem['sizes']['thumbnail']; ?>" alt="<?php echo $imagem['alt']; ?>"></div>
                                    </a>
                                <?php } // foreach get_field('galeria') 
                                ?>
                            </div>
                        <?php } // if-empty $aba['galeria'] 
                        ?>
                    </div>
                <?php } // foreach $bloco 
                ?>
            </div>
        <?php } // if-empty $bloco 
        ?>
    </div>
</main>

<?php get_footer(); ?>