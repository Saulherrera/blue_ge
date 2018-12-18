<?php
/**
 * blue_ge functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package blue_ge
 */

if (!function_exists('blue_ge_setup')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function blue_ge_setup()
    {
        /*
         * Make theme available for translation.
         * Translations can be filed in the /languages/ directory.
         * If you're building a theme based on blue_ge, use a find and replace
         * to change 'blue_ge' to the name of your theme in all the template files.
         */
        load_theme_textdomain('blue_ge', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array(
            'menu-1' => esc_html__('Primary', 'blue_ge'),
            'sidebar-2' => esc_html__('Sidebar Blog', 'blue_ge'),
        ));

        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('blue_ge_custom_background_args', array(
            'default-color' => 'ffffff',
            'default-image' => '',
        )));

        // Add theme support for selective refresh for widgets.
        add_theme_support('customize-selective-refresh-widgets');

        /**
         * Add support for core custom logo.
         *
         * @link https://codex.wordpress.org/Theme_Logo
         */
        add_theme_support('custom-logo', array(
            'height' => 250,
            'width' => 250,
            'flex-width' => true,
            'flex-height' => true,
        ));
    }


endif;
add_action('after_setup_theme', 'blue_ge_setup');

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function blue_ge_content_width()
{
    // This variable is intended to be overruled from themes.
    // Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
    // phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
    $GLOBALS['content_width'] = apply_filters('blue_ge_content_width', 640);
}

