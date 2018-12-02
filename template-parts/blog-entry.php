<div class="col-sm-4">
    <article class="page-blog-entry" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<?php
		$background = '';
		if ( has_post_thumbnail() ) {
			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'large' );
			$background      = "style=background-image:url('" . $large_image_url[0] . "');";
		}
		?>
        <header class="entry-header" <?= $background ?> >
        </header>
        <main>
            <h5><?= get_the_title() ?></h5>
            <p>
				<?= date( 'Y-m-d', strtotime( get_the_date() ) ) ?><br>
				<?= substr( get_the_content(), 0, 100 ) . '...' ?>
            </p>
º            <a href="<?= get_post_permalink() ?>">Leer más</a>
        </main>
        <div class="clear"></div>
    </article><!-- #post-<?php the_ID(); ?> -->
</div>
