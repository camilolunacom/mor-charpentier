  </div> <!-- #content -->

  <footer class="footer" role="contentinfo">

    <?php

    $part1 = '<a href="https://www.alunizar.co" target="_blank" rel="nofollow noopener">';
    $part2 = '</a>';

    ?>

    <div class="footer__col footer__col--1">

    <?php get_template_part( 'includes/current-exhibition' ); ?>

    </div>

    <div class="footer__col footer__col--2">
      <p id="footer__info">
        &copy; <?php echo date("Y"); ?> <a href="<?php bloginfo( 'url' ); ?>"><?php bloginfo( 'name' ); ?></a>.<br>
        <?php _e('All rights reserved.', 'alunizar-child'); ?><br>
        <?php printf(__('By %1$sAlunizar%2$s.', 'alunizar-child'), $part1, $part2);?>
      </p>
    </div>

    <div class="footer__col footer__col--3">

      <?php get_template_part( 'includes/social-links' ); ?>

    </div>

  </footer>

</div> <!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
