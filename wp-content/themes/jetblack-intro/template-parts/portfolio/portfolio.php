<?php
/**
 * Template part for displaying Service
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package JetBlack
 */

$jetblack_visibility = jetblack_gtm( 'jetblack_portfolio_visibility' );

if ( ! jetblack_display_section( $jetblack_visibility ) ) {
	return;
}

$jetblack_style = jetblack_gtm( 'jetblack_portfolio_style' );

?>
<div id="portfolio-section" class="section-portfolio section page <?php echo esc_attr( $jetblack_style ); ?>">
	<div class="container">
		<?php jetblack_section_title( 'portfolio' ); ?>

		<?php get_template_part( 'template-parts/portfolio/post-type' ); ?>
	</div>
</div><!-- .section -->
