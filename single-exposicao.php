<?php $galeria = get_field('galeria', $post->ID) ?>
<?php
get_header();
$categoria = get_field('categoria');
$local = get_field('local', $post->ID);
?>

<main class="linha">
    <div class="container">
        <div class="row justify-content-between">
            <?php
            $next_post = get_next_post();
            $prev_post = get_previous_post();
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
        <p class="fs28 categoria"><?php echo get_field('ano_exposicao', $post->ID)->name ?><?php echo $local ? ' | ' . $local : '' ?></p>
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
        <div class="content">
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
            <div class="content__texto">
                <div class="editor descricao">
                    <?php echo get_field('descricao', $post->ID) ?>
                </div>
                <div class="editor texto">
                    <?php echo get_field('texto', $post->ID) ?>
                </div>
            </div>
        </div>
        <div class="grid-galeria">
            <?php foreach ($galeria as $imagem) {
                $orientacaoImagem = $imagem['width'] > $imagem['height'] ? 'horizontal' : 'quadrado';
                $orientacaoImagem = $imagem['width'] < $imagem['height'] ? 'vertical' : $orientacaoImagem; ?>
                <a class="grid-galeria__img <?php echo $orientacaoImagem ?>" href="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery" gsap-aparecer-fade>
                    <div><img loading="lazy" src="<?php echo $imagem['sizes']['medium']; ?>" alt="<?php echo $imagem['alt']; ?>"></div>
                </a>
            <?php } // foreach get_field('galeria') 
            ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>