add_action('after_setup_theme', 'blue_ge_content_width', 0);

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function blue_ge_widgets_init()
{
    register_sidebar(array(
        'name' => esc_html__('Sidebar', 'blue_ge'),
        'id' => 'sidebar-1',
        'description' => esc_html__('Add widgets here.', 'blue_ge'),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget' => '</section>',
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ));


    /*CUSTOM WIDGETS*/
    register_sidebar(array(
        'name' => 'footer_first',
        'before_widget' => '<div class = "footer_first">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'footer_second',
        'before_widget' => '<div class = "footer_second">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
    register_sidebar(array(
        'name' => 'footer_third',
        'before_widget' => '<div class = "footer_third">',
        'after_widget' => '</div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    /*CUSTOM WIDGETS*/
}

add_action('widgets_init', 'blue_ge_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function blue_ge_scripts()
{
    $ver = microtime();
    wp_enqueue_style('blue_ge-style-bootstrap', get_stylesheet_uri(), array(), $ver);
    wp_enqueue_script('blue_ge-navigation', get_template_directory_uri() . '/js/navigation.js', array(), $ver, true);

    wp_enqueue_script('blue_ge-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), $ver, true);

    wp_enqueue_script('blue_ge-jquery', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.0/jquery.min.js', array(), $ver, false);
    wp_enqueue_script('blue_ge-general', get_template_directory_uri() . '/js/general.js', array(), $ver, true);
    wp_enqueue_script('blue_ge-general', get_template_directory_uri() . '/js/carrousel.js', array(), $ver, true);

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}

add_action('wp_enqueue_scripts', 'blue_ge_scripts');

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if (defined('JETPACK__VERSION')) {
    require get_template_directory() . '/inc/jetpack.php';
}

/* prevent auto <p> in content*/
remove_filter('the_content', 'wpautop');

/* shortcode */
add_shortcode('teachers', 'teachers_shortcode');
add_shortcode('advises', 'advises_shortcode');
add_shortcode('casos_de_exito', 'casos_de_exito_shortcode');
add_shortcode('estudios_relacionados', 'estudios_relacionados_shortcode');
add_shortcode('modulos', 'modulos_shortcode');
add_shortcode('metodologia', 'metodologia_shortcode');

function casos_de_exito_shortcode()
{
    $args = array('post_type' => 'caso_de_exito', 'posts_per_page' => 1, 'order' => 'ASC');
    $loop = new WP_Query($args);
    $cases = $loop->posts;
    $items = '';
    foreach ($cases as $case) {
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($case->ID), array('800', '800'));
        $url = $src[0];
        $href = get_post_custom_values('ctm_url_video', $case->ID)[0];
        $items .= '
        <a href="' . $href . '" target="_blank">
            <div class="ctm_case" style="background-image: url(' . ($url) . ')">
                <div class="col-xs-12 col-md-6  ctm_case_content">    
                    <h1>Casos de exito</h1>
                    ' . $case->post_content . '
                </div>
                <div class="clearfix"></div>
            </div>
        </a>
                    ';
    }

    return '
            <div class="casos_line">
                ' . $items . '
            </div>    
    ';
}

function teachers_shortcode()
{
    $args = array('post_type' => 'Teacher', 'posts_per_page' => 8, 'order' => 'ASC');
    $loop = new WP_Query($args);
    $teachers = $loop->posts;
    $items = '';
    $first = 'active';
    foreach ($teachers as $teacher) {
        $src = wp_get_attachment_image_src(get_post_thumbnail_id($teacher->ID), array('220', '220'));
        $url = $src[0];
        $items .= '<div class="item ' . $first . '">
                    <div class="ctm-carousel-col">
                        <div class="card">
                            <img src="' . $url . '"
                                 alt=""
                                 class="src">
                            <h3>' . $teacher->post_title . '</h3>
                            ' . $teacher->post_content . '
                        </div>
                    </div>
                </div>';
        // reset
        if ($first != '') {
            $first = '';
        }
    }
    return '        <div id="carousel" class="carousel slide">
            <div class="carousel-inner">
                ' . $items . '
            </div>
            <!-- Controls -->
            <div class="left carousel-control">
                <a href="javascript:slides(\'left\')" role="button" data-slide="prev">
                    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
            </div>
            <div class="right carousel-control">
                <a href="javascript:slides(\'right\')"  role="button" data-slide="next">
                    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
';
}

function advises_shortcode()
{
    return '<div class="col-xs-6 col-sm-3">
                <a href="#">
                    <img src="http://practicas.gestor-energetico.com/site/wp-content/uploads/2018/09/posts_sistema.jpg" alt="articulo">
                    <p>
                        <span>ACP</span>
                        Consigue la certificación
                        profesional ACP
                    </p>
                </a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <a href="#">
                    <img src="http://practicas.gestor-energetico.com/site/wp-content/uploads/2018/09/posts_work.jpg" alt="articulo">
                    <p>
                        <span>Workshops</span>
                        Proximamente, talleres y
                        workshops en Chile y Perú
                    </p>
                </a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <a href="#">
                    <img src="http://practicas.gestor-energetico.com/site/wp-content/uploads/2018/09/posts_work.jpg" alt="articulo">
                    <p>
                        <span>Conoce nuestra metodología</span>
                        Estudia con nosotros donde quiera que estés
                    </p>
                </a>
            </div>
            <div class="col-xs-6 col-sm-3">
                <a href="#">
                    <img src="http://practicas.gestor-energetico.com/site/wp-content/uploads/2018/09/posts_video.jpg" alt="articulo">
                    <p>
                        <span>Entrevistas</span>
                        Conoce la experiencia de
                        nuestros alumnos del Máster
                    </p>
                </a>
            </div>';
}

function estudios_relacionados_shortcode()
{
    return '<div class="row">
        <div class="col-sm-4 box_links_one">
            <div class="box_links_image"><img class="alignnone size-medium wp-image-339"
                                              src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/12/post-bim-300x300.jpg"
                                              alt=""/></div><a href="#"> <div class="box_links_content"></div></a>
        </div>
        <div class="col-sm-4 box_links_two">
            <div class="box_links_image"><img class="alignnone size-medium wp-image-340"
                                              src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/12/post-infraestructuras-300x300.jpg"
                                              alt=""/></div><a href="#"> <div class="box_links_content">
                <h2 class="nonstyled"><strong>Postgrado</strong> Infraestructuras BIM</h2>
            </div>
            </a>
        </div>
        <div class="col-sm-4 box_links_three">
            <div class="box_links_image"><img class="alignnone size-medium wp-image-338"
                                              src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/12/cursos-workshops-300x300.jpg"/>
            </div>
            <a href="#"> <div class="box_links_content">
                <h2 class="nonstyled"><strong>Cursos y Workshops en latinoamérica</strong></h2>
            </div>
            </a>
        </div>
    </div>';
}

function metodologia_shortcode()
{
    return '    <div class="col-sm-3"><img class="alignnone size-full wp-image-293"
                               src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/11/metodologia_iconos_1.png"
                               alt="" width="118" height="76"/>
<h4>
Videoconferencias <span>en directo</span>
</h4>
    </div>
    <div class="col-sm-3"><img class="alignnone size-full wp-image-293"
                               src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/11/metodologia_iconos_2.png"
                               alt="" width="118" height="76"/><h4>Videotutoriales y <span>documentación</span></h4>

    </div>
    <div class="col-sm-3"><img class="alignnone size-full wp-image-293"
                               src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/11/metodologia_iconos_3.png"
                               alt="" width="118" height="76"/><h4>Foro <span>interactivo</span></h4>

    </div>
    <div class="col-sm-3"><img class="alignnone size-full wp-image-293"
                               src="https://practicas.gestor-energetico.com/site/wp-content/uploads/2018/11/metodologia_iconos_4.png"
                               alt="" width="118" height="76"/><h4>Máxima <span>flexibilidad</span></h4>

    </div>
';
}

function modulos_shortcode($id = 'bim')
{
    $id = strtolower($id['id']);
    $modulos = [];
    $response = '';


    switch ($id) {
        case 'bim':
        case 'arq-bioclimatica':
        case 'simulacion-energetica':
        case '3d-realidad-aumentada':
        case 'civil-infraestructuras':
        case 'integrated-design':
            $modulos = [
                0 => 'Estándares BIM y Project Management',
                1 => 'BIM Revit Architecture',
                2 => 'BIM Revit Estructuras',
                3 => 'Coordinación de proyectos BIM',
                4 => 'BIM Iluminación',
                5 => 'Eficiencia Energética BIM',
                6 => 'Planificación y Gestión empresarial BIM',
                7 => 'BIM Project Management',
                8 => 'BIM Instalaciones MEP',
                9 => 'Entornos BIM: Archicad y Allplan',
                10 => 'BIM Tekla Structures',
                11 => 'Sostenibilidad BIM',
            ];
            break;

    }
    if (count($modulos) > 0) {
        foreach ($modulos as $k => $name) {
            $response .= '<div class="col-sm-4 m_' . ($k + 1) . '"><a href="#"><span class="ctm_pictograma"></span><p>
                            <strong>' . $name . '</strong></p></a>
                        </div>';
        }
    }

    return $response;
}
