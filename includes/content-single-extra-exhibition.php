<?php
$subtitle = get_field( 'subtitle' );
$artists = get_field( 'relation_artists_exhibitions' );
$vrs = get_field( 'relation_exhibitions_vrs' );
?>

<?php if ( $subtitle ) : ?>

    <div class="extra__sub-container">

        <h2 class="extra__subtitle"><?php echo $subtitle; ?></h2>

    </div>

<?php endif; ?>

<?php if ( $artists ) : ?>

    <div class="extra__container extra__container--exhibitions">

        <h3 class="extra__title"><?php _e( 'Artists:', 'mc2020' ); ?></h3>

        <ul class="extra__list">

            <?php foreach( $artists as $artist ): 
                $permalink = get_permalink( $artist->ID );
                $title = get_the_title( $artist->ID );
                $status = get_post_status( $artist->ID );
            ?>

                <?php if ( $status == 'published' ) : ?>

                    <li class="extra__item">
                        <a class="extra__link" href="<?php echo esc_url( $permalink ); ?>"><?php echo esc_html( $title ); ?></a> <?php echo esc_html( $status ); ?>
                    </li>

                <?php else : ?>

                    <li class="extra__item">
                        <?php echo esc_html( $title ); ?> <?php echo esc_html( $status ); ?>
                    </li>

                <?php endif; ?>

            <?php endforeach; ?>

        </ul>

    </div>

<?php endif; ?>

<?php if ( $vrs ) : ?>

    <div class="extra__container extra__container--viewingrooms">

    <h3 class="extra__title"><?php _e( 'Related Viewing Rooms:', 'mc2020' ); ?></h3>

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
