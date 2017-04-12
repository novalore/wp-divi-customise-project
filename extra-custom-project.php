<?php
/*
Plugin Name: Extra custom project
Plugin URI:  http://blog.garethjmsaunders.co.uk/2015/03/07/changing-the-divi-projects-custom-post-type-to-anything-you-want/
Description: Change the Extra project custom post type to something else. (By default this changes Project to Property.) Updated for extra 2.5+.
Version:     1.2
Author:      Gareth J M Saunders
Author URI:  http://www.garethjmsaunders.co.uk
License:     GPL3
License URI: https://www.gnu.org/licenses/gpl-3.0.html
Text Domain: customise-divi-project
*/

function child_extra_register_posttypes() {
    $labels = array(
        'add_new'            => __( 'Aggiungi nuova', 'extra' ),
        'add_new_item'       => __( 'Aggiungi nuova attività', 'extra' ),
        'all_items'          => __( 'Tutti le attività', 'extra' ),
        'edit_item'          => __( 'Modifica attività', 'extra' ),
        'menu_name'          => __( 'Attività', 'extra' ),
        'name'               => __( 'Attività', 'extra' ),
        'new_item'           => __( 'Nuova attività', 'extra' ),
        'not_found'          => __( 'Nessuna trovata', 'extra' ),
        'not_found_in_trash' => __( 'Nessuna trovata nel cestino', 'extra' ),
        'parent_item_colon'  => '',
        'search_items'       => __( 'Ricerca attività', 'extra' ),
        'singular_name'      => __( 'Attività', 'extra' ),
        'view_item'          => __( 'Visualizza attività', 'extra' ),
    );

    $args = array(
        'can_export'         => true,
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'labels'             => $labels,
        'menu_icon'          => 'dashicons-store',
        'menu_position'      => 5,
        'public'             => true,
        'publicly_queryable' => true,
        'query_var'          => true,
        'show_in_nav_menus'  => true,
        'show_ui'            => true,
        'rewrite'            => apply_filters( 'et_project_posttype_rewrite_args', array(
            'feeds'          => true,
            'slug'           => 'attivita',
            'with_front'     => false,
        )),
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
    );

    register_post_type( 'project', apply_filters( 'et_project_posttype_args', $args ) );

    $labels = array(
        'name'              => _x( 'Categorie', 'Nome categoria attività', 'extra' ),
        'singular_name'     => _x( 'Categoria', 'Nome categoria al singolare', 'extra' ),
        'search_items'      => __( 'Ricerca categorie', 'extra' ),
        'all_items'         => __( 'Tutte le categorie', 'extra' ),
        'parent_item'       => __( 'Genitore', 'extra' ),
        'parent_item_colon' => __( 'Categoria genitore', 'extra' ),
        'edit_item'         => __( 'Modifica categoria', 'extra' ),
        'update_item'       => __( 'Aggiorna categoria', 'extra' ),
        'add_new_item'      => __( 'Aggiungi nuova categoria', 'extra' ),
        'new_item_name'     => __( 'Nome nuova categoria', 'extra' ),
        'menu_name'         => __( 'Categorie', 'extra' ),
    );

    register_taxonomy( 'project_category', array( 'project' ), array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    ) );

    $labels = array(
        'name'              => _x( 'Tags', 'Property Tag name', 'extra' ),
        'singular_name'     => _x( 'Tag', 'Property tag singular name', 'extra' ),
        'search_items'      => __( 'Search Tags', 'extra' ),
        'all_items'         => __( 'All Tags', 'extra' ),
        'parent_item'       => __( 'Parent Tag', 'extra' ),
        'parent_item_colon' => __( 'Parent Tag:', 'extra' ),
        'edit_item'         => __( 'Edit Tag', 'extra' ),
        'update_item'       => __( 'Update Tag', 'extra' ),
        'add_new_item'      => __( 'Add New Tag', 'extra' ),
        'new_item_name'     => __( 'New Tag Name', 'extra' ),
        'menu_name'         => __( 'Tags', 'extra' ),
    );

    register_taxonomy( 'project_tag', array( 'project' ), array(
        'hierarchical'      => false,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
    ) );

    $labels = array(
        'name'               => _x( 'Layouts', 'Layout type general name', 'extra' ),
        'singular_name'      => _x( 'Layout', 'Layout type singular name', 'extra' ),
        'add_new'            => _x( 'Add New', 'Layout item', 'extra' ),
        'add_new_item'       => __( 'Add New Layout', 'extra' ),
        'edit_item'          => __( 'Edit Layout', 'extra' ),
        'new_item'           => __( 'New Layout', 'extra' ),
        'all_items'          => __( 'All Layouts', 'extra' ),
        'view_item'          => __( 'View Layout', 'extra' ),
        'search_items'       => __( 'Search Layouts', 'extra' ),
        'not_found'          => __( 'Nothing found', 'extra' ),
        'not_found_in_trash' => __( 'Nothing found in Trash', 'extra' ),
        'parent_item_colon'  => '',
    );

    $args = array(
        'labels'             => $labels,
        'public'             => false,
        'can_export'         => true,
        'query_var'          => false,
        'has_archive'        => false,
        'capability_type'    => 'post',
        'hierarchical'       => false,
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'revisions', 'custom-fields' ),
    );

    register_post_type( 'et_pb_layout', apply_filters( 'et_pb_layout_args', $args ) );
}

function remove_extra_actions() {
    remove_action( 'init', 'extra_register_posttypes', 15 );
}

add_action( 'init', 'remove_extra_actions');
add_action( 'init', 'child_extra_register_posttypes', 20 );
?>
