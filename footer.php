  </div> <!-- #content -->

  <footer class="footer" role="contentinfo">

    <?php

    $part1 = '<a href="https://www.alunizar.co" target="_blank" rel="nofollow noopener">';
    $part2 = '</a>';

    ?>

    <div class="footer__col footer__col--exhibition">

    <?php get_template_part( 'includes/current-exhibition' ); ?>

    </div>

    <div class="footer__col footer__col--credits">
      <p id="footer__info">
        &copy; <?php echo date("Y"); ?> <a href="<?php esc_url( bloginfo( 'url' ) ); ?>"><?php esc_html__( bloginfo( 'name' ) ); ?></a>.<br>
        <?php _e('All rights reserved.', 'alunizar-child'); ?><br>
        <?php printf(__('By %1$sAlunizar%2$s.', 'alunizar-child'), $part1, $part2);?>
      </p>
    </div>

    <div class="footer__col footer__col--contact">

      <a class="footer__email" href="<?php esc_url( 'mailto:contact@mor-charpentier.com', 'mc2020' ); ?>"><?php _e( 'contact@<br>mor-charpentier.com', 'mc2020' ); ?></a>
      <?php get_template_part( 'includes/social-links' ); ?>

    </div>

  </footer>

</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
