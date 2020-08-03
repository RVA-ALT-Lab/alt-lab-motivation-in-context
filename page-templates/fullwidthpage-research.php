<?php
/**
 * Template Name: Research Full Width Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}
?>

<div class="wrapper" id="full-width-page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">

			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();
						get_template_part( 'loop-templates/content', 'page-research' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) {
							comments_template();
						}
					}
					?>

				</main><!-- #main -->

			</div><!-- #primary -->

		</div><!-- .row end -->
		<!--research-->		

	</div><!-- #content -->

</div><!-- #full-width-page-wrapper -->

<div class="wrapper" id="research-box">
	<div class="container">
		<div class="row research-row">
				<div class="col-md-8">
					<h2 id="publications">Publications</h2>
					<div class="row" id="all-research">
						<?php motivation_research();?>
					</div>
				</div>
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/paper.svg" class="img-fluid research-img" alt="Icon representing publications that says new publications in binary.">
				</div>
				
			</div>
			<!--end research-->
			<!--presentation-->
			<div class="row presentation-row">
				<div class="col-md-4">
					<img src="<?php echo get_stylesheet_directory_uri();?>/imgs/presentation.svg" class="img-fluid research-img" alt="Icon representing presentations.">
				</div>
				<div class="col-md-8">
					<h2 id="presentations">Presentations</h2>
					<div class="row" id="all-research">
						<?php motivation_presentations();?>
					</div>
				</div>				
			</div>
			<!--end presentation-->
		</div>
</div>

<?php
get_footer();
