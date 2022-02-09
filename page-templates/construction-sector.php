<?php

/*
 * Template Name: Construction Sector
*/

namespace App;

use Timber\Timber;
use Rareloop\Lumberjack\Post;
use Rareloop\Lumberjack\Http\Responses\TimberResponse;

class ConstructionSectorController
{
    public function handle()
    {
        $context = Timber::get_context();
        $context['title'] = "Attega | Attega";
        $context['meta_description'] = "Attega";
        $context = getApplicants($context);
        $context = getBlogs($context);
        return new TimberResponse('templates/construction-sector.twig', $context);
    }
}