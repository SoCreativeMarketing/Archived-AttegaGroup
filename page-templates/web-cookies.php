<?php

/*
 * Template Name: Web Cookie Policy
*/

namespace App;

use Timber\Timber;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class WebCookiesController
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = "Attega | Attega";
        $context['meta_description'] = "Attega";
        return new TimberResponse('templates/web-cookies.twig', $context);
    }
}