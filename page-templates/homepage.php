<?php

/*
 * Template Name: Homepage
*/

namespace App;

use Timber\Timber;
use Timber\PostQuery;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class HomepageController
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = "Attega | Attega";
        $context['meta_description'] = "Attega";
        $context = getJobListing($context);
        $context = getApplicants($context);
        $context = getBlogs($context);

        /*
        $args2 = array(
          'post_type'=> 'post',
          'orderby'    => 'ID',
          'cat' => '2'
        );
        
        $context['blogs_featured'] = new PostQuery($args2);
        */
        
        return new TimberResponse('templates/homepage.twig', $context);

        
    }
}



//die(print_r($context['blogs_featured']));

/* attempts at posts array

$posts = get_posts(array(
    'meta_query' => array(
        'relation' = 'OR,
        array(
            'key'     => 'featured_blog_number',
            'value'   => 'first"',
            'compare' => 'IN'
        )
    )
));

or 

$meta_query_args = [
  'relation' => 'AND',
  [
    'key' => 'color,
    'value' => '"red"',
    'compare' => 'LIKE',
  ],
  [
    'key' => 'color,
    'value' => '"orange"',
    'compare' => 'LIKE',
  ],
];

$context['posts'] = new PostQuery($posts);

*/

/*

$args = array(
        'key'     => '_featured_blog_number',
        'value'   => 'true',
        'compare' => 'NOT EXISTS'
);

$context['posts'] = new PostQuery($args);

die(print_r($context['posts']));

*/