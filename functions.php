<?php
function site_add_styles()
{
    if (is_single()) {
        wp_enqueue_style('css-single', get_template_directory_uri() . '/assets/css/single.css', array(), '',  'all');
    }
    if (is_404()) {
        wp_enqueue_style('404', get_template_directory_uri() . '/assets/css/404.css', '', time(), 'all');
    }
    if (is_tax('categoria')) {
        wp_enqueue_style('tax', get_template_directory_uri() . '/assets/css/exposicoes.css', '', time(), 'all');
    }
};
add_action('wp_enqueue_scripts', 'site_add_styles');

function site_add_scripts()
{
    wp_enqueue_script('swiper', get_template_directory_uri() . '/assets/js/plugins/swiper.min.js', array(), "", true);
    wp_enqueue_script('fancybox', get_template_directory_uri() . '/assets/js/plugins/fancybox.min.js', array(), "", true);
    if (is_page_template('page-textos.php') || is_singular('exposicao')) {
        wp_enqueue_script('abas', get_template_directory_uri() . '/assets/js/plugins/abas.js', array(), "", true);
    }
    if (is_page_template('page-clipping.php') || is_page_template('page-trabalhos.php') || is_singular('exposicao')) {
        wp_enqueue_script('mansory', get_template_directory_uri() . '/assets/js/plugins/masonry.pkgd.min.js', array(), "", true);
    }
    if (is_singular('exposicao')) {
        wp_enqueue_script('imagesloaded', get_template_directory_uri() . '/assets/js/plugins/imagesloaded.pkgd.min.js', array(), "", true);
    }
    wp_enqueue_script('ScrollTrigger', get_template_directory_uri() . '/assets/js/plugins/ScrollTrigger.min.js', array(), time(), true);
    wp_enqueue_script('gsap', get_template_directory_uri() . '/assets/js/plugins/gsap.min.js', array(), time(), true);
    wp_enqueue_script('animacoes', get_template_directory_uri() . '/assets/js/animacoes.js', array(), time(), true);
    wp_enqueue_script('ajaxScrolling', get_template_directory_uri() . '/assets/js/ajaxScrolling.js', array('jquery'), time(), true);
    wp_enqueue_script('script', get_template_directory_uri() . '/assets/js/script.js', array(), time(), true);
}
add_action('wp_enqueue_scripts', 'site_add_scripts');

function auto_get_file_path()
{
    $url = 'http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    $current_post_id = url_to_postid($url);

    $tamplate_name = get_page_template($current_post_id);

    if (is_single()) {
        $nome_arquivo = get_post_type($current_post_id);
    } else {
        preg_match_all('/page-(.+).php/s', $tamplate_name, $conteudo);

        if (empty($conteudo[0])) {
            return;
        }

        $nome_arquivo = $conteudo[1][0];

        // if (is_front_page()) {
        //     $nome_arquivo = 'index';
        // } else if ($nome_arquivo == '' || $nome_arquivo == null) {
        //     $nome_arquivo = 'index';
        // }
    }

    $fileCSS = get_template_directory() . '/assets/css/' . $nome_arquivo . '.css';
    $fileJS = get_template_directory() . '/assets/js/' . $nome_arquivo . '.js';

    if (file_exists($fileCSS)) {
        wp_enqueue_style($nome_arquivo, get_template_directory_uri() . '/assets/css/' . $nome_arquivo . '.css', '', time(), 'all');
        wp_reset_query();
    } else {
        echo "<!-- ERROR LOG: O arquivo CSS não existe -->.";
        wp_reset_query();
    }

    if (file_exists($fileJS)) {
        wp_enqueue_script($nome_arquivo, get_template_directory_uri() . '/assets/js/' . $nome_arquivo . '.js', '', time(), true);
        wp_reset_query();
    } else {
        echo "<!-- ERROR LOG: O arquivo JS não existe. -->";
        wp_reset_query();
    }
}

add_action('wp_enqueue_scripts', 'auto_get_file_path');

remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(
            'header-menu' => 'Header Menu',
            'linguagem' => 'Linguagem',
            'projetos' => 'Projetos'
        )
    );
}

