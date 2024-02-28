<?php
$onde_encontrar = get_field('onde_encontrar', 'option');
$faqs = get_field('faqs', 9);
?>
<?php if (!is_page('o-produto')) { ?>
    <section id="onde-comprar" class="lojas-footer">
        <h2 class="padrao-titulo"><?php echo $onde_encontrar['titulo'] ?></h2>
        <div js-swiper-footer class="logos">
            <div class="swiper-wrapper">
                <?php foreach ($onde_encontrar['loja'] as $loja) : ?>
                    <div class="swiper-slide">
                        <a id="<?php echo "GTM_ondeComprar_" . $loja['gtm_id'] ?? '' ?>" data-gam="<?php echo $loja['gam_id'] ?>" data-permutive="<?php echo $loja['permutive'] ?>" href="<?php echo $loja['link'] ?>" target="_blank" class="logos__item GTM_ondeComprar">
                            <?php echo $loja['logo']['title'] ?>
                            <img loading="lazy" src="<?php echo $loja['logo']['sizes']['thumbnail'] ?>" alt="<?php echo $loja['logo']['alt'] ?>"></a>
                    </div>
                <?php endforeach ?>
            </div>
            <div class="swiper-scrollbar"></div>
        </div>
    </section>
<?php } // !is_page('o-produto') 
?>
<?php if (is_front_page()) { ?>
    <section class="faq-footer">
        <div gsap-aparecer-up class="canvas">
            <div gsap-arrastar-tudo><canvas></canvas></div>
        </div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="padrao-titulo">Ficou com alguma dúvida?</h2>
                    <div js-toggle class="padrao-faq">
                        <?php foreach ($faqs[0]['faq'] as $key => $item) { ?>
                            <button><?php echo $item['pergunta'] ?></button>
                            <div class="editor">
                                <?php echo $item['resposta'] ?>
                            </div>
                            <?php
                            if ($key >= 2) {
                                break;
                            } // if $key >= 2
                            ?>
                        <?php } // foreach $faq[0] 
                        ?>
                    </div>
                    <a href="<?php echo site_url('faq') ?>" class="padrao-botao">Veja todas as perguntas do nosso FAQ</a>
                </div>
            </div>
        </div>
    </section>
<?php } // if is_front_page() 
?>
<section class="siga-redes-sociais">
    <?php if (!is_front_page()) { ?>
        <div gsap-aparecer-up class="canvas">
            <div gsap-arrastar-left><canvas></canvas></div>
        </div>
    <?php } // if !is_front_page() 
    ?>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-5">
                <div class="descricao">
                    <?php
                    $contato = get_field('Contato', 'option');
                    $link = $contato['redes']['link'];
                    $siga = get_field('nos_siga', 'option');
                    ?>
                    <h2 class="padrao-titulo"><?php echo $siga['titulo'] ?></h2>
                    <p class="padrao-texto"><?php echo $siga['texto'] ?></p>

                    <div class="redes">
                        <?php foreach ($contato['redes'] as $key => $rede) : ?>
                            <?php
                            $link = $rede['link'];
                            if ($link) { ?>
                                <a href="<?php echo esc_url($link['url']); ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>">
                                    <?php echo sprite('icon-' . $rede["rede"]["value"], $rede["rede"]["label"]); ?>
                                    <span><?php echo $link["title"] ?> </span>
                                </a>
                            <?php } //if link 
                            ?>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
            <div id="insta-gallery-ct" class="col-lg-7">
                <?php echo do_shortcode('[insta-gallery id="0"]') ?>

                <div class="grid-fotos" style="display: none;">
                    <?php
                    $fallbackinsta_texto = get_field('fallbackinsta_texto', 'option');
                    $fallbackinsta_texto = str_replace('_ecomercial_', '&', $fallbackinsta_texto);
                    $array_data = json_decode($fallbackinsta_texto, true);
                    ?>

                    <?php foreach ($array_data as $key => $post) : ?>
                        <a href="<?php echo $post['link'] ?>" target="_blank">
                            <img loading="lazy" src="<?php echo $post['imagem'] ?>" alt="Placeholder">
                        </a>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<footer class="rodape-footer">
    <div class="container">
        <div class="infos">
            <div class="logo-page">
                <?php $logo = get_field('logo', 'option') ?>
                <?php $img = $logo ?>
                <img src='<?php echo $img['url'] ?>' loading='lazy' alt='<?php echo $img['alt'] ?>'>
            </div>
            <div class="redes-sociais">
                <?php
                $contato = get_field('Contato', 'option');
                $link = $contato['redes']['link'];
                ?>
                <?php foreach ($contato['redes'] as $key => $rede) : ?>
                    <?php
                    $link = $rede['link'];
                    if ($link) { ?>
                        <a href="<?php echo esc_url($link['url']); ?>" title="Clique para abrir o <?php echo $rede["rede"]["label"]; ?>" target="<?php echo esc_attr($link['target'] ? $link['target'] : '_self'); ?>">
                            <?php echo $rede["rede"]["label"]; ?>
                            <?php echo sprite('icon-' . $rede["rede"]["value"], $rede["rede"]["label"]); ?>
                        </a>
                    <?php } //if link 
                    ?>
                <?php endforeach; ?>
            </div>
            <div class="contato">
                <?php if ($contato['titulo']) : ?>
                    <p><?php echo $contato['titulo'] ?> </p>
                <?php endif; ?>

                <?php
                $link = $contato['email'];
                if ($link) : ?>
                    <a href="mailto:<?php echo $link ?>"><?php echo $link ?></a>
                <?php endif ?>
            </div>
            <div class="descricao">
                <p><?php echo get_field('infos', 'option'); ?></p>
            </div>
            <div class="logo-aspen">
                <?php $img = get_field('logo_aspen', 'option'); ?>
                <img src='<?php echo $img['url'] ?>' loading='lazy' alt='<?php echo $img['alt'] ?>'>
            </div>
        </div>
    </div>
    <div class="advertencia">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md">
                    <p><?php echo get_field('contra_indicacao', 'option') ?></p>
                </div>
                <div class="col-md-auto">
                    <a href="https://kindle.com.br/" target="_blank" title="Website by Kindle">
                        Website by Kindle
                        <img class="d-none d-md-block" loading="lazy" src="<?php echo get_image('kindle.webp'); ?>" alt="Logo Website by Kindle">
                        <img class="d-md-none" loading="lazy" src="<?php echo get_image('kindle-mobile.webp'); ?>" alt="Logo Website by Kindle">
                    </a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div><!--.no-overflow-->
<?php //include '_loader.php';
?>
<?php wp_footer(); ?>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/plugins/gsap.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/plugins/ScrollTrigger.min.js"></script>
<script src="<?php echo get_template_directory_uri() ?>/assets/js/animacoes.js"></script>
</body>

</html>