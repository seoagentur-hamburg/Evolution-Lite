<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package Evolution Framework
 */
if (   ! is_active_sidebar( 'sidebar' ) ) {
	return;
}
?>

<div id="secondary" class="sidebar-area" role="complementary">
	<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>
	<div class="normal-sidebar widget-area">
		<?php dynamic_sidebar( 'sidebar' ); ?>
	</div><!-- .normal-sidebar -->
	<?php endif; ?>
</div><!-- #secondary -->
