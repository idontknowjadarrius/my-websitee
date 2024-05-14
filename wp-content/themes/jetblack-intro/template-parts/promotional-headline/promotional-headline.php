<?php
/**
 * Template part for displaying Hero Content
 *
 * @package JetBlack
 */

$jetblack_visibility = jetblack_gtm( 'jetblack_promotional_headline_visibility' );

if ( ! jetblack_display_section( $jetblack_visibility ) ) {
	return;
}

$jetblack_args = array(
	'page_id' => absint( jetblack_gtm( 'jetblack_promotional_headline_page' ) ),
);

$jetblack_args['posts_per_page'] = 1;

$jetblack_loop = new WP_Query( $jetblack_args );

while ( $jetblack_loop->have_posts() ) :
	$jetblack_loop->the_post();
	?>

	<div id="promotional-headline-section" class="section promotional-headline-section text-aligncenter overlay-enabled" <?php echo has_post_thumbnail() ? 'style="background-image: url( ' .esc_url( get_the_post_thumbnail_url() ) . ' )"' : ''; ?>>
	<div class="promotion-inner-wrapper section-promotion">
		<div class="container">
			<div class="promotion-content">
				<div class="promotion-description">
					<?php the_title( '<h2>', '</h2>' ); ?>

					<?php jetblack_display_content( 'promotional_headline' ); ?>
				</div><!-- .promotion-description -->
			</div><!-- .promotion-content -->
		</div><!-- .container -->
	</div><!-- .promotion-inner-wrapper" -->
</div><!-- .section -->
<?php
endwhile;

wp_reset_postdata();
