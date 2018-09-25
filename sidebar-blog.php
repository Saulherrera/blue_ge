<aside id="secondary" class="widget-area">
    <div class="sidebar-content">
        <img src="<?= get_template_directory_uri() ?>/img/logo_ge_white.png" alt="Gestor Energético">
		<?php
		wp_nav_menu( array(
			'theme_location' => 'sidebar-2',
			'menu_id'        => 'sidebar-second',
		) );
		?>
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
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
    </div>
    <div class="clear"></div>
</aside><!-- #secondary -->
