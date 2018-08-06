<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package blue_ge
 */
$chkr = is_home() || is_singular();
if ($chkr && !is_page_template('services.php')) {
    return;
}
?>

<aside id="secondary" class="widget-area">
    <div class="sidebar-content">
        <img src="<?= get_template_directory_uri() ?>/img/logo_ge_white.png" alt="Gestor Energético">
        <ul>
            <li class="sideicon_dw"><a href="#"><span></span><?= esc_html__('Descarga el temario', 'blue_ge') ?></a>
            </li>
            <li class="sideicon_rv"><a href="#"><span></span><?= esc_html__('Reserva tu plaza', 'blue_ge') ?></a></li>
            <li class="sideicon_sk"><a href="#"><span></span><?= esc_html__('Pregúntanos', 'blue_ge') ?></a></li>
        </ul>
        <div class="sidecontent">
            <dl>
                <dd>Teléfono (+34) 93 307 13 54</dd>
                <dd>Whatsapp (+34) 682 290 330</dd>
            </dl>
            <p>
                <a href="#"><img src="<?= get_template_directory_uri() ?>/img/social_tw.png" alt="tw"></a>
                <a href="#"><img src="<?= get_template_directory_uri() ?>/img/social_fb.png" alt="fb"></a>
                <a href="#"><img src="<?= get_template_directory_uri() ?>/img/social_ig.png" alt="ig"></a>
                <a href="#"><img src="<?= get_template_directory_uri() ?>/img/social_in.png" alt="in"></a>
                <a href="#"><img src="<?= get_template_directory_uri() ?>/img/social_wt.png" alt="wt"></a>
            </p>
        </div>
        <?php dynamic_sidebar('sidebar-1'); ?>
    </div>
    <div class="clear"></div>
</aside><!-- #secondary -->
