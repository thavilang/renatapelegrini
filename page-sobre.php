<?php $texto = get_field('texto', $post->ID) ?>
<?php $imagem = get_field('imagem', $post->ID) ?>


<?php get_header(); ?>

<section id="sobre">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="content">
                    <h1 class="fs40 txtupper fw400"><?php echo get_the_title() ?></h1>
                    <div class="editor">
                        <?php echo $texto ?>
                    </div>
                    <?php
                    $link = get_field('botao');
                    if ($link) { ?>
                        <a class="padrao-botao" href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>"><?php echo esc_html($link['title']); ?></a>
                    <?php } //if link 
                    ?>
                </div>
            </div>
            <div class="d-none col-lg-5 offset-lg-1 d-lg-flex">
                <div class="imagem">
                    <?php $img = $imagem ?>
                    <img src='<?php echo $img['url'] ?>' loading='lazy' alt='<?php echo $img['alt'] ?>'>

                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>