// ************* Remove default Posts type since no blog *************
// Remove side menu
add_action('admin_menu', 'remove_default_post_type');
function remove_default_post_type()
{
    remove_menu_page('edit-comments.php');
    $author = wp_get_current_user();
    if (isset($author->roles[0])) {
        $current_role = $author->roles[0];
    } else {
        $current_role = 'no_role';
    }
    if ('editor' == $current_role) {
        $screen = get_current_screen();
        $base   = $screen->id;
        remove_menu_page('tools.php');
        // remove_menu_page('wpseo_workouts');
        if ('toplevel_page_wpcf7' == $base) {
            wp_die('Sem permissão para acessar esta página.');
        }
    }
}
// Remove +New post in top Admin Menu Bar
add_action('admin_bar_menu', 'remove_default_post_type_menu_bar', 999);
function remove_default_post_type_menu_bar($wp_admin_bar)
{
    $wp_admin_bar->remove_node('new-post');
    $wp_admin_bar->remove_node('new-content');
    $wp_admin_bar->remove_node('comments');
    // $wp_admin_bar->remove_node('wpseo-menu'); 
}
// Remove Quick Draft Dashboard Widget
add_action('wp_dashboard_setup', 'remove_draft_widget', 999);
function remove_draft_widget()
{
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
}

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

//CSS ADMIN
function custom_editor_css()
{
    // Replace 'custom-admnin-style.css' with the actual file path to your custom CSS.
    $custom_css_file = get_template_directory_uri() . '/painel/editor-style.css';

    // Enqueue the custom CSS file in the WordPress admin area.
    wp_enqueue_style('custom-editor-css', $custom_css_file);
}

function manage_user_action()
{
    // get current login user's role
    $roles = wp_get_current_user()->roles;

    if (!in_array('administrator', $roles)) {
        add_action('admin_enqueue_scripts', 'custom_editor_css');
    }
}
add_action('admin_init', 'manage_user_action');

/*reordenar menu*/
function custom_menu_order($menu_ord)
{
    if (!$menu_ord) return true;
    return array(
        'index.php',
        'separator1',
        'edit.php?post_type=page',
        'edit.php?post_type=trabalho',
        'edit.php?post_type=exposicao',
        'edit.php?post_type=acao-colaborativa',
        'edit.php?post_type=postagem',
        'edit.php?post_type=publicacao',
        'edit.php?post_type=texto',
        'edit.php?post_type=clipping',
        'edit.php',
        'separator2',
        'upload.php'
    );
}

add_filter('custom_menu_order', 'custom_menu_order');
add_filter('menu_order', 'custom_menu_order');


//UTILITÁRIOS
function sprite($icon, $title = '', $sprite = 'sprite')
{
    return '<svg role="img" aria-label="Ícone ' . $title . '"><title>' . $title . '</title><use xlink:href="' . get_template_directory_uri() . '/assets/images/' . $sprite . '.svg#' . $icon . '" /></svg>';
}

function get_image($image)
{
    return get_template_directory_uri() . '/assets/images/' . $image;
}

function getImageWidth($image, $sizes)
{
    switch ($sizes) {
        case 'thumbnail':
            $imgWidth = $image['sizes']['thumbnail-width'];
            break;
        case 'medium':
            $imgWidth = $image['sizes']['medium-width'];
            break;
        case 'large':
            $imgWidth = $image['sizes']['large-width'];
            break;
        default:
            $imgWidth = $image['width'];
            break;
    }
    return $imgWidth;
}

function getImageSizes($image)
{
    $retorno = '(max-width: ' . getImageWidth($image, 'thumbnail') . 'px) ' . getImageWidth($image, 'thumbnail') . 'px,
                (max-width: ' . getImageWidth($image, 'medium') . 'px) ' . getImageWidth($image, 'medium') . 'px,
                (max-width: ' . getImageWidth($image, 'large') . 'px) ' . getImageWidth($image, 'large') . 'px, ' . getImageWidth($image, 'default') . 'px';
    return $retorno;
}

