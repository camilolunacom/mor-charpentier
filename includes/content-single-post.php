<div class="single-post__col single-post__col--1">

    <?php if ( has_post_thumbnail() ) : ?>

        <?php echo get_the_post_thumbnail( get_the_ID(), 'news' ); ?>

    <?php else : ?>

        <div class="img-placeholder" width="600" height="360">

            <svg viewBox="0 0 600 360" class="icon shape-codepen">
                <use xlink:href="#placeholder"></use>
            </svg>

        </div>

    <?php endif; ?>

</div>

<div class="single-post__col single-post__col--2">

    <p class="single-post__date"><?php echo get_the_date(); ?></p>

    <div class="single-post__content">

        <?php the_content(); ?>

    </div>

    <?php $external_link = get_field( 'external_link' ); ?>

    <?php if ( $external_link ) : ?>

        <a class="btn single-post__btn" href="<?php echo $external_link; ?>" target="_blank">
            <?php _e( 'View more', 'mc2020' ); ?>
        </a>

    <?php endif; ?>

    <?php get_template_part( 'includes/social-share' ); ?>

</div>
