<?php

/**
 * TABLE OF CONTENTS
 * 
 * Theme Support
 * Register plugins required by the theme
 * Enqueue stylesheets and scripts
 * Housecleaning - Remove Junk From Header, Dashboard Widgets
 * Automatically Add Facebook and Schema.org language attributes 
 * Prev/Next Link Styles
 * Page Slug in Body Class
 * Define Widget Areas
 * Menus
 * Widgets
 * dd() Helper Function
 * Featured Image in Admin Column
 * Image Dimensions in Admin Column
 */


/**
 * Theme Support
 */
add_theme_support( 'post-thumbnails' ); 
add_theme_support( 'html5', array( 'comment-list', 'comment-form', 'search-form', 'gallery', 'caption' ) );


/**
 * Register the required plugins for this theme.
 * Uses TGM_Plugin_Activation class.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
require_once dirname( __FILE__ ) . '/vendor/tgm-plugin-activation/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'my_theme_register_required_plugins' );

function my_theme_register_required_plugins() {

    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        array(
            'name'      => 'JSON API',
            'slug'      => 'json-api',
            'required'  => true,
        ),

        array(
            'name'      => 'XML Sitemap',
            'slug'      => 'xml-sitemap',
            'required'  => true,
        ),

    );

    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'id'           => 'tgmpa',					// Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',						// Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins',	// Menu slug.
        'has_notices'  => true,                     // Show admin notices or not.
        'dismissable'  => true,                     // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',						// If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => true,						// Automatically activate plugins after installation or not.
        'message'      => '',						// Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => __( 'Install Required Plugins', 'tgmpa' ),
            'menu_title'                      => __( 'Install Plugins', 'tgmpa' ),
            'installing'                      => __( 'Installing Plugin: %s', 'tgmpa' ), // %s = plugin name.
            'oops'                            => __( 'Something went wrong with the plugin API.', 'tgmpa' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'tgmpa' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'tgmpa' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'tgmpa' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'tgmpa' ),
            'return'                          => __( 'Return to Required Plugins Installer', 'tgmpa' ),
            'plugin_activated'                => __( 'Plugin activated successfully.', 'tgmpa' ),
            'complete'                        => __( 'All plugins installed and activated successfully. %s', 'tgmpa' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );

    tgmpa( $plugins, $config );

}



/**
 * Enqueue Stylesheets and Scripts
 * @link http://codex.wordpress.org/Function_Reference/wp_register_style
 */

function my_theme_enqueue_scripts() {
	if ( ! is_admin() ) {

		// Register Styles
        wp_register_style('foundation', get_stylesheet_directory_uri().'/assets/vendor/foundation/css/foundation.css', $deps=array());
        wp_register_style('app', get_stylesheet_directory_uri().'/assets/app.css', $deps=array('foundation'));

		// Register Scripts
        wp_deregister_script('jquery');
        wp_register_script('jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js', $deps=array(), $ver=null);
        wp_register_script('modernizr', get_stylesheet_directory_uri().'/assets/vendor/modernizr/modernizr.js');
        wp_register_script('foundation', get_stylesheet_directory_uri().'/assets/vendor/foundation/js/foundation.min.js', $deps=array('modernizr','jquery'), $ver=false, $in_footer=true);

		// Enqueue Styles
        wp_enqueue_style('app');
		
		// Enqueue Scripts
		wp_enqueue_script('foundation');
			
	}
}

add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_scripts', 99 );


/**
 * Housecleaning
 */

// Remove clutter from head
// http://wordpress.org/support/topic/remove-feed-from-wp_head
remove_action( 'wp_head', 'rsd_link' ); 
remove_action( 'wp_head', 'wp_generator' ); 
remove_action( 'wp_head', 'feed_links', 2 ); 
remove_action( 'wp_head', 'feed_links_extra', 3 );
remove_action( 'wp_head', 'index_rel_link' );
remove_action( 'wp_head', 'wlwmanifest_link' );
remove_action( 'wp_head', 'start_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'parent_post_rel_link', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0 );
remove_action( 'wp_head', 'adjacent_posts_rel_link', 10, 0 ); 

// Remove version numbers appended to stylesheets and scripts, unless defined
// http://wordpress.org/support/topic/enqueueregister-script-remove-version
add_filter( 'script_loader_src', 'remove_src_version' );
add_filter( 'style_loader_src', 'remove_src_version' );

function remove_src_version( $src ) {
	global $wp_version;
	$version_str = '?ver='.$wp_version;
	$version_str_offset = strlen( $src ) - strlen( $version_str );
	if ( substr( $src, $version_str_offset ) == $version_str ) {
		return substr( $src, 0, $version_str_offset );
	} else {
		return $src;
	}
} 


/**
 * Disable Default Dashboard Widgets
 * @link http://digwp.com/2014/02/disable-default-dashboard-widgets/
 */
function disable_default_dashboard_widgets() {
    global $wp_meta_boxes;
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_activity']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_right_now']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_recent_comments']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_incoming_links']);
    unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_quick_press']);
    unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_recent_drafts']);
}

