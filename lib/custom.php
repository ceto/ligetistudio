<?php 
    // 1. customize ACF path
    add_filter('acf/settings/path', 'ligeti_acf_settings_path');
    function ligeti_acf_settings_path( $path ) {
    $path = get_stylesheet_directory() . '/lib/acf/';
    return $path;
    }
    // 2. customize ACF dir
    add_filter('acf/settings/dir', 'ligeti_acf_settings_dir');
    function ligeti_acf_settings_dir( $dir ) {
        $dir = get_stylesheet_directory_uri() . '/lib/acf/';
        return $dir;
    }
    
    // 3. Hide ACF field group menu item
    //add_filter('acf/settings/show_admin', '__return_false');
    
    // 4. Include ACF
    include_once( get_stylesheet_directory() . '/lib/acf/acf.php' );


    // if( function_exists('acf_add_options_page') ) {
	
    //     acf_add_options_page(array(
    //         'page_title' 	=> 'Global Settings',
    //         'menu_title'	=> 'Global',
    //         'menu_slug' 	=> 'global-options',
    //         'parent_slug'	=> 'edit.php?post_type=service',
    //         'capability'	=> 'edit_posts',
    //         'redirect'		=> false
    //     ));
    // }
    

function ligeti_modify_num_projects($query) {
    if ( ($query->is_main_query()) && ($query->is_archive('product') || $query->is_tax('prodcat') || $query->is_tax('project-attributes') ) && (!is_admin()) ) {
      $query->set('posts_per_page', -1);
      $query->set('orderby', 'menu_order');
      $query->set('order', 'ASC');
      $query->set('post_status', array('publish' ));
    }
}
add_action('pre_get_posts', 'ligeti_modify_num_projects');

// function ligeti_front_page_query($query) {
//     if (  $query->is_main_query() && $query->is_home() && !is_admin() )   {
//         $query->set('post_type', array('product'));
//         $query->set('posts_per_page', -1);
//         $query->set('orderby', 'menu_order');
//         $query->set('order', 'ASC');
//         $query->set('post_status', array('publish' ));
//     }
// }
// add_action('pre_get_posts', 'ligeti_front_page_query');