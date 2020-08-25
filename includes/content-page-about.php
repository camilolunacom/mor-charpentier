<article <?php post_class(); ?>>
	
	<header class="entry-header">

		<?php the_title( '<h1 class="section__title">', '</h1>'); ?>

	</header>

	<div class="entry-content">

		<svg viewBox="0 0 160 32" class="main-header__logo-img">
          <use xlink:href="#logo"></use>
        </svg>

		<?php esc_html( the_field( 'schedule' ) ); ?>

		<?php esc_html( the_field( 'address_field_1' ) ); ?>

		<?php esc_html( the_field( 'address_field_2' ) ); ?>

		<?php esc_html( the_field( 'address_field_3' ) ); ?>

		<?php esc_html( the_field( 'phone' ) ); ?>

		<?php esc_html( the_field( 'phone_display' ) ); ?>

		<?php $images = get_field( 'image_gallery' ); ?>

		<?php if ( $images ) : ?>

			<div class="glide">

				<div class="glide__track" data-glide-el="track">

					<ul class="glide__slides">

					<?php foreach( $images as $image_id ): ?>

						<li class="glide__slide">

							<?php echo wp_get_attachment_image( $image_id, 'full' ); ?>

						</li>

					<?php endforeach; ?>

					</ul>
				</div>

				<div class="glide__arrows" data-glide-el="controls">
					<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
					<svg class="slider-arrow" viewBox="0 0 200 330">
						<use xlink:href="#arrow-left"></use>
					</svg>
					</button>
					<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
					<svg class="slider-arrow" viewBox="0 0 200 330">
						<use xlink:href="#arrow-right"></use>
					</svg>
					</button>
				</div>

			</div>

		<?php endif; ?>

		<?php the_content(); ?>

	</div>

</article>
