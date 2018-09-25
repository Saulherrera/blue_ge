<?php
?>

<div class="page-general page-home" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $background = '';
    if (has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $background = "style=background-image:url('" . $large_image_url[0] . "');";
    }
    ?>
    <header class="entry-header" <?= $background ?> >
        <?= '<h1 class="entry-title">' . '</h1>' ?>
    </header><!-- .entry-header -->
    <div class="content-container">
        <div class="ctm-entry-content">
            <div class="entry-content">
                <?php
                the_content();

                wp_link_pages(array('before' => '<div class="page-links">' . esc_html__('Pages:', 'blue_ge'), 'after' => '</div>',));
                ?>
            </div><!-- .entry-content -->

        </div>
        <div class="clear"></div>
    </div>
</div><!-- #post-<?php the_ID(); ?> -->
