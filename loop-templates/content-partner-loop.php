<?php
/**
 * Partial template for partners display
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-4">
	<div class="single-person-loop">
		<?php echo motivation_partner_image();?>
		<h2 class="person-name">
			<a href="<?php echo motivation_person_link();?>">
	    		<?php the_title(); ?>
	    	</a>
	    </h2>
	    <div class="person-title"><?php the_field('title');?></div>
	    <div class="contact">
	    	<?php echo motivation_email();?>
	    	<?php echo motivation_phone();?>
	    </div>
	    <?php //echo motivation_group();?>
     </div>
</div>           