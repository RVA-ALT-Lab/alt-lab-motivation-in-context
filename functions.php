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
		return '<img src="'. get_field('profile_image')['sizes']['person-profile'] . '" alt="Profile image for ' . get_the_title($post->ID) . '">';
	} else {
		return '<svg class="img-fluid profile-holder" alt="Blank profile image." height="250px" width="250px"  fill="#040a0c" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" x="0px" y="0px" viewBox="0 0 100 100" enable-background="new 0 0 100 100" xml:space="preserve"><g><path id="person" d="M65.42,56.671c-0.966-2.146-6.863-4.004-6.863-4.004c-2.201-0.774-2.873-1.552-3.076-1.946   c-0.022-0.048-0.041-0.091-0.058-0.128c0-0.006,0-0.011,0-0.019c0,0-0.014-0.047-0.034-0.123c0-0.001,0-0.002,0-0.002   c0,0.001,0,0.001,0,0.001c-0.084-0.306-0.295-1.086-0.295-1.279c0,0-0.011,0.063-0.035,0.172c-0.017-0.19-0.021-0.393-0.01-0.609   c0,0-0.018,0.02-0.052,0.055c0.731-0.936,1.325-2.007,1.718-3.098c0.672-0.67,1.016-2.301,1.016-2.301   c0.445-1.247,0.314-1.885,0.109-2.208c0.063-0.189,1.133-3.499-0.38-6.049c0,0-0.536-2.413-3.377-3.486   c-2.626-1.608-6.541-0.643-6.541-0.643c-4.771,0.805-5.794,6.417-5.794,6.417c-0.284,2.563,0.402,4.165,0.431,4.232   c-0.245,0.606,0.199,2.193,0.199,2.193c0.152,0.968,0.625,1.264,0.764,1.331c0.333,1.203,0.906,2.374,1.627,3.392   c-0.004-0.005-0.01-0.01-0.016-0.015c0,0,0.08,0.394,0.007,0.945c-0.011-0.057-0.016-0.09-0.016-0.09   c0,0.226-0.274,1.047-0.309,1.153c-0.002,0.006-0.005,0.012-0.008,0.019c-0.223,0.295-0.443,0.563-0.662,0.81   c-1.777,1.373-6.05,2.67-6.05,2.67c-1.858,0.715-2.645,1.787-2.645,1.787C32.321,59.923,32,63.995,32,63.995   c0.035,2.073,0.929,2.288,0.929,2.288c6.327,2.824,16.393,2.988,16.393,2.988c10.188,0.215,17.456-2.561,17.456-2.561   c1.078-0.682,1.109-1.216,1.109-1.216C68.637,58.99,65.42,56.671,65.42,56.671z"></path><path id="cog" d="M87.477,49.995l-0.408-4.043c2.667-1.07,5.315-2.305,7.932-3.713c-0.489-3.381-1.825-6.622-2.809-9.9   c-2.969,0.238-5.888,0.638-8.728,1.188l-1.94-3.574c-0.604-1.218-1.649-2.137-2.456-3.221c1.655-2.334,3.2-4.802,4.624-7.392   c-2.163-2.662-5.11-4.562-7.698-6.794c-2.321,1.727-4.604,3.703-6.687,5.684l-3.573-1.94c-1.142-0.768-2.54-0.923-3.804-1.398   c0.129-2.849,0.093-5.756-0.113-8.699c-3.247-1.216-6.772-1.029-10.159-1.497c-1.019,2.621-1.862,5.418-2.536,8.293l-4.049,0.408   c-1.357,0.079-2.695,0.269-3.971,0.768c-1.422-2.446-3.015-4.85-4.771-7.193c-3.372,0.82-6.346,2.571-9.358,4.235   c0.621,2.85,1.31,5.493,2.293,8.263l-3.135,2.585c-1.034,0.875-2.161,1.655-2.945,2.779c-2.513-1.281-5.149-2.437-7.883-3.456   c-2.36,2.528-3.991,5.557-5.574,8.618c2.043,2.058,4.116,3.938,6.355,5.708l-1.208,3.883c-0.314,1.31-0.996,2.549-1.007,3.924   c-2.796,0.285-5.622,0.738-8.461,1.364c-0.542,3.42-0.542,6.831,0,10.249c2.84,0.631,5.667,1.081,8.461,1.369   c0.014,1.372,0.695,2.609,1.01,3.924l1.206,3.883c-2.24,1.766-4.31,3.648-6.355,5.708c1.585,3.058,3.214,6.087,5.574,8.615   c2.739-1.02,5.373-2.176,7.886-3.459c0.782,1.125,1.912,1.904,2.945,2.78l3.137,2.59c-0.983,2.768-1.677,5.411-2.295,8.26   c3.012,1.667,5.986,3.415,9.361,4.235c1.755-2.343,3.346-4.746,4.77-7.189c1.276,0.494,2.609,0.684,3.972,0.765l4.044,0.408   c0.674,2.875,1.521,5.672,2.541,8.293c3.384-0.468,6.907-0.283,10.157-1.496c0.206-2.945,0.242-5.853,0.112-8.699   c1.264-0.478,2.66-0.638,3.802-1.4l3.573-1.938c2.082,1.981,4.367,3.955,6.691,5.68c2.588-2.229,5.53-4.13,7.693-6.795   c-1.422-2.588-2.969-5.056-4.624-7.389c0.807-1.084,1.854-2.003,2.456-3.224l1.94-3.573c2.837,0.554,5.759,0.954,8.728,1.187   c0.981-3.275,2.317-6.516,2.809-9.897c-2.614-1.408-5.265-2.646-7.932-3.713L87.477,49.995z M62.044,75.641   c-4.911,1.856-10.375,3.344-15.71,2.183c-5.238-0.835-10.48-2.828-14.393-6.581c-4.007-3.507-7.293-8.097-8.555-13.325   c-1.638-5.094-1.638-10.74,0-15.836c1.264-5.229,4.55-9.816,8.555-13.325c3.914-3.751,9.157-5.747,14.39-6.581   c5.337-1.163,10.798,0.326,15.712,2.183c4.958,2.166,8.927,6.058,12.023,10.397c2.967,4.549,4.168,9.878,4.54,15.241   c-0.369,5.365-1.573,10.694-4.54,15.241C70.971,69.58,67.004,73.475,62.044,75.641z"></path></g></svg>';
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


//THEME PAGE

function motivation_projects(){
	global $post;
	$html = '';
	if( have_rows('project') ):
		$html .= '<div class="col-md-2"><h2>Projects</h2><img src="'.  get_stylesheet_directory_uri() . '/imgs/project_clipboard.svg" class="img-fluid project-img" alt="Clipboard icon."></div>';
		$html .= '<div class="col-md-10"><ul>';
    // Loop through rows.
	    while( have_rows('project') ) : the_row();

	        // Load sub field value.
	        $project_title = get_sub_field('project_title');
	        $project_description = get_sub_field('project_description');
	        $project_pi = get_sub_field('project_principal_investigator');
	        $project_collaborators = get_sub_field('project_collaborators');
	        $project_funders = get_sub_field('project_funding_partner');

	        // Do something...
	        $html .= '<li><h3>' . $project_title . '</h3>';
	        $html .= '<div class="project-people">';
	        if ($project_pi){
	        	$html .= '<div class="proj-pi">PI: ' . $project_pi . '</div>';
	        }
	        if ($project_collaborators){
	        	$html .= '<div class="proj-collab">Collaborators: ' . $project_collaborators . '</div>';
	        }
	         if ($project_funders){
	        	$html .= '<div class="proj-funder">Project Funders: ' . $project_funders . '</div>';
	        }
	        $html .= '</div>' ;
	        $html .= '<div class="proj-descripton">' . $project_description . '</div></li>';
	    // End loop.
	    endwhile;

	// No value.
	else :
	    // Do something...
	endif;
	return $html . '</ul></div>';
}

 //print("<pre>".print_r($a,true)."</pre>");}
