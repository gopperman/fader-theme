<?php
/**
 * Template Name: Practice Areas Template
 */
while ( have_posts() ) : the_post();
  $id = get_the_ID();
  $hero = get_post_meta( $id, 'content_header')[0];
  $practice_areas = get_post_meta( $id, 'practice_areas' )[0];
  $featured_posts = get_post_meta( $id, 'featured_posts' )[0];
?>

  <div id="content-header" class="hero">
    <div class="container-fluid">
      <h2><?php echo wp_kses_post( get_the_title() ); ?></h2>
      <p><?php echo wp_kses_post( $hero['description'] ); ?></p>
    </div>
  </div>
  <div class="practice-areas">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3">
          <h3>Practice Areas</h3>
          <ul class="practice-areas__nav">
            <?php foreach ($practice_areas as $area) { ?>
              <li class="practice-areas__nav--item"><a class="practice-areas__nav--link"><?php echo wp_kses_post( $area['title'] ); ?></a>
            <?php } ?>
          </ul>
        </div>
        <div class="col-lg-9">
          <?php foreach ($practice_areas as $area) { ?>
            <div class="practice-areas__section">
              <h3 class="practice-areas__title"><?php echo wp_kses_post( $area['title'] ); ?></h3>
              <?php echo wp_kses_post( $area['content']); ?>
              <p><a href="<?php echo esc_url( get_permalink( $area['link'] ) ); ?>">Learn More about <?php echo wp_kses_post( $area['title'] ); ?></a></p>
            </div>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
  <div class="featured_posts">
    <div class="container-fluid">
      <h3>Featured Blog Posts</h3>
      <div class="row">
        <?php foreach ( $featured_posts as $featured_post ) { ?>
          <div class="col-md-4">
            <a href="<?php echo esc_url( get_permalink( $featured_post['post_link'] ) ); ?>" class="featured-post__link">
              <?php if ( has_post_thumbnail( $featured_post['post_link'] ) ) {
                $image = wp_get_attachment_image_src( get_post_thumbnail_id( $featured_post['post_link'] ), 'large' ); ?>
                <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title( $featured_post['post_link'] ) ); ?>"/>
              <?php } ?>
              <b><?php echo wp_kses_post( get_the_title( $featured_post['post_link'] ) ); ?></b>
            </a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<!--  <div class="worksheets">
    <div class="container-fluid">
      <h3>Resources</h3>
      <p><?php echo wp_kses_post( $worksheet_instructions ); ?></p>
      <div class="row">
        <?php foreach ( $worksheets as $ws ) { ?>
          <div class="col-sm-6 col-md-3">
            <a href="<?php echo esc_url( get_permalink( $ws['worksheet_link'] ) ); ?>" class="worksheet__link">
            <?php if ( has_post_thumbnail( $ws['worksheet_link'] ) ) {
              $image = wp_get_attachment_image_src( get_post_thumbnail_id( $ws['worksheet_link'] ), 'single-post-thumbnail' ); ?>
              <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title( $ws['worksheet_link'] ) ); ?>"/>
            <?php } ?>
            <b><?php echo wp_kses_post( get_the_title( $ws['worksheet_link'] ) ); ?></b></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>-->
<?php endwhile; ?>
