
</div><!-- #content -->
<footer id="footer" class="site-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_first")) : ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-6 text-right">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_second")) : ?>
                <?php endif; ?>
            </div>
            <div class="col-sm-12">
                <?php if (!function_exists('dynamic_sidebar') || !dynamic_sidebar("footer_third")) : ?>
                <?php endif; ?>
            </div>
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
