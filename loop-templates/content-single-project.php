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
			<div class="col-md-3">
				<?php echo motivation_project_thumb();?>
			</div>
			<div class="col-md-9 proj-details">
				<div class="pi-area proj-data-line">
					<div class="proj-cat proj-label">Principal Investigator:</div> 
					<div class="proj-data">
						<?php the_field('project_principal_investigator');?>						
					</div>
				</div>
				<div class="collab-area proj-data-line">
					<div class="proj-cat proj-label">Collaborators:</div>
					<div class="proj-data">
						<?php the_field('project_collaborators');?>
					</div>
				</div>
				<div class="funding-area proj-data-line">
					<div class="proj-cat proj-label">Funding Partners:</div> 
					<div class="proj-data">
						<?php the_field('project_funding_partner');?>
					</div>
				</div>
				<div class="description-area proj-data-line">
					<div class="proj-cat proj-label">Project Description:</div> 
					<div class="proj-data proj-description">
						<?php the_content();?>
					</div>
				</div>
			</div>
		</div>
	
	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_entry_footer(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
