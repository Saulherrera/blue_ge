<article class="page-services" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php
    $background = '';
    if (has_post_thumbnail()) {
        $large_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
        $background = "style=background-image:url('" . $large_image_url[0] . "');";
    }
    ?>
    <header class="entry-header">
        <?php the_title('<h1 class="entry-title" ' . $background . '>', '</h1>'); ?>
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        the_content();

        wp_link_pages(array(
            'before' => '<div class="page-links">' . esc_html__('Pages:', 'blue_ge'),
            'after' => '</div>',
        ));
        ?>
    </div><!-- .entry-content -->

    <?php if (get_edit_post_link()) : ?>
        <footer class="entry-footer">
            <?php
            edit_post_link(
                sprintf(
                    wp_kses(
                    /* translators: %s: Name of current post. Only visible to screen readers */
                        __('Edit <span class="screen-reader-text">%s</span>', 'blue_ge'),
                        array(
                            'span' => array(
                                'class' => array(),
                            ),
                        )
                    ),
                    get_the_title()
                ),
                '<span class="edit-link">',
                '</span>'
            );
            ?>
        </footer><!-- .entry-footer -->
    <?php endif; ?>
</article><!-- #post-<?php the_ID(); ?> -->
