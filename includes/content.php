<article <?php post_class(); ?>>
      
  <header class="entry-header">
      
    <?php the_title( '<h2>', '</h2>'); ?>
    <?php the_date( '', '<div class="meta>', '</div>' ); ?>
  
  </header>

  <div class="entry-content">
  
    <?php the_content(); ?>
  
  </div>

</article>
