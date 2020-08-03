<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_template_part( 'sidebar-templates/sidebar', 'footerfull' ); ?>


<div class="news-area container">
<!-- 	<h1>News</h1>	
 -->	<?php //echo sci_dis_news(); ?>		
</div>

<div class="wrapper" id="wrapper-footer">

	<div class="<?php echo esc_attr( $container ); ?>">

		<div class="row">

			<div class="col-md-12">

				<footer class="site-footer" id="colophon">

					<div class="row">
		                <div class="col-md-6 text-white">
		                    <a href="https://www.vcu.edu/" title="footer link to VCU">
		                        <h3>Virginia Commonwealth University</h3>
		                    </a>

		                    <a href="https://soe.vcu.edu/" title="Link to the VCU School of Education.">
		                        <h4>School of Education</h4>
		                    </a>

		                    <p>1015 West Main Street<br>Box 842020<br>Richmond, VA 23284-2020</p>
		                </div>

		                <div class="col-md-6 text-white text-md-right">
		                    <small>
		                    	<a href="https://www.vcu.edu/vcu/privacy-statement.html" title="VCU privacy statement" target="_blank">Privacy</a> | <a href="http://accessibility.vcu.edu/" title="Accessibility at VCU" target="_blank">Accessibility</a> | <a href="mailto:webmaster@vcu.edu" title="Contact the VCU webmaster" target="_blank">Webmaster</a></span></small>
		                </div>
		            </div>

				</footer><!-- #colophon -->

			</div><!--col end -->

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

