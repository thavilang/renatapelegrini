<?php $galeria = get_field('galeria', $post->ID) ?>

<?php get_header(); ?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.css"/>

<main id="postagem">
    <h1 class="hidden-text"><?php echo get_the_title($post->ID) ?></h1>
    <div class="container">
        <a class="breadcrumb" href="<?php echo get_the_permalink(1145) ?>">
            <svg width="6" height="13" viewBox="0 0 6 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M-2.84124e-07 6.5L6 0.870834L6 12.1292L-2.84124e-07 6.5Z" fill="#B6B6B6"/>
            </svg>
            <span>Blog</span>
        </a>
        <div class="title">
            <h2 class="txtupper fs32 fw400"><?php echo get_the_title($post->ID) ?></h2>
            <!-- <p class="fs28"><?php echo get_field('tipo_trabalho', $post->ID)->name ?></p> -->
            <div class="pagination">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
        <div class="content ver-single">
            <!-- <div class="content ver-gallery"> -->
            <div class="content-image">
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
            </div>
            <div class="content-text">
                <div class="editor texto">
                    <?php echo get_field('texto', $post->ID) ?>
                </div>
                <hr class="d-flex d-lg-none">
                <div class="editor descricao">
                    <?php echo get_field('descricao', $post->ID) ?>
                </div>
            </div>
        </div>
    </div>
</main>


<script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@5.0/dist/fancybox/fancybox.umd.js"></script>
<?php get_footer(); ?>