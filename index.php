<?php $categories = get_categories(); ?>
<div class="container-fluid">
  <div class="row">
    <main class="col-md-7">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('templates/content', 'excerpt'); ?>
      <?php endwhile; ?>
      <div class="nav-previous button__cta button__cta-purple alignleft"><?php next_posts_link( 'Older posts' ); ?></div>
      <div class="nav-next button__cta button__cta-purple alignright"><?php previous_posts_link( 'Newer posts' ); ?></div>
    </main>
    <aside class="col-md-5">
      <h4>Post Categories</h4>
      <?php foreach ( $categories as $cat ) { ?>
        <a class="button__cat" href="<?= get_category_link( $cat->cat_ID ); ?>"><?= $cat->name ?></a>
      <? } ?>
    </aside>
  </div>
</div>
