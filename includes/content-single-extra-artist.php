<?php
$subtitle = get_field( 'subtitle' );
$exhibitions = get_field( 'relation_artists_exhibitions' );
$vrs = get_field( 'relation_artists_vrs' );
?>

<?php if ( $subtitle ) : ?>

    <div class="extra__sub-container">

        <h2 class="extra__subtitle"><?php echo $subtitle; ?></h2>

    </div>

<?php endif; ?>
