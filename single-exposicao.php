<?php $galeria = get_field('galeria', $post->ID) ?>

<?php get_header(); ?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

<main>
    <div class="container">
        <a class="breadcrumb" href="https://renatapelegrini.thavi.dev/trabalhos/">
            <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M-2.84124e-07 6.5L6 0.870834L6 12.1292L-2.84124e-07 6.5Z" fill="#B6B6B6"/>
            </svg>
            <span>exposições</span>
        </a>
        <h2 class="txtupper fs32 fw400"><?php echo get_the_title($post->ID) ?></h2>
        <div class="title">
            <span class="ano fs28">
                <?php echo get_field('ano_exposicao', $post->ID)->name ?>
            </span>
            <hr>
            <span class="local fs28">
                <?php echo get_field('local', $post->ID) ?>
            </span>
        </div>

        <div class="d-lg-none">
            <div class="pagination-bg">
                <!-- Swiper -->
                <div class="swiper" js-swiper-banner>
                    <div class="swiper-wrapper">
                        <?php foreach ($galeria as $imagem) : ?>
                            <div class="swiper-slide">
                                <a data-src="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery">
                                    <img src="<?php echo $imagem['sizes']['large']; ?>" alt="<?php echo $imagem['alt']; ?>">
                                </a>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>


        <div class="row">
            <div class="col-lg-6">
                <p class="content">
                    <?php echo get_field('texto', $post->ID) ?>
                </p>
            </div>
        </div>
        
        <div class="grid d-none d-lg-grid">
            <?php foreach ($galeria as $imagem) : ?>
                <a data-src="<?php echo $imagem['sizes']['large']; ?>" data-fancybox="gallery">
                    <img src="<?php echo $imagem['sizes']['large']; ?>" alt="<?php echo $imagem['alt']; ?>">
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>

<?php get_footer(); ?>