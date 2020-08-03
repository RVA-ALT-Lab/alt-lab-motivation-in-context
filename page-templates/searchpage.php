<?php
/**
 * Template Name: Search Layout
 *
 * This template can be used to override the default template and sidebar setup
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="page-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content">

		<div class="row">
			<div class="col-md-12 content-area" id="primary">

				<main class="site-main" id="main" role="main">
					

					<?php
					while ( have_posts() ) {
						the_post();

						get_template_part( 'loop-templates/content', 'page' );
						
					}
					?>
				</main><!-- #main -->

			</div><!-- #primary -->
			
			<div class="col-md-6 text-search">
				<h3>Text Search</h3>
				<?php echo facetwp_display( 'facet', 'search' );?>
			</div>
			<div class="col-md-3">
				<h3>Time</h3>
				<?php echo facetwp_display( 'facet', 'time' );?>
			</div>
			<div class="col-md-3">
				<h3>Materials</h3>
				<?php echo facetwp_display( 'facet', 'material' ); //actual location is /inc/facet.php?>
			</div>
		</div>
		<div class="row">
			<div class="col-md-3">
				<div class="facet-box">
					<h3 class="filter-lead">Filter by theme:</h3>
					<h4>Computer Science</h4>
					<?php echo facetwp_display( 'facet', 'comp_sci_themes');?>
					<h4>Engineering</h4>
					<?php echo facetwp_display( 'facet', 'engineering_themes');?>	
					<h4>Math</h4>
					<?php echo facetwp_display( 'facet', 'math_themes');?>
					<h4>Science</h4>
					<?php echo facetwp_display( 'facet', 'science_themes');?>	
												
				</div>	
			</div>
			<div class="col-md-9">

					<?php echo facetwp_display( 'template', 'lesson_display' );?>
					<?php echo do_shortcode('[facetwp pager="true"]') ;?>
					<button class="btn btn-alp btn-dark" value="Reset" onclick="FWP.reset()" class="facet-reset" />Reset Filters</button>
			
			</div>
						

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #page-wrapper -->

<?php
get_footer();
