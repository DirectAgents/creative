<?php

// remove other locations from the list
add_filter( 'parse_query', 'modify_location' );
function modify_location($query) {
    global $pagenow,$post_type;
    $user = wp_get_current_user();
    if ( in_array( 'store_admin', $user->roles ) && $pagenow=='edit.php' && $post_type =='locations') {
        $allowed = get_user_meta( $user->ID, '16h_allowed_locations_ids', true );
        
        //debug
        //Williamsburg loc:
        // $allowed = array(356);
        
        $query->query_vars['post__in'] = $allowed; // todo get list pages 
    }
}

add_action( 'edit_user_profile', 'dt_16h_user_profile' );
function dt_16h_user_profile( $user )
{
    // only show this to admins
    if( ! current_user_can( 'manage_options' ) ) return;    

    // get the pages.
    $pages = get_posts(
        array(
            'post_type'     => 'locations',
            'numberposts'   => -1,
            'post_status'   => 'any',
            'orderby'       => 'title',
            'order'         => 'ASC'
        )
    );
    // Bail if we don't have pages.
    if( ! $pages ) return;

    // Which pages can our user edit?
    $allowed = get_user_meta( $user->ID, '16h_allowed_locations_ids', true );
    if( ! is_array( $allowed ) || empty( $allowed ) ) $allowed = array();

    // nonce-i-fy things
    wp_nonce_field( '16h_allowed_locations_nonce', '16h_allowed_locations_nonce' );


    
    // section heading...
    echo '<h3>' . __( 'Grant this User permission to edit following locations:' ) . '</h3>';
    echo '<p>' . __( '(Chose one or multiple locations)' ) . '</p>';
    echo '<select style="width:200px; height:300px" multiple="multiple" name="16h_allowed_locations[]">';
    echo '<option value="0">None</option>';
    foreach( $pages as $p )
    {
        // for use in checked() later...
        $selected = in_array( $p->ID, $allowed ) ? 'on' : 'off';
        echo '<option ' . selected( 'on', $selected, false ) . ' value="' . esc_attr( $p->ID ) . '">' . esc_html( $p->post_title ) . '</option>';
    }
    echo '</select>';
}

add_action( 'edit_user_profile_update', 'dt_16h_user_save' );
function dt_16h_user_save( $user_id )
{
    // verify nonce
    if( ! isset( $_POST['16h_allowed_locations_nonce'] ) || ! wp_verify_nonce( $_POST['16h_allowed_locations_nonce'], '16h_allowed_locations_nonce' ) )
        return;
    
    // make sure our fields are set
    if( ! isset( $_POST['16h_allowed_locations'] ) || ! current_user_can( 'manage_options' ) ) 
        return;

    $save = array();
    foreach( $_POST['16h_allowed_locations'] as $p )
    {
        $save[] = $p;
    }
    update_user_meta( $user_id, '16h_allowed_locations_ids', $save );
}


add_action( 'load-post.php', 'dt_kill_edit' );
function dt_kill_edit()
{

    $user = wp_get_current_user();
    if ( in_array( 'store_admin', $user->roles ) ) {

          $post_id = isset( $_REQUEST['post'] ) ? absint( $_REQUEST['post'] ) : 0;
          if( ! $post_id ) return;
      
          $allowed = get_user_meta( $user->ID, '16h_allowed_locations_ids', true ); 
    
          //debug
          //Williamsburg loc:
          // $allowed = array(356); 
    
          if( ! is_array( $allowed ) || empty( $allowed ) ) $allowed = array();

          // if the user can't edit this page, stop the loading...
          if( ! in_array( $post_id, $allowed ) )
          {
              wp_die( 
                  __( 'User cannot edit this page' ),
                  __( "You can't edit this post" ),
                  array( 'response' => 403 )
              );
          }
      }
}

//remove catering
add_filter('acf/load_field/name=features', 'my_acf_load_features');
function my_acf_load_features($field)
  {   
      if (!current_user_can( 'manage_options' )) {
        unset($field['choices']['catering']);
      }
      return $field;
  }
  
add_filter('acf/update_value/name=features', 'my_acf_update_features', 10, 3);
function my_acf_update_features($value, $post_id, $field)
{ 
  
  if (current_user_can( 'manage_options' )) {
    //admin
    if ( in_array('catering',$value) ) {
        update_post_meta($post_id,'_catering',true);
    } else {
        update_post_meta($post_id,'_catering',false);
    }
  } else {
        $catering = get_post_meta($post_id,'_catering',true);
        if ($catering) $value[] = 'catering';
  }
    return $value;
}


?>