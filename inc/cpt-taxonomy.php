<?php
function fwd_register_custom_post_types()
{

    // Register Students
    $labels = array(
        'name'                  => _x('Students', 'post type general name'),
        'singular_name'         => _x('Students', 'post type singular name'),
        'menu_name'             => _x('Students', 'admin menu'),
        'name_admin_bar'        => _x('Students', 'add new on admin bar'),
        'add_new'               => _x('Add New', 'Student'),
        'add_new_item'          => __('Add New Student'),
        'new_item'              => __('New Student'),
        'edit_item'             => __('Edit Student'),
        'view_item'             => __('View Student'),
        'all_items'             => __('All Student'),
        'search_items'          => __('Search Student'),
        'parent_item_colon'     => __('Parent Student:'),
        'not_found'             => __('No Student found.'),
        'not_found_in_trash'    => __('No Student found in Trash.'),
        'archives'              => __('Student Archives'),
        'insert_into_item'      => __('Insert into Student'),
        'uploaded_to_this_item' => __('Uploaded to this Student'),
        'filter_item_list'      => __('Filter Students list'),
        'items_list_navigation' => __('Students list navigation'),
        'items_list'            => __('Students list'),
        'featured_image'        => __('Student featured image'),
        'set_featured_image'    => __('Set Student featured image'),
        'remove_featured_image' => __('Remove Student featured image'),
        'use_featured_image'    => __('Use as featured image'),
           
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_nav_menus'  => true,
        'show_in_admin_bar'  => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'students'),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-universal-access',
        'supports'           => array('title', 'thumbnail'),
        'template'           => array(
            'core/paragraph',
            array(
                'placeholder' => 'Add student name...'
            )
        ),
    );

    register_post_type('school-student', $args);

    // Staff CPT
    $labels = array(
        'name'               => _x('Staff', 'post type general name'),
        'singular_name'      => _x('Staff', 'post type singular name'),
        'menu_name'          => _x('Staff', 'admin menu'),
        'name_admin_bar'     => _x('Staff', 'add new on admin bar'),
        'add_new'            => _x('Add New', 'Staff'),
        'add_new_item'       => __('Add New Staff'),
        'new_item'           => __('New Staff'),
        'edit_item'          => __('Edit Staff'),
        'view_item'          => __('View Staff'),
        'all_items'          => __('All Staff'),
        'search_items'       => __('Search Staff'),
        'parent_item_colon'  => __('Parent Staff:'),
        'not_found'          => __('No Staff found.'),
        'not_found_in_trash' => __('No Staff found in Trash.'),
            
    );

    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'show_in_rest'       => true,
        'query_var'          => true,
        'rewrite'            => array('slug' => 'staff'),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 7,
        'menu_icon'          => 'dashicons-businesswoman',
        'supports'           => array('title'),
        'template'           => array(
            'core/paragraph',
            array(
                'placeholder' => 'Add staff name...'
            )
        ),
    );

    register_post_type('school-staff', $args);
}
add_action('init', 'fwd_register_custom_post_types');

function fwd_register_taxonomies()
{

    // Add Students Category taxonomy
    $labels = array(
        'name'              => _x('Students Categories', 'taxonomy general name'),
        'singular_name'     => _x('Students Category', 'taxonomy singular name'),
        'search_items'      => __('Search Students Categories'),
        'all_items'         => __('All Students Category'),
        'parent_item'       => __('Parent Students Category'),
        'parent_item_colon' => __('Parent Students Category:'),
        'edit_item'         => __('Edit Students Category'),
        'view_item'         => __('View Students Category'),
        'update_item'       => __('Update Students Category'),
        'add_new_item'      => __('Add New Students Category'),
        'new_item_name'     => __('New Students Category Name'),
        'menu_name'         => __('Students Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'student-categories'),
    );
    register_taxonomy('school-student-category', array('school-student'), $args);

    // Add Staff Category taxonomy
    $labels = array(
        'name'              => _x('Staff Categories', 'taxonomy general name'),
        'singular_name'     => _x('Staff Category', 'taxonomy singular name'),
        'search_items'      => __('Search Staff Categories'),
        'all_items'         => __('All Staff Category'),
        'parent_item'       => __('Parent Staff Category'),
        'parent_item_colon' => __('Parent Staff Category:'),
        'edit_item'         => __('Edit Staff Category'),
        'view_item'         => __('View Staff Category'),
        'update_item'       => __('Update Staff Category'),
        'add_new_item'      => __('Add New Staff Category'),
        'new_item_name'     => __('New Staff Category Name'),
        'menu_name'         => __('Staff Category'),
    );
    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_in_menu'      => true,
        'show_in_nav_menu'  => true,
        'show_in_rest'      => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array('slug' => 'staff-categories'),
    );
    register_taxonomy('school-staff-category', array('school-staff'), $args);
}
add_action('init', 'fwd_register_taxonomies');

function fwd_rewrite_flush()
{
    fwd_register_custom_post_types();
    fwd_register_taxonomies();
    flush_rewrite_rules();
}
add_action('after_switch_theme', 'fwd_rewrite_flush');
