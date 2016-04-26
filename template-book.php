<?php
/**
 * Template Name: Book Template
 */
while ( have_posts() ) : the_post();
  $id = get_the_ID();
  $hero = get_post_meta( $id, 'content_header')[0];
  $excerpts = get_post_meta( $id, 'book_excerpts' )[0];
  $testimonials = get_post_meta( $id, 'book_testimonials' )[0];
  $worksheet_instructions = get_post_meta( $id, 'book_worksheet_instructions' )[0];
  $worksheets = get_post_meta( $id, 'book_worksheets')[0];
?>

  <div id="content-header" class="hero">
    <div class="container-fluid">
      <div class="col-sm-4">
        <img src="<?php echo esc_url( wp_get_attachment_image_src( $hero['image'], 'full' )[0] ); ?>" />
      </div>
      <div class="col-sm-7 col-sm-offset-1">
        <div class="hero__description">
          <?php echo wp_kses_post( $hero['description'] ); ?>
        </div>
        <a href="<?php echo esc_url( $hero['ctas']['link'] ); ?>" class="button__cta"<?php if ( ! is_external( $hero['ctas']['link'] ) ) { ?> target="_blank"<?php } ?>>
          <?php echo wp_kses_post( $hero['ctas']['text'] ); ?>
        </a>
        <a href="https://itunes.apple.com/us/book/life-as-sport/id1073407286?mt=11" class="button__iBooks" target="_blank">
          <img src="/app/themes/fader/assets/images/iBooks.png" alt="iBook" />
        </a>
      </div>
    </div>
  </div>
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-8">
        <?= the_content(); ?>
      </div>
      <div class="col-sm-4 excerpts">
        <h3>Excerpts</h3>
        <?php foreach ( $excerpts as $excerpt ) { ?>
          <h4><a href="<?php echo esc_url( get_permalink( $excerpt['excerpt_link'] ) ); ?>"><?php echo wp_kses_post( $excerpt['chapter'] ); ?>:</a></h4>
          <p><a href="<?php echo esc_url( get_permalink( $excerpt['excerpt_link'] ) ); ?>">
            <?php echo wp_kses_post( get_the_title( $excerpt['excerpt_link'] ) ); ?>
          </a></p>
        <?php } ?>
      </div>
    </div>
    <div class="testimonials">
      <div class="row">
        <h4>What People Are Saying</h4>
      </div>
      <div class="row">
        <?php foreach ( $testimonials as $testimonial ) { ?>
          <div class="col-sm-4"><?php echo wp_kses_post( $testimonial['testimonial'] ); ?></div>
        <?php } ?>
      </div>
    </div>
  </div>
  <div class="worksheets">
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
  </div>
<?php endwhile; ?>
