<article <?php post_class( 'current-exhibition' ); ?>>

	<?php if ( has_post_thumbnail() ) {

	$bg = get_the_post_thumbnail_url( get_the_ID(), 'news-grid' );

	} else {

	$bg = get_template_directory_uri() . '/assets/img/placeholder.svg';

	} ?>

	<div class="grid__container" style="background-image: url('<?php echo esc_url( $bg ); ?>');">
			
		<header class="entry-header">
			
		<?php the_title( '<h2 class="single-news__title"><a href="' . esc_url( get_the_permalink() ) . '">', '</a></h2>'); ?>
		<div class="meta">
			<?php
			if ( function_exists('icl_object_id') && ICL_LANGUAGE_CODE == 'fr' ) {
				the_time( 'j F Y' );
			} else {
				the_time( 'F j, Y' );
			}
			?>
		</div>
		
		</header>

		<div class="entry-content">
		
		<?php the_excerpt(); ?>
		
		</div>

	</div>

</article>
