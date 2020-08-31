<article <?php post_class(); ?>>

	<header class="entry-header">

		<?php the_title( '<h1 class="section__title">', '</h1>'); ?>

	</header>

	<div class="entry-content cols">

		<?php $images = get_field( 'image_gallery' ); ?>

		<?php if ( $images ) : ?>

			<div class="col-half">

				<div class="glide">

					<div class="glide__track" data-glide-el="track">

						<ul class="glide__slides">

						<?php foreach( $images as $image_id ): ?>

							<li class="glide__slide">

								<?php echo wp_get_attachment_image( $image_id, 'news' ); ?>

							</li>

						<?php endforeach; ?>

						</ul>
					</div>

					<div class="glide__arrows" data-glide-el="controls">
						<button class="glide__arrow glide__arrow--left" data-glide-dir="<">
							<svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330">
								<g id="arrow-left" class="slider-arrow__g">
									<path d="M5.3 152.18L152 5.31a18.11 18.11 0 0125.62 0l17.1 17.13a18.15 18.15 0 010 25.62L78.49 165l116.24 116.94a18.15 18.15 0 010 25.62l-17.1 17.13a18.11 18.11 0 01-25.62 0L5.31 177.82a18.14 18.14 0 01-.01-25.64z"/>
								</g>
							</svg>
						</button>
						<button class="glide__arrow glide__arrow--right" data-glide-dir=">">
							<svg xmlns="http://www.w3.org/2000/svg" class="slider-arrow" viewBox="0 0 200 330">
								<g id="arrow-right" class="slider-arrow__g">
									<path d="M194.7 177.82L48 324.69a18.11 18.11 0 01-25.62 0L5.31 307.56a18.15 18.15 0 010-25.62L121.51 165 5.27 48.06a18.15 18.15 0 010-25.62L22.41 5.31a18.11 18.11 0 0125.59 0l146.69 146.87a18.14 18.14 0 01.01 25.64z"/>
								</g>
							</svg>
						</button>
					</div>

				</div>

			</div>

		<?php endif; ?>

		<div class="col-half">

			<div class="about__image">
				<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 160 32" class="about__logo">
					<path d="M160 18.1v2.6h-3.6v8.4h-2.6v-11z"/>
					<path d="M149.2 23.6v.8h-8.1c.3 1.3 1.4 2.3 2.9 2.3 1.4 0 2.3-.7 2.7-1.2l.1-.1 1.8 1.9-.1.1c-1 1.2-2.7 1.9-4.5 1.9-3.2 0-5.6-2.4-5.6-5.6 0-1.5.6-3 1.6-4s2.5-1.6 4-1.6 2.8.5 3.7 1.5c.9.9 1.5 2.3 1.5 4zm-8-1.3h5.2c-.3-1.2-1.2-1.9-2.5-1.9s-2.3.7-2.7 1.9zM131.1 18.1h2.6v11h-2.6zM131.1 13.5h2.6v2.7h-2.6zM126.8 18.1l-.6 2.4h-2.7v4.7c0 1 .2 1.5 1.4 1.5h1.6v2.4h-2.2c-2.1 0-3.4-1.3-3.4-3.4v-5.2h-1.5l-.6-2.4h2.1v-2l2.6-1.3v3.3h3.3zM115.3 22.7v6.4h-2.6v-6.4c0-1.1-.8-2.3-2.3-2.3-1.2 0-2 .6-2.4 1.8v6.9h-2.6v-11h2.6v.9c.7-.6 1.7-1 2.9-1 1.3 0 2.5.5 3.3 1.3.7.8 1.1 2 1.1 3.4zM100.7 23.6v.8h-8.1c.3 1.3 1.4 2.3 2.9 2.3 1.4 0 2.3-.7 2.7-1.2l.1-.1 1.8 1.9-.1.1c-1 1.2-2.7 1.9-4.5 1.9-3.2 0-5.6-2.4-5.6-5.6 0-1.5.6-3 1.6-4s2.5-1.6 4-1.6 2.8.5 3.7 1.5c.9.9 1.5 2.3 1.5 4zm-8-1.3h5.2c-.3-1.2-1.2-1.9-2.5-1.9s-2.3.7-2.7 1.9zM80.3 18c3.2 0 5.6 2.4 5.6 5.6 0 3.2-2.4 5.6-5.6 5.6-1 0-2-.3-2.7-.8V33H75V18.1h2.6v.7c.7-.5 1.7-.8 2.7-.8zm2.9 5.6c0-.3 0-.7-.1-1 0-.1 0-.1-.1-.2v-.1c-.4-.9-1.1-1.6-2.1-1.8h-1.2-.1-.1c-.4.1-.8.3-1.2.5-.2.1-.4.3-.5.4l-.1.1-.2.2v3.6c0 .1.1.2.2.2l.1.1c.1.2.3.3.5.4.3.2.8.4 1.2.5h1.4c1-.2 1.8-.9 2.1-1.8v-.1c0-.1 0-.1.1-.2s.1-.5.1-.8zM70.7 18.1v2.6h-3.5v8.4h-2.6v-11zM59.3 18.1v11h-2.6v-.8c-.8.6-1.8 1-3 1-1.3 0-2.4-.4-3.2-1.1-.7-.7-1.1-1.6-1.1-2.6 0-1.1.4-2 1.2-2.6.8-.6 1.9-1 3.2-1 1 0 2 .2 2.8.5v-2h-5.9v-2.4h8.6zm-2.6 7.6v-.9c-.7-.4-1.5-.6-2.5-.6-1.3 0-2.2.5-2.2 1.4 0 .7.5 1.3 1.9 1.3 1.3 0 2.2-.5 2.8-1.2zM45.3 22.7v6.4h-2.5v-6.4c0-1.1-.8-2.3-2.3-2.3-1.2 0-2 .6-2.4 1.8v6.9h-2.5V13.7H38V19c.8-.6 1.8-1 2.9-1 1.3 0 2.4.5 3.2 1.3.8.8 1.2 2 1.2 3.4zM41.5.2v2.5H38v8.4h-2.6V.2zM31.5 5.6c0 1.5-.6 3-1.6 4-1.1 1-2.5 1.6-4.1 1.6-1.6 0-3-.6-4-1.6s-1.6-2.5-1.6-4c0-3.2 2.4-5.6 5.7-5.6s5.6 2.4 5.6 5.6zm-2.7 0c0-1.8-1.3-3.1-3-3.1s-3 1.3-3 3.1 1.3 3.1 3 3.1c1.8.1 3-1.2 3-3.1zM30.8 19.8l-1.7 1.9-.1-.1c-.4-.5-1.2-1.1-2.4-1.1-1.7 0-3 1.3-3 3.1s1.2 3.1 3 3.1c1.2 0 1.9-.6 2.4-1.1l.1-.1 1.8 1.8-.1.1c-1.1 1.2-2.5 1.8-4.2 1.8-3.2 0-5.6-2.4-5.6-5.6 0-3.2 2.4-5.6 5.6-5.6 1.7 0 3.1.6 4.2 1.8zM16.3.2v10.9h-2.5V2.7H9.5v8.4H6.9V2.7H2.6v8.4H0V.2z"/>
				</svg>
			</div>

			<?php the_content(); ?>

			<div class="about__schedule">

				<div class="about__schedule-title title-line">
					<?php _e( 'Open', 'mc2020' ); ?>
				</div>

				<div class="about__schedule-content">
					<?php the_field( 'schedule' ); ?>
				</div>

			</div>

		</div>

	</div>

</article>
