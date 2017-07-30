<?php
/**
 * The footer template
 *
 * @package Evolution Framework
 */

if (   ! is_active_sidebar( 'footer-1' )
	&& ! is_active_sidebar( 'footer-2' )
	&& ! is_active_sidebar( 'footer-3' )
	&& ! is_active_sidebar( 'footer-4' ) ) {
	return;
}
?>

<?php if ( is_active_sidebar( 'footer-1' ) || is_active_sidebar( 'footer-2' ) || is_active_sidebar( 'footer-3' ) || is_active_sidebar( 'footer-4' ) ) : ?>
	<div id="supplementary" class="footer-widget-area" role="complementary">
		<div class="footer-widget-wrapper">
			<div class="footer-widget">
				<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
				<div class="footer-widget-1 widget-area">
					<?php dynamic_sidebar( 'footer-1' ); ?>
				</div><!-- .footer-widget-1 -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
				<div class="footer-widget-2 widget-area">
					<?php dynamic_sidebar( 'footer-2' ); ?>
				</div><!-- .footer-widget-2 -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
				<div class="footer-widget-3 widget-area">
					<?php dynamic_sidebar( 'footer-3' ); ?>
				</div><!-- .footer-widget-3 -->
				<?php endif; ?>
				<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
				<div class="footer-widget-4 widget-area">
					<?php dynamic_sidebar( 'footer-4' ); ?>
				</div><!-- .footer-widget-4 -->
				<?php endif; ?>
			</div><!-- .footer-widget -->
		</div><!-- .footer-widget-wrapper -->
	</div><!-- #supplementary -->
<?php endif; ?>
