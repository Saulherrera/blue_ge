<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blue_ge
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>


</head>

<body <?php body_class(); ?>>
<div class="header_contactanos">
    <p><a href="#preguntanos">Contáctanos</a></p>
</div>
<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e('Skip to content', 'blue_ge'); ?></a>
    <?php
    $class_tmp = (get_the_ID() == 218) ? 'modified' : '';
    ?>
    <header id="masthead" class="site-header <?= $class_tmp ?>">
        <div class="pre-header">
            <div class="container">

                <ul class="pre-header-left">
                    <li>
                        <a href="tel:+34933071354">
                            <strong>
                                (+34) 93.307.13.54
                            </strong>
                        </a>
                    </li>
                    <li>
                        <a href="mailto:info@gestor-energetico.com">
                            <strong>
                                info@gestor-energetico.com
                            </strong>
                        </a>
                    </li>
                </ul>
                <ul class="pre-header-right">
                    <li>
                        <a href="#">
                            Contáctanos
                        </a>
                    </li>
                    <li>
                        <a href="https://campus.gestor-energetico.com/" target="_blank">Campus Virtual</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="contenthead">
            <div class="site-branding">
                <a href="<?= esc_url(home_url('/')); ?>">
                    <img src="<?= get_template_directory_uri() ?>/img/logo_ge_c.png" alt="<?php bloginfo('name'); ?>">
                </a>
            </div><!-- .site-branding -->

            <nav id="site-navigation" class="main-navigation">
                <button class="menu-toggle" aria-controls="primary-menu"
                        aria-expanded="false"><?php esc_html_e('Primary Menu', 'blue_ge'); ?></button>
                <?php
                wp_nav_menu(array(
                    'theme_location' => 'menu-1',
                    'menu_id' => 'primary-menu',
                ));
                ?>
            </nav><!-- #site-navigation -->
        </div>
    </header><!-- #masthead -->

    <div id="content" class="site-content">

