<?php
if ( ! is_active_sidebar( 'news-sidebar' ) ) {
  return;
}
?>

<aside class="widget-area" role="complementary">

  <?php dynamic_sidebar( 'news-sidebar' ); ?>

</aside>