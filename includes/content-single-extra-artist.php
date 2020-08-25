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
