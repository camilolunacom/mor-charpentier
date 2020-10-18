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
$className = 'biography-block';
if( ! empty($block['className'] ) ) {
    $className .= ' ' . $block['className'];
}

// Load values and assing defaults.
$shown = get_field( 'shown', $post_id )?: 'Always visible...';
$hidden = get_field( 'hidden', $post_id ) ?: 'Hidden...';

?>

<div id="<?php echo esc_attr($id); ?>" class="bio <?php echo esc_attr($className); ?>">

    <?php if ( $shown ) : ?>

        <div class="bio__shown">

            <?php echo $shown ?>

        </div>

    <?php endif; ?>

    <?php if ( $hidden ) : ?>

        <div class="bio__hidden">
            
            <?php echo $hidden ?>
            
        </div>
        
        <button class="btn bio__btn"><?php _e( 'Read more', 'mc2020' ); ?></button>

    <?php endif; ?>

</div>
