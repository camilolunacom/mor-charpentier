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

$en_cv = get_field( 'english_cv', $post_id );
$es_cv = get_field( 'spanish_cv', $post_id );
$fr_cv = get_field( 'french_cv', $post_id );

if ( ICL_LANGUAGE_CODE == 'es' && $es_cv ) {
    $cv = $es_cv;
} elseif ( ICL_LANGUAGE_CODE == 'fr' && $fr_cv  ) {
    $cv = $fr_cv;
} elseif ( $en_cv ) {
    $cv = $en_cv;
}

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

            <?php if ( $cv ) : ?>

                <p><a href="<?php echo $cv; ?>"><?php _e( 'Download CV', 'mc2020' ); ?></a></p>

            <?php endif; ?>
            
        </div>
        
        <button class="btn bio__btn"><?php _e( 'Read more', 'mc2020' ); ?></button>

    <?php endif; ?>

</div>
