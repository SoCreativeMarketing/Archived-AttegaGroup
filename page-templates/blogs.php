<?php

/*
 * Template Name: Blogs
*/
namespace App;

use Timber\Timber;
use Timber\PostQuery;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class BlogsController
{
    public function handle()
    {
        $context = Timber::context();
        $context['title'] = "Blogs | Attegagroup";
        $context['meta_description'] = "Blogs page for Attegagroup";
        $context = getApplicants($context);
        $context = getBlogs($context);
        

        global $paged;
        if (!isset($paged) || !$paged){
            $paged = 1;
        }
        //$context = Timber::context();
        $args = array(
            'post_type'=> 'post',
            'orderby'    => 'ID',
            'posts_per_page' => 6,
            'paged' => $paged,
        );
        
        
        if(isset($_GET["search"])){
            $args['s'] = urldecode($_GET["search"]);
        }

        $context['posts'] = new PostQuery($args);
        
        //die(print_r($context['posts']));
        return new TimberResponse('templates/blogs.twig', $context);
    }
}
?>