add_action('wp_dashboard_setup', 'disable_default_dashboard_widgets', 999);


/**
 * Automatically add Facebook and Schema.org language attributes 
 * @link http://bigseadesign.com/blog/set-facebook-thumbnail-in-thesis
 */

add_filter('language_attributes', 'add_og_xml_ns');
function add_og_xml_ns($content) {
  return ' xmlns:og="http://ogp.me/ns#" ' . $content;
}

add_filter('language_attributes', 'add_fb_xml_ns');
function add_fb_xml_ns($content) {
  return ' xmlns:fb="https://www.facebook.com/2008/fbml" ' . $content;
}

add_filter('language_attributes', 'add_schema_org_ns');
function add_schema_org_ns($content) {
	if (is_singular()){
	    $schemaOrg = ' itemscope itemtype="http://schema.org/WebPage" ';
        return $schemaOrg . $content;
    }
}


/**
 * Prev/Next Link Styles
 * Adds 'button' class
 */

add_filter('next_posts_link_attributes', 'posts_link_attributes');
add_filter('previous_posts_link_attributes', 'posts_link_attributes');

function posts_link_attributes() {
    return 'class="button"';
}


/**
 * Page slug in body class
 */

function add_slug_body_class( $classes ) {
    global $post;
        if ( isset( $post ) ) {
            $classes[] = $post->post_type . '-' . $post->post_name;
        }
    return $classes;
}

add_filter( 'body_class', 'add_slug_body_class' );


/**
 * Menus
 * @link http://generatewp.com/nav-menus/
 */

function custom_navigation_menus() {
    register_nav_menu( 'header', 'Top Header' );
}

add_action( 'init', 'custom_navigation_menus' );


/**
 * Widgets
 * Register our sidebars and widgetized areas.
 * 
 * @todo If we need certain widgets to appear on specific pages, consider a plugin
 * @link http://wordpress.org/plugins/widget-context/
 * @link http://wordpress.org/plugins/post-specific-widgets/screenshots/
 */

function theme_widgets_init() {

    register_sidebar( array(
        'name' => 'Home Page Widget Area',
        'description'   => 'Widgets are full-width and appear below the title and above the shows list.',
        'before_widget' => '<div class="row"><div class="large-12 columns widget panel">',
        'after_widget' => '</div></div>',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ) );

    // register_sidebar( array(
    //     'name' => 'Sidebar Widget Area',
    //     'description' => 'Sidebar widgets appear on episode pages',
    //     'before_widget' => '<div class="widget panel">',
    //     'after_widget' => '</div>',
    //     'before_title' => '<h3>',
    //     'after_title' => '</h3>',
    // ) );

}
add_action( 'widgets_init', 'theme_widgets_init' );


/**
 * dd() function
 * An alternative to var_dump() and print_r()
 * Dump the passed variables and end the script.
 *
 * @param  dynamic  mixed
 * @return void
 * @link http://laravel.com/api/source-function-dd.html
 */
if ( ! function_exists('dd')) {

    function dd() {
        array_map(function($x) { var_dump($x); }, func_get_args()); die;
    }

}


/**
 * Featured Image in Admin Column
 * @link http://wpsnipp.com/index.php/functions-php/add-featured-thumbnail-to-admin-post-columns/
 * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
 */
add_filter('manage_pages_columns', 'posts_columns', 5);
add_action('manage_pages_custom_column', 'posts_custom_columns', 5, 2);
add_filter('manage_posts_columns', 'posts_columns', 5);
add_action('manage_posts_custom_column', 'posts_custom_columns', 5, 2);
function posts_columns($defaults){
    $defaults['riv_post_thumbs'] = __('Featured Image');
    return $defaults;
}
function posts_custom_columns($column_name, $id){
        if($column_name === 'riv_post_thumbs'){
        echo the_post_thumbnail( 'thumb' );
    }
}


/**
 * Image Dimensions in Admin Column
 * @link http://polishlab.com/how-to-show-dimensions-of-your-images-in-the-wordpressadmin-media-panel
 */
add_filter('manage_upload_columns', 'size_column_register');
function size_column_register($columns) {
  $columns['dimensions'] = 'Dimensions';
  return $columns;
}
add_action('manage_media_custom_column', 'size_column_display', 10, 2);
function size_column_display($column_name, $post_id) {
  if( 'dimensions' != $column_name || !wp_attachment_is_image($post_id))
    return;
    list($url, $width, $height) = wp_get_attachment_image_src($post_id, 'full');
    echo esc_html("{$width}&amp;times;{$height}");
}







