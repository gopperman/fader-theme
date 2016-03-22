<?php
  $id = get_the_ID();
  $header = get_post_meta( $id, 'content_header' )[0];
  $about = get_post_meta( $id, 'homepage_about' )[0];
  $content = get_post_meta( $id, 'homepage_content');
  $product = get_post_meta( $id, 'homepage_product' );
  var_dump( $product );
?>
<div id="content-header" class="hero" style="background:url(<?php echo esc_url( wp_get_attachment_url( $header['image'] ) ); ?>);">
  <div class="container">
    <h1><?php echo wp_kses_post( $header['header_text'] ); ?></h1>
    <h2><?php echo wp_kses_post( $header['header_description'] ); ?></h2>
    <?php if ( isset( $header['ctas'] ) ) {
      foreach ( $header['ctas'] as $cta ) { ?>
        <a class="cta" href="<?php echo esc_url( get_permalink( $cta['link'] ) ); ?>"><?php echo wp_kses_post( $cta['text'] ); ?></a>
      <?php }
    } ?>
  </div>
</div>
<div
<div id="about" class="container">
  <p><?php echo wp_kses_post( $about ); ?></p>
</div>
