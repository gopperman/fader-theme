<main class="container-fluid">
  <?php get_template_part('templates/page', 'header'); ?>
  <?php while (have_posts()) : the_post(); ?>
    <?php get_template_part('templates/content', 'excerpt'); ?>
  <?php endwhile; ?>
  <div class="nav-previous alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
  <div class="nav-next alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
</main>
