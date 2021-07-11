<?php

    // ACF Local JSON Save
    add_filter('acf/settings/save_json', 'my_acf_json_save_point');
    function my_acf_json_save_point( $path ) {
        $path = get_stylesheet_directory() . '/acf-json';
        return $path;
    }

    // ACF Local JSON Load
    add_filter('acf/settings/load_json', 'my_acf_json_load_point');
    function my_acf_json_load_point( $paths ) {
        unset($paths[0]);
        $paths[] = get_stylesheet_directory() . '/acf-json';
        return $paths;
    }

    // Register Case Study CPT
    function cptui_register_my_cpts_case_study() {
        $labels = [
            "name" => __( "Case Studies", "custom-post-type-ui" ),
            "singular_name" => __( "Case Study", "custom-post-type-ui" ),
            "menu_name" => __( "Case Studies", "custom-post-type-ui" ),
            "all_items" => __( "All Case Studies", "custom-post-type-ui" ),
            "add_new" => __( "Add new", "custom-post-type-ui" ),
            "add_new_item" => __( "Add new Case Study", "custom-post-type-ui" ),
            "edit_item" => __( "Edit Case Study", "custom-post-type-ui" ),
            "new_item" => __( "New Case Study", "custom-post-type-ui" ),
            "view_item" => __( "View Case Study", "custom-post-type-ui" ),
            "view_items" => __( "View Case Studies", "custom-post-type-ui" ),
            "search_items" => __( "Search Case Studies", "custom-post-type-ui" ),
            "not_found" => __( "No Case Studies found", "custom-post-type-ui" ),
            "not_found_in_trash" => __( "No Case Studies found in trash", "custom-post-type-ui" ),
            "parent" => __( "Parent Case Study:", "custom-post-type-ui" ),
            "featured_image" => __( "Featured image for this Case Study", "custom-post-type-ui" ),
            "set_featured_image" => __( "Set featured image for this Case Study", "custom-post-type-ui" ),
            "remove_featured_image" => __( "Remove featured image for this Case Study", "custom-post-type-ui" ),
            "use_featured_image" => __( "Use as featured image for this Case Study", "custom-post-type-ui" ),
            "archives" => __( "Case Study archives", "custom-post-type-ui" ),
            "insert_into_item" => __( "Insert into Case Study", "custom-post-type-ui" ),
            "uploaded_to_this_item" => __( "Upload to this Case Study", "custom-post-type-ui" ),
            "filter_items_list" => __( "Filter Case Studies list", "custom-post-type-ui" ),
            "items_list_navigation" => __( "Case Studies list navigation", "custom-post-type-ui" ),
            "items_list" => __( "Case Studies list", "custom-post-type-ui" ),
            "attributes" => __( "Case Studies attributes", "custom-post-type-ui" ),
            "name_admin_bar" => __( "Case Study", "custom-post-type-ui" ),
            "item_published" => __( "Case Study published", "custom-post-type-ui" ),
            "item_published_privately" => __( "Case Study published privately.", "custom-post-type-ui" ),
            "item_reverted_to_draft" => __( "Case Study reverted to draft.", "custom-post-type-ui" ),
            "item_scheduled" => __( "Case Study scheduled", "custom-post-type-ui" ),
            "item_updated" => __( "Case Study updated.", "custom-post-type-ui" ),
            "parent_item_colon" => __( "Parent Case Study:", "custom-post-type-ui" ),
        ];
        $args = [
            "label" => __( "Case Studies", "custom-post-type-ui" ),
            "labels" => $labels,
            "description" => "",
            "public" => true,
            "publicly_queryable" => true,
            "show_ui" => true,
            "show_in_rest" => true,
            "rest_base" => "",
            "rest_controller_class" => "WP_REST_Posts_Controller",
            "has_archive" => false,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "delete_with_user" => false,
            "exclude_from_search" => false,
            "capability_type" => "post",
            "map_meta_cap" => true,
            "hierarchical" => false,
            "rewrite" => [ "slug" => "case_study", "with_front" => true ],
            "query_var" => true,
            "supports" => [ "title", "custom-fields" ],
            "show_in_graphql" => false,
        ];
        register_post_type( "case_study", $args );
    }
    add_action( 'init', 'cptui_register_my_cpts_case_study' );

    // Register Case Study CPT Taxonomy
    function cptui_register_my_taxes_case_study_taxonomy() {
        $labels = [
            "name" => __( "Case Study Type", "custom-post-type-ui" ),
            "singular_name" => __( "Case Study Type", "custom-post-type-ui" ),
            "menu_name" => __( "Case Study Type", "custom-post-type-ui" ),
            "all_items" => __( "All Case Study Types", "custom-post-type-ui" ),
            "edit_item" => __( "Edit Case Study Type", "custom-post-type-ui" ),
            "view_item" => __( "View Case Study Type", "custom-post-type-ui" ),
            "update_item" => __( "Update Case Study Type name", "custom-post-type-ui" ),
            "add_new_item" => __( "Add new Case Study Type", "custom-post-type-ui" ),
            "new_item_name" => __( "New Case Study Type name", "custom-post-type-ui" ),
            "parent_item" => __( "Parent Case Study Type", "custom-post-type-ui" ),
            "parent_item_colon" => __( "Parent Case Study Type:", "custom-post-type-ui" ),
            "search_items" => __( "Search Case Study Types", "custom-post-type-ui" ),
            "popular_items" => __( "Popular Case Study Types", "custom-post-type-ui" ),
            "separate_items_with_commas" => __( "Separate Case Study Types with commas", "custom-post-type-ui" ),
            "add_or_remove_items" => __( "Add or remove Case Study Type", "custom-post-type-ui" ),
            "choose_from_most_used" => __( "Choose from the most used Case Study Types", "custom-post-type-ui" ),
            "not_found" => __( "No Case Study Types found", "custom-post-type-ui" ),
            "no_terms" => __( "No Case Study Types", "custom-post-type-ui" ),
            "items_list_navigation" => __( "Case Study Types list navigation", "custom-post-type-ui" ),
            "items_list" => __( "Case Study Types list", "custom-post-type-ui" ),
            "back_to_items" => __( "Back to Case Study Types", "custom-post-type-ui" ),
        ];
        $args = [
            "label" => __( "Case Study Type", "custom-post-type-ui" ),
            "labels" => $labels,
            "public" => true,
            "publicly_queryable" => true,
            "hierarchical" => false,
            "show_ui" => true,
            "show_in_menu" => true,
            "show_in_nav_menus" => true,
            "query_var" => true,
            "rewrite" => [ 'slug' => 'case_study_taxonomy', 'with_front' => true, ],
            "show_admin_column" => false,
            "show_in_rest" => true,
            "rest_base" => "case_study_taxonomy",
            "rest_controller_class" => "WP_REST_Terms_Controller",
            "show_in_quick_edit" => false,
            "show_in_graphql" => false,
        ];
        register_taxonomy( "case_study_taxonomy", [ "case_study" ], $args );
    }
    add_action( 'init', 'cptui_register_my_taxes_case_study_taxonomy' );

    // Hide sidebar taxonomy metabox
    add_action( 'admin_menu' , 'hide_wp_category_metabox' );
    function hide_wp_category_metabox() {
        remove_meta_box( 'tagsdiv-case_study_taxonomy', 'case_study', 'side' );
    }

    // Hide admin title input
    add_action('admin_head', 'hide_wp_title_input');
    function hide_wp_title_input() {
      $screen = get_current_screen();
      if ($screen->id != 'case_study') {
        return;
      }
      ?>
        <style type="text/css">
          #post-body-content {
            display: none;
          }
        </style>
      <?php
    }

    // Update CPT Title on save
    add_action('acf/save_post', 'save_post_type_post', 20);
    function save_post_type_post($post_id) {
      $post_type = get_post_type($post_id);
      if ($post_type != 'case_study') {
        return;
      }
      $post_title = get_field('title', $post_id);
      $post_name = sanitize_title($post_title);
      $post = array(
        'ID' => $post_id,
        'post_name' => $post_name,
        'post_title' => $post_title
      );
      wp_update_post($post);
    }

    // Enqueue case study filters script
    wp_enqueue_script( 'script', get_template_directory_uri() . '/assets/js/case-study-filters.js', array ( 'jquery' ), true);
?>