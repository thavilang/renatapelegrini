<?php
$galeria = get_field('galeria', $post->ID);
if ($galeria) {
    $count = count($galeria);
    $orientacaoImagem = $galeria[0]['width'] > $galeria[0]['height'] ? 'horizontal' : 'quadrado';
    $orientacaoImagem = $galeria[0]['width'] < $galeria[0]['height'] ? 'vertical' : $orientacaoImagem;
    $formatoPagina = $count == 1 && $orientacaoImagem == 'vertical' ? 'coluna' : 'linha';
}
?>

<main class="<?php echo $galeria ? $formatoPagina : 'linha'; ?>">
    <div class="container">
        <div class="row justify-content-between">
            <?php 
            $next_post = get_next_post();
            $prev_post = get_previous_post(); 
            ?>
            <div class="col-auto">
                <?php if (is_a($next_post, 'WP_Post')) { ?>
                    <a class="breadcrumb" class="navegacao-obra navegacao-obra--prev" href="<?php echo get_permalink($next_post->ID); ?>"><?php include 'assets/images/seta.svg'; ?><?php echo pll__('anterior'); ?></a>
                <?php } //if (is_a($next_post, 'WP_Post')) ?>
            </div>
            <div class="col-auto">
                <?php if (is_a($prev_post, 'WP_Post')) { ?>
                    <a class="breadcrumb proximo" class="navegacao-obra navegacao-obra--next" href="<?php echo get_permalink($prev_post->ID); ?>"><?php echo pll__('próximo'); ?><?php include 'assets/images/seta.svg'; ?></a>
                <?php } //if (is_a($next_post, 'WP_Post')) 
                ?>
            </div>
        </div>

        <h1 class="txtupper fs32 fw400"><?php echo get_the_title($post->ID) ?></h1>
        <?php if ($post->post_type == 'trabalho') { ?>
            <p class="fs28 categoria"><?php echo get_field('tipo_trabalho', $post->ID)->name ?></p>
        <?php } // if $post->post_type == 'trabalho' 
        ?>
        <?php if ($galeria && $formatoPagina == 'linha' && $count > 1) { ?>
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
            <?php if (!empty($galeria)) { ?>
                <div class="content__imagem">
                    <div class="swiper" js-swiper-galeria>
                        <div class="swiper-wrapper">
                            <?php foreach ($galeria as $imagem) : ?>
                                <div class="swiper-slide">
                                    <a href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery">
                                        <img loading="lazy" src="<?php echo $imagem['sizes']['medium']; ?>" alt="<?php echo $imagem['alt']; ?>">
                                    </a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            <?php } // if-empty $galeria 
            ?>
            <div class="content__texto">
                <div class="editor descricao">
                    <?php echo get_field('descricao', $post->ID) ?>
                </div>
                <div class="editor texto">
                    <?php echo get_field('texto', $post->ID) ?>
                    <?php if ($post->post_type == 'trabalho' && !empty($exposicoes)) { ?>
                        <div class="exposicoes descricao">
                            <h2><?php echo get_the_title(pll_get_post(57, pll_current_language())); ?></h2>
                            <ul>
                                <?php foreach ($exposicoes as $exposicao) {
                                    $titulo = get_the_title(pll_get_post($exposicao, pll_current_language()));
                                    $local = get_field('local', pll_get_post($exposicao, pll_current_language()));
                                    $ano = get_field('ano_exposicao', pll_get_post($exposicao, pll_current_language()))->name; ?>
                                    <li><a target="_blank" href="<?php echo get_the_permalink(pll_get_post($exposicao, pll_current_language())) ?>"><em><?php echo get_the_title(pll_get_post($exposicao, pll_current_language())); ?></em></a><br><?php echo $local ? $local . ' | ' . $ano : ''; ?></li>
                                <?php } // foreach $exposicoes 
                                ?>
                            </ul>
                        </div>
                    <?php } // if $post->post_type == 'trabalho' 
                    ?>
                </div>
            </div>
        </div>
    </div>
</main>