<?php
/**
 * Single person partial template
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<header class="entry-header">

		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>


	</header><!-- .entry-header -->


	<div class="entry-content">
		<div class="row">
			<div class="col-md-4">
			</div>
			<div class="col-md-8 proj-details">
				<div class="pi-area"><span class="proj-cat">Principal Investigator:</span> <?php the_field('project_principal_investigator');?></div>
				<div class="collab-area"><span class="proj-cat">Collaborators:</span> <?php the_field('project_collaborators');?></div>
				<div class="funding-area"><span class="proj-cat">Funding Partners:</span> <?php the_field('project_funding_partner');?></div>
				<div class="description-area">
					<span class="proj-cat">Project Description:</span> 
					<?php the_content();?>
				</div>
			</div>
		</div>
	
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
