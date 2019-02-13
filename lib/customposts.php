<?php

// Register Custom Post Type
function ligeti_custom_post_type() {

    $labels = array(
        'name'                  => _x( 'Works', 'Post Type General Name', 'marrakesh' ),
        'singular_name'         => _x( 'Reference', 'Post Type Singular Name', 'marrakesh' ),
        'menu_name'             => __( 'Works', 'marrakesh' ),
        'name_admin_bar'        => __( 'References', 'marrakesh' ),
        'archives'              => __( 'Item Archives', 'marrakesh' ),
        'attributes'            => __( 'Item Attributes', 'marrakesh' ),
        'parent_item_colon'     => __( 'Parent Item:', 'marrakesh' ),
        'all_items'             => __( 'All References', 'marrakesh' ),
        'add_new_item'          => __( 'Add New Item', 'marrakesh' ),
        'add_new'               => __( 'Add New', 'marrakesh' ),
        'new_item'              => __( 'New Item', 'marrakesh' ),
        'edit_item'             => __( 'Edit Item', 'marrakesh' ),
        'update_item'           => __( 'Update Item', 'marrakesh' ),
        'view_item'             => __( 'View Reference', 'marrakesh' ),
        'view_items'            => __( 'View References', 'marrakesh' ),
        'search_items'          => __( 'Search Reference', 'marrakesh' ),
        'not_found'             => __( 'Not found', 'marrakesh' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'marrakesh' ),
        'featured_image'        => __( 'Featured Image', 'marrakesh' ),
        'set_featured_image'    => __( 'Set featured image', 'marrakesh' ),
        'remove_featured_image' => __( 'Remove featured image', 'marrakesh' ),
        'use_featured_image'    => __( 'Use as featured image', 'marrakesh' ),
        'insert_into_item'      => __( 'Insert into item', 'marrakesh' ),
        'uploaded_to_this_item' => __( 'Uploaded to this item', 'marrakesh' ),
        'items_list'            => __( 'Items list', 'marrakesh' ),
        'items_list_navigation' => __( 'Items list navigation', 'marrakesh' ),
        'filter_items_list'     => __( 'Filter items list', 'marrakesh' ),
    );
    $args = array(
        'label'                 => __( 'Reference', 'marrakesh' ),
        'description'           => __( 'Post Type Description', 'marrakesh' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'page-attributes', 'custom-fields', 'excerpt' ),
        'taxonomies'            => array( 'prodcat'),
        'rewrite'               => array('slug' => 'referencia'),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 21,
        'menu_icon'             => 'dashicons-images-alt2',
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type( 'product', $args );

}
add_action( 'init', 'ligeti_custom_post_type', 0 );


function ligeti_add_reference_taxonomies(){

    $category_labels = array(
        'name' => __( 'Categories', 'brick'),
        'singular_name' => __( 'Reference Category', 'brick'),
        'search_items' =>  __( 'Search Reference Categories', 'brick'),
        'all_items' => __( 'All Reference Categories', 'brick'),
        'parent_item' => __( 'Parent Reference Category', 'brick'),
        'edit_item' => __( 'Edit Reference Category', 'brick'),
        'update_item' => __( 'Update Reference Category', 'brick'),
        'add_new_item' => __( 'Add New Reference Category', 'brick'),
        'menu_name' => __( 'Categories', 'brick')
    );

    register_taxonomy("prodcat",
            array("product"),
            array("hierarchical" => true,
                    'labels' => $category_labels,
                    'show_ui' => true,
                    'query_var' => true,
                    'rewrite' => array( 'slug' => 'referenciacsoport' )
    ));
}

add_action( 'init', 'ligeti_add_reference_taxonomies' );








add_filter( 'cmb_meta_boxes', 'single_metaboxes' );
function single_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'single_metabox',
		'title' => __('Sajtó'),
		'pages' => array('post'), // post Type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Sajtó cikk, és forrás'),
				'id' => $prefix . 'sajto',
				'type' => 'textarea_small'
			),
		)
		);
	return $meta_boxes;
}
add_filter( 'cmb_meta_boxes', 'product_metaboxes' );
function product_metaboxes( $meta_boxes ) {
	$prefix = '_cmb_'; // Prefix for all fields
	$meta_boxes[] = array(
		'id' => 'product_metabox',
		'title' => __('Product details'),
		'pages' => array('product'), // post Type
		'context' => 'normal',
		'priority' => 'high',
		'show_names' => true, // Show field names on the left
		'fields' => array(
			array(
				'name' => __('Date'),
				'id' => $prefix . 'date',
				'type' => 'text_small'
			),
			array(
				'name' => __('Price'),
				'id' => $prefix . 'price',
				'type' => 'text_small'
			),
			array(
				'name' => __('Anyag'),
				'id' => $prefix . 'anyag',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Szélessség'),
				'id' => $prefix . 'width',
				'type' => 'text_small'
			),
			array(
				'name' => __('Magasság'),
				'id' => $prefix . 'height',
				'type' => 'text_small'
			),
			array(
				'name' => __('Mélység'),
				'id' => $prefix . 'depth',
				'type' => 'text_small'
			),
			array(
				'name' => __('Felületkezelés'),
				'id' => $prefix . 'felület',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Készülhet még'),
				'id' => $prefix . 'keszulhet',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Alapterület'),
				'id' => $prefix . 'alap',
				'type' => 'text_small'
			),
			array(
				'name' => __('Helyszín'),
				'id' => $prefix . 'hely',
				'type' => 'text_medium'
			),
			array(
				'name' => __('Egyéb'),
				'id' => $prefix . 'egyeb',
				'type' => 'textarea_small'
			),
			array(
				'name' => 'Méretrajz',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'meretrajz',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Alaprajz',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'alaprajz',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
/********** Quote Part *************/
			array(
				'name' => __('Idézet'),
				'id' => $prefix . 'quote',
				'type' => 'textarea_small',
			),
			array(
				'name' => __('Idézet forrása'),
				'id' => $prefix . 'quote_src',
				'type' => 'textarea_small',
			),
			array(
				'name' => __('Idézet linkje'),
				'id' => $prefix . 'quote_link',
				'type' => 'text_small',
			),
			array(
				'name' => 'Photo I.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_1',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo II.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_2',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo III.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_3',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo IV.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_4',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo V.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_5',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo VI.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_6',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo VII.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_7',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo VIII.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_8',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo IX.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_9',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo X.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_10',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo XI.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_11',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
			array(
				'name' => 'Photo XII.',
				'desc' => 'Upload an image or enter an URL.',
				'id' => $prefix . 'photo_12',
				'type' => 'file',
				'save_id' => true, // save ID using true
				'allow' => array( 'url', 'attachment' ) // limit to just attachments with array( 'attachment' )
			),
		),
	);
	return $meta_boxes;
}
add_action( 'init', 'be_initialize_cmb_meta_boxes', 9999 );
function be_initialize_cmb_meta_boxes() {
	if ( !class_exists( 'cmb_Meta_Box' ) ) {
		require_once( 'cmb/init.php' );
	}
}
