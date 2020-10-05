<?php

/**
 * Testimonial Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className"
$className = 'artwork-small';
if( ! empty($block['className'] ) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assing defaults.
$exhibitions = get_field( 'relation_artists_exhibitions', $post_id );
$vrs = get_field( 'relation_artists_vrs', $post_id );

?>

<?php if ( $exhibitions ) : ?>

<div class="extra__container extra__container--exhibitions">

    <h3 class="extra__title"><?php _e( 'Exhibitions:', 'mc2020' ); ?></h3>

    <ul class="extra__list">

        <?php foreach( $exhibitions as $exhibition ): 
            $permalink = get_permalink( $exhibition->ID );
            $title = get_the_title( $exhibition->ID );
        ?>

            <li class="extra__item">
                <a class="extra__link" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
            </li>

        <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>

<?php if ( $vrs ) : ?>

<div class="extra__container extra__container--viewingrooms">

<h3 class="extra__title"><?php _e( 'Viewing Rooms:', 'mc2020' ); ?></h3>

    <ul class="extra__list">

        <?php foreach( $vrs as $vr ): 
            $permalink = get_permalink( $vr->ID );
            $title = get_the_title( $vr->ID );
        ?>

            <li class="extra__item">
                <a class="extra__link" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a>
            </li>

        <?php endforeach; ?>

    </ul>

</div>

<?php endif; ?>
