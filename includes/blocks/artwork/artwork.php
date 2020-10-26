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
$artwork_id = get_field( 'artwork' ) ?: 'Artwork...';
$title = get_the_title( $artwork_id );
$artist_id = get_field( 'artist', $artwork_id );
$artist = get_the_title( $artist_id );
$images = get_field( 'artwork_images', $artwork_id );
$thumb = wp_get_attachment_image( $images[0], 'full' );
$availability = get_field( 'availability', $artwork_id );
$show_price = get_field( 'show_price', $artwork_id );
$price_raw = get_field( 'price', $artwork_id );
$price = number_format( $price_raw, 0, ',', ' ' );
$excerpt = get_field( 'short_description', $artwork_id );
$description = get_field( 'full_description', $artwork_id );
$form = do_shortcode( '[happyforms id="1986" /]' );
$price_message = __( 'Inquire for price', 'mc2020' );
$formatted_price = $price . ' €';
$actual_price = $show_price ? $formatted_price : $price_message;

?>

<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">

    <div class="artwork-small__thumbnail">
        <?php echo $thumb; ?>
    </div>

    <div class="artwork-small__short">

        <div class="artwork-small__info">
            <h3 class="artwork-small__title"><?php echo $title; ?></h3>
            <p class="artwork-small__artist"><?php echo $artist; ?></p>
            <p class="artwork-small__excerpt"><?php echo $excerpt; ?></p>
            <?php if ( $availability ) : ?><p class="artwork-small__price"><?php echo $actual_price; ?></p><? endif; ?>
        </div>

        <div class="artwork-small__btn-container">
            <button onclick="showArtwork(artwork<?php echo $artwork_id; ?>)" class="artwork-small__button btn"><?php _e( 'View artwork', 'mc2020' ); ?></button>
        </div>

    </div>

</div>

<script>
const artwork<?php echo $artwork_id; ?> = {
    image: `<?php echo $thumb; ?>`,
    title: `<?php echo $title; ?>`,
    artist: `<?php echo $artist; ?>`,
    excerpt: `<?php echo $excerpt; ?>`,
    availability: <?php echo ( $availability ? "true" : "false" ); ?>,
    showPrice: <?php echo ( $show_price ? "true" : "false" ); ?>,
    priceMessage: "<?php echo $price_message; ?>",
    price: <?php echo $price_raw; ?>,
    button: `<?php _e( 'Inquire', 'mc2020' ); ?>`,
    formElement: `<?php echo $form; ?>`,
    aboutTitle: `<?php _e( 'About the work', 'mc2020' ); ?>`,
    description: `<?php echo $description; ?>`,
}
</script>
