<?php
/**
 * Partial template for person
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<div class="col-md-4">
	<div class="single-person-loop">
		<img src="<?php echo motivation_profile_image();?>" alt="Profile image for <?php the_title();?>" class="single-profile-img">
		<a href="<?php echo motivation_person_link();?>">
	    	<?php the_title( '<h2 class="person-name">', '</h2>' ); ?>
	    </a>
	    <div class="person-title"><?php the_field('title');?></div>
	    <div class="contact">
	    	<?php echo motivation_email();?>
	    	<?php echo motivation_phone();?>
	    </div>
	    <?php //echo motivation_group();?>
     </div>
</div>           