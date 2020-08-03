<?php
/**
 * The template for displaying all single Person posts
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );
?>

<div class="wrapper" id="single-person-wrapper">

	<div class="<?php echo esc_attr( $container ); ?>" id="content" tabindex="-1">

		<div class="row">

			<!-- Do the left sidebar check -->
			<?php //get_template_part( 'global-templates/left-sidebar-check' ); ?>

			<main class="site-main col-md-12" id="main">
				<?php
				while ( have_posts() ) {
					the_post();
					get_template_part( 'loop-templates/content', 'single-person' );
					//understrap_post_nav();

					// If comments are open or we have at least one comment, load up the comment template.
					
				}
				?>

			</main><!-- #main -->

			<!-- Do the right sidebar check -->
			<?php //get_template_part( 'global-templates/right-sidebar-check' ); ?>

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #single-wrapper -->
<div class="news-area container">
	<h1>Research</h1>	
	<?php echo motivation_research(); ?>		
</div>

<?php
get_footer();
