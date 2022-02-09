<?php

/*
 * Template Name: About Us
*/

namespace App;

use Timber\Timber;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class AboutusController
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = "Attega | Attega";
        $context['meta_description'] = "Attega";
        $context = getApplicants($context);
        return new TimberResponse('templates/about-us.twig', $context);
    }
}