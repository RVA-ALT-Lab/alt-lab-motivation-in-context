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
	<div class="single-partner-loop">
		<?php echo motivation_partner_image();?>
		<h2 class="partner-name">
			<a href="<?php echo motivation_person_link();?>">
	    		<?php the_title(); ?>
	    	</a>
	    </h2>	   
     </div>
</div>           