function getImageScrset($image)
{
    $retorno = $image['sizes']['thumbnail'] . ' ' . getImageWidth($image, 'thumbnail') . 'w, 
             ' . $image['sizes']['medium'] . ' ' . getImageWidth($image, 'medium') . 'w, 
             ' . $image['sizes']['large'] . ' ' . getImageWidth($image, 'large') . 'w';
    return $retorno;
}

function console_log($output, $with_script_tags = true)
{
    $js_code = 'console.log(' . json_encode($output, JSON_HEX_TAG) .
        ');';
    if ($with_script_tags) {
        $js_code = '<script>' . $js_code . '</script>';
    }
    echo $js_code;
}

/*paginacação infinita*/

function more_ajax_scrolling()
{
    $page = (isset($_POST['pageNumber'])) ? $_POST['pageNumber'] : 1;

    $posts_per_page = (isset($_POST['posts_per_page'])) ? $_POST['posts_per_page'] : 9;
    $post_type = (isset($_POST['post_type'])) ? $_POST['post_type'] : 'posts';
    $post_status = (isset($_POST['post_status'])) ? $_POST['post_status'] : 'publish';

    header("Content-Type: text/html");

    $args = array(
        'post_type'         => $post_type,
        'posts_per_page'    => $posts_per_page,
        'post_status'       => $post_status,
        'paged'             => $page,
    );

    if (isset($_POST['tax_query']) && !empty($_POST['tax_query'])) {
        $parms_tax_query = json_decode(stripslashes($_POST['tax_query']))[0]; // Defina o segundo parâmetro como true para retornar um array associativo
        // Agora você pode usar $tax_query como um array PHP normal
        $tax_query = array(
            array(
                'taxonomy' => $parms_tax_query->taxonomy,
                'field'    => $parms_tax_query->field,
                'terms'    => $parms_tax_query->terms[0],
            ),
        );
        $args['tax_query'] = $tax_query;
    }

    $out = '';
    $countFunctionAjax = 0;

    $loop = new WP_Query($args);

    if ($loop->have_posts()) :  while ($loop->have_posts()) : $loop->the_post();
            $countFunctionAjax++;
            ob_start(); // Inicia o buffer de saída 
            include 'elements/' . $_POST['element_item'] . '.php';
            $out .= ob_get_clean(); // Captura o conteúdo do buffer e limpa o buffer
        endwhile;
    endif;
    wp_reset_postdata();

    $return = array();
    $return['itens'] = $out;
    $return['count'] = $countFunctionAjax;

    die(json_encode($return));
}

add_action('wp_ajax_nopriv_more_ajax_scrolling', 'more_ajax_scrolling');
add_action('wp_ajax_more_ajax_scrolling', 'more_ajax_scrolling');

/*Polylang*/
pll_register_string('renatapelegrini', 'Todos os direitos reservados');
pll_register_string('renatapelegrini', 'ver mais');
pll_register_string('renatapelegrini', 'próximo');
pll_register_string('renatapelegrini', 'anterior');
pll_register_string('renatapelegrini', 'Erro 404');
pll_register_string('renatapelegrini', 'Parece que a página que você está procurando não existe mais ou mudou de link.');
pll_register_string('renatapelegrini', 'Ir para a página inicial');
pll_register_string('renatapelegrini', '©2024 por');

/*CUSTOM WIDGET */
if (function_exists('register_nav_menus')) {
    register_nav_menus(
        array(        
            'dashboard-menu' => 'Dashboard Menu'
        )
    );
}
function dashboard_site_widget($callback_args, $widget){
	return wp_nav_menu(array('theme_location' => 'dashboard-menu'));
}

add_action( 'wp_dashboard_setup', 'register_custom_dashboard_widget' );

function register_custom_dashboard_widget(){
	wp_add_dashboard_widget('site-dashboard-widget', 'Acesso Rápido', 'dashboard_site_widget');
}

function widget_css()
{
    // Replace 'custom-admnin-style.css' with the actual file path to your custom CSS.
    $custom_css_file = get_template_directory_uri() . '/painel/widget-style.css';

    // Enqueue the custom CSS file in the WordPress admin area.
    wp_enqueue_style('widget-admin-css', $custom_css_file);
}
add_action('admin_enqueue_scripts', 'widget_css');