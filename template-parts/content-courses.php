<?php
$id_card_media = get_post_custom_values('ctm_preview_video')[0];
$card_title = get_post_custom_values('card_title')[0];
$card_teacher = get_post_custom_values('card_teacher')[0];
$card_credits = get_post_custom_values('card_credits')[0];
$card_durations = get_post_custom_values('card_durations')[0];
$card_modalidades = get_post_custom_values('card_modalidades')[0];
$card_language = get_post_custom_values('card_language')[0];
$card_price = get_post_custom_values('card_price')[0];
$card_link_video = get_post_custom_values('ctm_url_video')[0];
$card_media = get_attached_media('')[$id_card_media];
//var_dump($card_media);
?>

<article class="page-general page-services page-courses" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $background = '';
    if (has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $background = "style=background-image:url('" . $large_image_url[0] . "');";
    }
    ?>
    <header class="entry-header" <?= $background ?> >
        <?php the_title('<h1 class="entry-title">', '</h1>'); ?>
    </header><!-- .entry-header -->
    <div class="content-details">
        <div class="content-details_features">
            <div class="row">
                <div class="col-xs-6">
                    <div class="ctm_block ctm_ft_titulo">
                        <h4>Titulación</h4>
                        <p><?= $card_title ?></p>
                    </div>
                    <div class="ctm_block ctm_ft_teacher">
                        <h4>Dirección</h4>
                        <p><?= $card_teacher ?></p>
                    </div>
                    <div class="ctm_block ctm_ft_credit">
                        <h4>Créditos</h4>
                        <p><?= $card_credits ?></p>
                    </div>
                    <div class="ctm_block ctm_ft_time">
                        <h4>Duración</h4>
                        <p><?= $card_durations ?></p>
                    </div>
                </div>
                <div class="col-xs-6">
                    <div class="ctm_block ctm_ft_mode">
                        <h4>Modalidades</h4>
                        <p><?= $card_modalidades ?></p>
                    </div>
                    <div class="ctm_block ctm_ft_lang">
                        <h4>Idioma</h4>
                        <p><?= $card_language ?></p>
                    </div>
                    <div class="ctm_block ctm_ft_price">
                        <h4>Precio</h4>
                        <p><?= $card_price ?></p>
                    </div>
                    <div class="ctm_block ctm_ft_pay">
                        <p>Paga en cuotas sin intereses,<span>con becas de hasta el 20%</span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-details_media">
            <a href="<?= $card_link_video ?>" alt="<?= $card_media->post_title ?>">
                <img src="<?= $card_media->guid ?>" alt="<?= $card_media->post_title ?>">
            </a>
        </div>
        <div class="clear"></div>
    </div>
    <div class="content-container">
        <div class="ctm-entry-content">
            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'blue_ge'), 'after' => '</div>',));
                ?>
            </div><!-- .entry-content -->

            <?php if (get_edit_post_link()) : ?>
                <footer class="entry-footer">
                    <?php
                    edit_post_link(sprintf(wp_kses(/* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'blue_ge'), array('span' => array('class' => array(),),)), get_the_title()), '<span class="edit-link">', '</span>');
                    ?>
                </footer><!-- .entry-footer -->
            <?php endif; ?>
        </div>
        <?php get_sidebar(); ?>
        <div class="clear"></div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
