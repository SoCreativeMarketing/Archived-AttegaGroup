<?php

use App\Http\Lumberjack;
use Timber\PostQuery;

// Create the Application Container
$app = require_once('bootstrap/app.php');

// Bootstrap Lumberjack from the Container
$lumberjack = $app->make(Lumberjack::class);
$lumberjack->bootstrap();

// Import our routes file
require_once('routes.php');

// Set global params in the Timber context
add_filter('timber_context', [$lumberjack, 'addToContext']);

// wsywygg remove auto p from ACF
function acf_wysiwyg_remove_wpautop() {
    remove_filter('acf_the_content', 'wpautop' );
}
add_action('acf/init', 'acf_wysiwyg_remove_wpautop');

// ACF options page

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

function getJobListing($context) {
	$context['job_listings'] = get_field('featured_job', 'option');
	return $context;
}

function getApplicants($context) {
	$context['applicants_reviews'] = get_field('applicant_review', 'option');
	return $context;
}

function getBlogs($context) {
	$args2 = array(
		'post_type'=> 'post',
		'orderby'    => 'ID',
		'cat' => '2'
	);
	
	$context['blogs_featured'] = new PostQuery($args2);
	return $context;
}