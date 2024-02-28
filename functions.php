<?php

function site_add_styles()
{
    wp_enqueue_style('fontes', get_template_directory_uri() . '/assets/fontes/stylesheet.css', array(), '',  'all');
    if (is_single()) {
        wp_enqueue_style('css-single', get_template_directory_uri() . '/assets/css/single.css', array(), '',  'all');
    }
};
add_action('wp_enqueue_scripts', 'site_add_styles');

function site_add_scripts()
{
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/plugins/swiper.min.js', array(), "", true);
    wp_enqueue_script('toggle', get_template_directory_uri() . '/assets/js/plugins/toggle.js', array(), "", true);
    if (is_page_template('page-produto.php')) {
        wp_enqueue_script('abas', get_template_directory_uri() . '/assets/js/plugins/abas.js', array(), "", true);
    }
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), time(), true);
    wp_enqueue_script('keep-insta', get_template_directory_uri() . '/assets/js/keep-insta-feed-cache.js', array(), time(), true);

    if (is_404()) {
        wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/404.css', '', time(), 'all');
    }
}
add_action('wp_enqueue_scripts', 'site_add_scripts');

function auto_get_file_path()
{
    $current_post_id = get_queried_object_id();

    $tamplate_name = get_page_template($current_post_id);

    preg_match_all('/page-(.+).php/s', $tamplate_name, $conteudo);

    if (empty($conteudo[0])) {
        return;
    }

    $nome_arquivo = $conteudo[1][0];

    if (is_front_page()) {
        $nome_arquivo = 'home';
    } else if ($nome_arquivo == '' || $nome_arquivo == null) {
        $nome_arquivo = 'index';
    }

    $fileCSS = get_template_directory() . '/assets/css/' . $nome_arquivo . '.css';
    $fileJS = get_template_directory() . '/assets/js/' . $nome_arquivo . '.js';

    if (file_exists($fileCSS)) {
        wp_enqueue_style($nome_arquivo, get_template_directory_uri() . '/assets/css/' . $nome_arquivo . '.css', '', time(), 'all');
        wp_reset_query();
    } else {
        var_dump("<!-- ERROR LOG: O arquivo CSS não existe -->.");
        wp_reset_query();
    }

    if (file_exists($fileJS)) {
        wp_enqueue_script($nome_arquivo, get_template_directory_uri() . '/assets/js/' . $nome_arquivo . '.js', '', time(), true);
        wp_reset_query();
    } else {
        var_dump("<!-- ERROR LOG: O arquivo JS não existe. -->");
        wp_reset_query();
    }
}

add_action('wp_enqueue_scripts', 'auto_get_file_path');

/* Remove the h1 tag from the WordPress editor. */
function my_format_TinyMCE($in)
{
    $in['block_formats'] = "Paragrafo=p; Título 2=h2; Título 3=h3; Título 4=h4; Título 5=h5; Título 6=h6;Pré-formatado=pre";
    return $in;
}
add_filter('tiny_mce_before_init', 'my_format_TinyMCE');

function wpassist_remove_block_library_css()
{
    wp_dequeue_style('wp-block-library');
}
add_action('wp_enqueue_scripts', 'wpassist_remove_block_library_css');

add_filter('show_admin_bar', '__return_false');

//UTILITÁRIOS
function get_image($image)
{
    return get_template_directory_uri() . '/assets/images/' . $image;
}

function sprite($icon, $title = '', $sprite = 'sprite')
{
    return '<svg role="img" aria-label="Ícone ' . $title . '"><title>' . $title . '</title><use xlink:href="' . get_template_directory_uri() . '/assets/images/' . $sprite . '.svg#' . $icon . '" /></svg>';
}
