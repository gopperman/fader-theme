<?php
/**
 * Template Name: Book Template
 */
while ( have_posts() ) : the_post();
  $id = get_the_ID();
  $excerpts = get_post_meta( $id, 'book_excerpts' )[0];
  $testimonials = get_post_meta( $id, 'book_testimonials' )[0];
  $worksheets = get_post_meta( $id, 'book_worksheets')[0];
?>

  <div id="content-header" class="hero">
    <div class="container-fluid">
      <div class="col-xs-3">Book Photo</div>
      <div class="col-xs-8 col-xs-push-1">Featured Testimonial</div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <?= get_the_content(); ?>
      </div>
      <div class="col-md-4 excerpts">
        <h3>Excerpts</h3>
        <?php foreach ( $excerpts as $excerpt ) { ?>
          <h4><a href="<?php echo esc_url( get_permalink( $excerpt['excerpt_link'] ) ); ?>"><?php echo wp_kses_post( $excerpt['chapter'] ); ?>:</a></h4>
          <p><a href="<?php echo esc_url( get_permalink( $excerpt['excerpt_link'] ) ); ?>">
            <?php echo wp_kses_post( get_the_title( $excerpt['excerpt_link'] ) ); ?>
          </a></p>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <h4>What People Are Saying</h4>
    </div>
    <div class="row">
      <?php foreach ( $testimonials as $testimonial ) { ?>
        <div class="col-sm-4"><?php echo wp_kses_post( $testimonial['testimonial'] ); ?></div>
      <?php } ?>
    </div>
  </div>
  <div class="worksheets">
    <div class="container-fluid">
      <h3>Worksheets</h3>
      <p>Simple instructions</p>
      <div class="row">
        <?php foreach ( $worksheets as $ws ) { ?>
          <div class="col-sm-6 col-md-3">
            <?php if ( has_post_thumbnail( $ws['worksheet_link'] ) ) {
              $image = wp_get_attachment_image_src( $ws['worksheet_link'], 'single-post-thumbnail' ); ?>
              <img src="<?php echo esc_url( $image[0] ); ?>" alt="<?php echo esc_attr( get_the_title( $ws['worksheet_link'] ) ); ?>"/>
            <?php } ?>
            <a href="<?php esc_url( get_permalink( $ws['worksheet_link'] ) ); ?>" class="worksheet__link"><?php echo wp_kses_post( get_the_title( $ws['worksheet_link'] ) ); ?></b></a>
          </div>
        <?php } ?>
      </div>
    </div>
  </div>
<?php endwhile; ?>
