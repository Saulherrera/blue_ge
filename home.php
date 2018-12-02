<?php
/**
 * Template Name: Home Page
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header();
$last_post         = wp_get_recent_posts( [ 'numberposts' => 1 ] )[0];
$background_latest = get_the_post_thumbnail_url( $last_post['ID'], 'full' );
$background_latest = ( $background_latest ) ? "style=background-image:url('" . $background_latest . "');" : '';


?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
		<?php
		$id = ( get_option( 'page_for_posts' ) );
		?>
        <article class="page-general page-home" id="post-<?= $id ?>" <?php post_class(); ?>>
			<?php
			$background = get_the_post_thumbnail_url( $id, 'full' );
			if ( $background != null ) {
				$background = "style=background-image:url('" . $background . "');";
			}
			?>
            <header class="entry-header" <?= $background ?> >
				<?= '<h1 class="entry-title">' . get_the_title( $id, true ) . '</h1>' ?>
            </header><!-- .entry-header -->
            <div class="content-container">
                <div class="ctm-entry-content">
                    <div class="row main-text">
                        <div class="col-sm-6">
                            <h1><?= get_post_custom( $id )['main_text_title'][0] ?></h1>
                        </div>
                        <div class="col-sm-6">
							<?= get_post_custom( $id )['main_text_content'][0] ?>
                        </div>
                    </div>
					<?php if ( $background_latest ) ?>
                    <div class="row main-lastest-post" <?= $background_latest ?>>
                        <div class="col-sm-12 main-lastest-post-shadow">
                            <div class="row">
                                <div class="col-sm-12">
                                    <h2>Ultimas noticias</h2>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-5 col-sm-push-3">
                                    <h1><?= $last_post['post_title'] ?></h1>
                                    <p><?= substr( $last_post['post_content'], 0, 200 ) . '...' ?></p>
                                </div>
                                <div class="col-sm-3  col-sm-push-3 text-right main-latest-post-date">
                                    <p><a href="<?= $last_post['post_name'] ?>">Leer más</a></p>
                                    <p><?= date( 'Y-m-d', strtotime( $last_post['post_date'] ) ) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row white-space"></div>
                    <div class="row">
						<?php
						while ( have_posts() ) :
							the_post();
							get_template_part( 'template-parts/blog', 'entry' );
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

						endwhile; // End of the loop.
						?>
                    </div>
                </div>
				<?php
				if ( ! is_front_page() && is_home() ) {
					get_sidebar( 'blog' );
				}
				?>
                <div class="clear"></div>
            </div>
        </article><!-- #post-<?php $id ?> -->
    </main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
?>
