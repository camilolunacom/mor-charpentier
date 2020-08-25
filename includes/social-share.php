<div class="share">

    <h4 class="share__title title-line">

        <?php _e( 'Share', 'mc2020' ); ?>

    </h4>

    <div class="sm-icons share__btns">

        <a class="sm-icons__link share__link" href="#" data-network="facebook" data-content="Test 1" data-url="<?php esc_attr( the_permalink() ); ?>">

            <svg class="sm-icons__svg" viewbox="0 0 40 40">
                <use xlink:href="#sm-facebook"></use>
            </svg>

        </a>

        <a class="sm-icons__link share__link" href="#" data-network="twitter" data-content="<?php echo get_the_title(); ?>" data-url="<?php esc_attr( the_permalink() ); ?>">

            <svg class="sm-icons__svg" viewbox="0 0 40 40">
                <use xlink:href="#sm-twitter"></use>
            </svg>

        </a>

    </div>

</div>