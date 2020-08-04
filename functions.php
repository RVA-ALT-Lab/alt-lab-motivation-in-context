<?php
/**
 * UnderStrap functions and definitions
 *
 * @package UnderStrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

$understrap_includes = array(
	'/theme-settings.php',                  // Initialize theme default settings.
	'/setup.php',                           // Theme setup and custom theme supports.
	'/widgets.php',                         // Register widget area.
	'/enqueue.php',                         // Enqueue scripts and styles.
	'/template-tags.php',                   // Custom template tags for this theme.
	'/pagination.php',                      // Custom pagination for this theme.
	'/hooks.php',                           // Custom hooks.
	'/extras.php',                          // Custom functions that act independently of the theme templates.
	'/customizer.php',                      // Customizer additions.
	'/custom-comments.php',                 // Custom Comments file.
	'/jetpack.php',                         // Load Jetpack compatibility file.
	'/class-wp-bootstrap-navwalker.php',    // Load custom WordPress nav walker. Trying to get deeper navigation? Check out: https://github.com/understrap/understrap/issues/567.
	'/woocommerce.php',                     // Load WooCommerce functions.
	'/editor.php',                          // Load Editor functions.
	'/deprecated.php',                      // Load deprecated functions.
	'/acf.php',                             // Load ACF functions.
);

foreach ( $understrap_includes as $file ) {
	require_once get_template_directory() . '/inc' . $file;
}


//News loop on the front page
function motivation_news(){
  $html = "";  
  $args = array(
      'posts_per_page' => 4,
      'post_type'   => 'post', 
      'post_status' => 'publish', 
      'category_name' => 'news',
      'nopaging' => false,
                    );
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post();
                      $clean_title = sanitize_title(get_the_title());
                      $html .= '<div class="col-md-6"><div class="news-article">';
                      $html .= '<h2><a href="'.get_the_permalink().'">' . get_the_title() . '</a></h2>';
                      $html .= '<p>' . get_the_excerpt() . '</p>';
                      $html .= '</div></div>';                            
                                             
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
   return '<div class="row news-wrapper">' . $html . '</div>';
}

function motivation_profile_image(){
	global $post;
	if(get_field('profile_image', $post->ID)['sizes']['person-profile']){
		return get_field('profile_image')['sizes']['person-profile'];
	} else {
		return get_stylesheet_directory_uri() . '/imgs/smiley_bubble.svg';
	}
}


function motivation_people(){
  $html = "";  
  $args = array(
      'posts_per_page' => 40,
      'post_type'   => 'person', 
      'post_status' => 'publish', 
      'orderby' => 'name',
      'order'   => 'ASC',
      'nopaging' => false,
                    );
    $the_query = new WP_Query( $args );
                    if( $the_query->have_posts() ): 
                      while ( $the_query->have_posts() ) : $the_query->the_post();
                       get_template_part( 'loop-templates/content', 'person-loop' );                 
                       endwhile;
                  endif;
            wp_reset_query();  // Restore global post data stomped by the_post().
}

add_image_size( 'person-profile', 350, 350, array( 'center', 'center' ) ); 

function motivation_person_link(){
	global $post;
	return get_the_permalink($post->ID);
}

function motivation_email(){
	global $post;
	if (get_field('email', $post->ID)){
		return '<div class="person-email"><a href="mailto:' . get_field('email', $post->ID) . '">' . get_field('email', $post->ID) . '</a></div>';
	}
}

function motivation_phone(){
	global $post;
	if (get_field('phone', $post->ID)){
		return '<div class="person-phone">' . get_field('phone', $post->ID) . '</div>';
	}
}

function motivation_group(){
	global $post;
	if (get_field('group', $post->ID)){
		return '<div class="person-group ' . get_field('group', $post->iD)[0]->slug . '">' . get_field('group', $post->iD)[0]->name . '</div>';
	}
}



function motivation_research(){
	global $post;
	$cats = wp_get_post_categories($post->ID);
	$cats_string = implode(', ', $cats);
	$html = "";  
	  $args = array(
	      'posts_per_page' => 40,
	      'post_type'   => 'research', 
	      'post_status' => 'publish', 
	      'orderby' => 'name',
	      'order'   => 'ASC',
	      'nopaging' => false,
	       'cat' => $cats_string,
	                    );
	    $the_query = new WP_Query( $args );
	                    if( $the_query->have_posts() ): 
	                      while ( $the_query->have_posts() ) : $the_query->the_post();
	                       //get_template_part( 'loop-templates/content', 'person-loop' );                 
	                      	$html .= '<div class="col-md-6"><h3>' . get_the_title() . '</h3>';
	                      	$html .= '<div class="pub-content">' . get_the_content() . '</div></div>';
	                       endwhile;
	                  endif;
	            wp_reset_query();  // Restore global post data stomped by the_post().
	            echo $html;
}

function motivation_presentations(){
	global $post;
	if( have_rows('presentation_details', $post->ID) ):
	    // Loop through rows.
	    while( have_rows('presentation_details', $post->ID) ) : the_row();
	    	get_template_part( 'loop-templates/content', 'presentation' );   
	        
	    // End loop.
	    endwhile;

	// No value.
	else :
	    // Do something...
	endif;

}

//change permalink on single person posts to do lastname first

function motivation_name_slug_reorder( $post_ID, $post, $update ) {
    // allow 'publish', 'draft', 'future'
    if ($post->post_type != 'person' || $post->post_status == 'auto-draft')
        return;

    // only change slug when the post is created (both dates are equal)
    if ($post->post_date_gmt != $post->post_modified_gmt)
        return;

    // use title, since $post->post_name might have unique numbers added
    $new_slug = sanitize_title( $post->post_title, $post_ID );
    $explode_name = explode(' ', $post->post_title);
    if (empty( $explode_name ))
        return; // No subtitle or already in slug

    $new_slug = end($explode_name). '-' . $explode_name[0];
    if ($new_slug == $post->post_name)
        return; // already set

    // unhook this function to prevent infinite looping
    remove_action( 'save_post', 'motivation_name_slug_reorder', 10, 3 );
    // update the post slug (WP handles unique post slug)
    wp_update_post( array(
        'ID' => $post_ID,
        'post_name' => $new_slug
    ));
    // re-hook this function
    add_action( 'save_post', 'motivation_name_slug_reorder', 10, 3 );
}
add_action( 'save_post', 'motivation_name_slug_reorder', 10, 3 );


 //print("<pre>".print_r($a,true)."</pre>");}
