<?php
get_header();
$exposicoes = get_field('exposicoes', $post->ID);
if (!empty($exposicoes)) {
    $exposicaoExibir = $exposicoes[0];
} // if-empty $exposicoes

$back = 28;
include '_single.php';
?>

<?php if (!empty($exposicaoExibir)) { ?>
    <section class="bloco-exposicao">
        <div class="container">
            <h2 class="fs32 txtupper"><?php echo get_the_title(pll_get_post($exposicaoExibir, pll_current_language())); ?></h2>
            <h3 class="fs28"><?php echo get_field('local', pll_get_post($exposicaoExibir, pll_current_language())) ?> | <?php echo get_field('ano_exposicao', pll_get_post($exposicaoExibir, pll_current_language()))->name ?></h3>
            <div class="grid-galeria">
                <?php
                foreach (get_field('galeria', pll_get_post($exposicaoExibir, pll_current_language())) as $key => $imagem) {
                    $orientacaoImagem = $imagem['width'] > $imagem['height'] ? 'horizontal' : 'quadrado';
                    $orientacaoImagem = $imagem['width'] < $imagem['height'] ? 'vertical' : $orientacaoImagem; ?>
                    <div class="grid-galeria__img <?php echo $orientacaoImagem ?>" gsap-aparecer-fade><div><img loading="lazy" src="<?php echo $imagem['sizes']['medium'] ?>" alt="<?php echo $imagem['alt'] ?>"></div></div>
                <?php
                    if ($key >= 2) {
                        break;
                    }
                } // foreach get_field('galeria') 
                ?>
            </div>
            <a href="<?php echo get_the_permalink(pll_get_post($exposicaoExibir, pll_current_language())) ?>" class="padrao-botao">+ <?php echo pll__('ver mais'); ?></a>
        </div>
    </section>
<?php } // if-empty $exposicaoExibir 
?>

<?php get_footer(); ?>