<?php
$content = esc_attr( get_the_title() );
$permalink = get_permalink();
$link = esc_attr( $permalink );
$wa_number = "33";
$encoded_title = urlencode( $content );
$encoded_link = urlencode( $permalink );
$wa_encoded_message = urlencode( $encoded_title . " - " . $encoded_link );
$wa_link = "https://wa.me/?text=" . $wa_encoded_message;
$mail_link = "mailto:?subject=" . $content . "&body=" . $content . "%0A" . $encoded_link;
?>

<div class="share">

    <h4 class="share__title title-line">

        <?php _e( 'Share', 'mc2020' ); ?>

    </h4>


    <div class="sm-icons share__btns">

        <a class="sm-icons__link" href="<?php echo esc_url( $wa_link ); ?>" target="_blank">

            <svg xmlns="http://www.w3.org/2000/svg" class="sm-icons__svg" viewbox="0 0 40 40">
                <g id="sm-whatsapp" class="sm-icons__g sm-icons__g--twitter">
                    <circle class="sm-icons__circle" cx="20" cy="20" r="20"/>
                    <circle class="sm-icons__border" cx="20" cy="20" r="19"/>
                    <path class="sm-icons__brand" d="M29 19.92a9 9 0 01-9 8.92 8.9 8.9 0 01-4.26-1.08L11 29l1.27-4.62A8.93 8.93 0 0120 11a9.08 9.08 0 019 8.92zm-1.51 0a7.46 7.46 0 10-13.77 3.95l.17.28-.74 2.73 2.8-.73.27.16a7.48 7.48 0 0011.27-6.39zm-3 2.13a1.83 1.83 0 01-.12 1.06 2.27 2.27 0 01-1.51 1.06 4.29 4.29 0 01-2.67-.55 9.93 9.93 0 01-3.81-3.37 4.36 4.36 0 01-.91-2.31 2.51 2.51 0 01.78-1.86.81.81 0 01.59-.27h.43c.14 0 .32-.05.5.38s.63 1.55.69 1.66a.41.41 0 010 .39c-.43.85-.88.82-.66 1.22a6.14 6.14 0 003 2.65c.22.11.35.09.48-.06s.56-.65.71-.87.29-.19.5-.12 1.3.62 1.52.73.42.21.47.26z"/>
                </g>
            </svg>

        </a>

        <a class="sm-icons__link" href="<?php echo esc_url( $mail_link, 'mailto' ); ?>" target="_blank">

            <svg xmlns="http://www.w3.org/2000/svg" class="sm-icons__svg" viewbox="0 0 40 40">
                <g id="sm-whatsapp" class="sm-icons__g sm-icons__g--twitter">
                    <circle class="sm-icons__circle" cx="20" cy="20" r="20"/>
                    <circle class="sm-icons__border" cx="20" cy="20" r="19"/>
                    <path class="sm-icons__brand" d="M17.42 20.79c-4.67-3.38-5-3.68-6.1-4.52a.84.84 0 01-.32-.66v-.67a1.69 1.69 0 011.69-1.69h14.62A1.69 1.69 0 0129 14.94v.67a.84.84 0 01-.32.66c-1.08.84-1.43 1.14-6.1 4.52-.59.43-1.76 1.47-2.58 1.46s-2-1.03-2.58-1.46zM29 17.87v7.19a1.69 1.69 0 01-1.69 1.69H12.69A1.69 1.69 0 0111 25.06v-7.18a.21.21 0 01.34-.17c.79.61 1.83 1.39 5.42 4 .74.54 2 1.68 3.24 1.67s2.53-1.15 3.24-1.67c3.59-2.61 4.63-3.39 5.42-4a.21.21 0 01.34.16z"/>
                </g>
            </svg>

        </a>

        <a class="sm-icons__link share__link" href="#" data-network="facebook" data-content="<?php echo $content; ?>" data-url="<?php echo $link; ?>">

            <svg xmlns="http://www.w3.org/2000/svg" class="sm-icons__svg" viewbox="0 0 40 40">
                <g id="sm-facebook" class="sm-icons__g sm-icons__g--facebook">
                    <circle class="sm-icons__circle" cx="20" cy="20" r="20"/>
                    <circle class="sm-icons__border" cx="20" cy="20" r="19"/>
                    <path class="sm-icons__brand" d="M24.654 21.75l.555-3.62h-3.473v-2.349a1.81 1.81 0 012.041-1.955h1.579v-3.082a19.255 19.255 0 00-2.8-.245c-2.86 0-4.73 1.734-4.73 4.872v2.759h-3.182v3.62h3.179v8.75h3.913v-8.75z"/>
                </g>
            </svg>

        </a>

        <a class="sm-icons__link share__link" href="#" data-network="twitter" data-content="<?php echo $content; ?>" data-url="<?php echo $link; ?>">

            <svg xmlns="http://www.w3.org/2000/svg" class="sm-icons__svg" viewbox="0 0 40 40">
                <g id="sm-twitter" class="sm-icons__g sm-icons__g--twitter">
                    <circle class="sm-icons__circle" cx="20" cy="20" r="20"/>
                    <circle class="sm-icons__border" cx="20" cy="20" r="19"/>
                    <path class="sm-icons__brand" d="M27.944 16.426A8.811 8.811 0 0030 14.307a8.217 8.217 0 01-2.36.634 4.088 4.088 0 001.8-2.259 8.07 8.07 0 01-2.6.99 4.089 4.089 0 00-2.995-1.294 4.1 4.1 0 00-4.1 4.1 4.627 4.627 0 00.1.939 11.651 11.651 0 01-8.445-4.29 4.068 4.068 0 00-.562 2.073 4.1 4.1 0 001.827 3.409 4.128 4.128 0 01-1.853-.52v.051a4.1 4.1 0 003.288 4.022 4.334 4.334 0 01-1.08.138 5.166 5.166 0 01-.774-.063 4.106 4.106 0 003.833 2.844 8.209 8.209 0 01-5.089 1.752 8.483 8.483 0 01-.99-.051 11.583 11.583 0 006.294 1.84 11.582 11.582 0 0011.663-11.663c0-.177 0-.359-.013-.533z"/>
                </g>
            </svg>

        </a>

    </div>

</div>
