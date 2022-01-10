<?php
//preg replace function that kills the p tag
function filter_ptags_on_images($content){
    return preg_replace('/<p>\s*(<a .*>)?\s*(<img .* \/>)\s*(<\/a>)?\s*<\/p>/iU', '\1\2\3', $content);
}
add_filter('the_content', 'filter_ptags_on_images');

// Remove <p> and <br/> from Contact Form 7
add_filter('wpcf7_autop_or_not', '__return_false');

// Disable support for comments and trackbacks in post types
function df_disable_comments_post_types_support() {
$post_types = get_post_types();
foreach ($post_types as $post_type) {
if(post_type_supports($post_type, 'comments')) {
remove_post_type_support($post_type, 'comments');
remove_post_type_support($post_type, 'trackbacks'); } } }
add_action('admin_init', 'df_disable_comments_post_types_support');
// Close comments on the front-end
function df_disable_comments_status() {
return false; }
add_filter('comments_open', 'df_disable_comments_status', 20, 2);
add_filter('pings_open', 'df_disable_comments_status', 20, 2);
// Hide existing comments
function df_disable_comments_hide_existing_comments($comments) {
$comments = array();
return $comments; }
add_filter('comments_array', 'df_disable_comments_hide_existing_comments', 10, 2);
// Remove comments page in menu
function df_disable_comments_admin_menu() {
remove_menu_page('edit-comments.php'); }
add_action('admin_menu', 'df_disable_comments_admin_menu');
// Redirect any user trying to access comments page
function df_disable_comments_admin_menu_redirect() {
global $pagenow;
if ($pagenow === 'edit-comments.php') {
wp_redirect(admin_url()); exit; } }
add_action('admin_init', 'df_disable_comments_admin_menu_redirect');
// Remove comments metabox from dashboard
function df_disable_comments_dashboard() {
remove_meta_box('dashboard_recent_comments', 'dashboard', 'normal'); }
add_action('admin_init', 'df_disable_comments_dashboard');
// Remove comments links from admin bar
function df_disable_comments_admin_bar() {
if (is_admin_bar_showing()) {
remove_action('admin_bar_menu', 'wp_admin_bar_comments_menu', 60); } }
add_action('init', 'df_disable_comments_admin_bar');

// Remove Tags Posts;
add_action( 'init', 'prefix_unregister_tags', 99 );
function prefix_unregister_tags(){
	unregister_taxonomy_for_object_type( 'post_tag', 'post' );
}

// Remove items from the admin menu
add_action('admin_menu', 'remove_menus');
function remove_menus(){
	global $menu;
	$restricted = array(
		__('Posts'),
		__('Media'),
		__('Links'),
	);
	end ($menu);
	while (prev($menu)){
		$value = explode(' ', $menu[key($menu)][0]);
		if( in_array( ($value[0] != NULL ? $value[0] : "") , $restricted ) ){
			unset($menu[key($menu)]);
		}
	}
}